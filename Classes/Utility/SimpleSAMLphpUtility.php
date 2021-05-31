<?php


namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use DanielPfeil\Samlauthentication\Domain\Model\FieldValue;
use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use DanielPfeil\Samlauthentication\Enum\ServiceProviderType;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class SimpleSAMLphpUtility implements SamlUtility
{
    public function getUserData(Serviceprovider $serviceprovider): array
    {
        $result = [];

        /**
         * @var $tablemapping Tablemapping
         */
        foreach ($serviceprovider->getTablemapping() as $tablemapping) {
            $result[$tablemapping->getTable()] = $this->getDataForTableMapping(
                $tablemapping,
                $serviceprovider
            );
        }

        return $result;
    }

    public function saveUserData(Serviceprovider $serviceprovider): bool
    {
        $tableMappings = $serviceprovider->getTablemapping();

        /**
         * @var Tablemapping $tableMapping
         */
        foreach ($tableMappings as $tableMapping) {
            $data = $this->getDataForTableMapping($tableMapping, $serviceprovider);

            /**
             * @var QueryBuilder $queryBuilderFeUsers
             */
            $queryBuilderFeUsers = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getQueryBuilderForTable($tableMapping->getTable());

            $values = [
                "tstamp" => time(),
                "pid" => $serviceprovider->getDestinationpid(),
            ];

            foreach ($data as $field) {
                if ($field->getValue() != null) {
                    $index = $field->getField();
                    $values[$index] = $field->getValue();
                }
            }

            $findUser = $queryBuilderFeUsers
                ->count('*')
                ->from($tableMapping->getTable());
            /**
             * @var Fieldmapping $field
             */
            foreach ($tableMapping->getFields() as $field) {
                if ($field->isIdentifier()) {
                    $predicate = $queryBuilderFeUsers->expr()->eq(
                        $field->getField(),
                        $queryBuilderFeUsers->createNamedParameter($values[$field->getField()])
                    );

                    $findUser->andWhere($predicate);
                }
            }

            $userExists = $findUser->execute()->fetch()['COUNT(*)'];
            if ($userExists === 0) {
                $result = $queryBuilderFeUsers->insert($tableMapping->getTable())
                    ->values($values)
                    ->execute();
            } else {
                //todo implement update
            }
        }
        //todo make check
        return true;
    }

    private function getDataForTableMapping(Tablemapping $tablemapping, Serviceprovider $serviceprovider): array
    {
        $as = new \SimpleSAML\Auth\Simple($serviceprovider->getEntityid());
        $as->requireAuth();
        $attributes = $as->getAttributes();

        $result = [];

        /**
         * @var Fieldmapping $field
         */
        foreach ($tablemapping->getFields() as $field) {
            $fieldValue = new FieldValue();
            $fieldValue->setField($field->getField());

            if($field->isNoforeignfield()){
                $fieldValue->setValue($field->getDefaultvalue());
            } else {
                $fieldValue->setForeignField($field->getForeignField());

                $key = $this->getPrefixIfExistOrEmptyString($serviceprovider) . $fieldValue->getForeignField();
                if (array_key_exists($key, $attributes)) {
                    $value = $attributes[$key];
                    if (is_array($value)) {
                        $value = $value[0];
                    }

                    $fieldValue->setValue($value);
                } else {
                    if ($field->hasFallback()) {
                        $fieldValue->setValue($field->getDefaultvalue());
                    }
                }
            }


            $result[$field->getField()] = $fieldValue;
        }

        return $result;
    }

    private function getPrefixIfExistOrEmptyString(Serviceprovider $serviceprovider): string
    {
        if($serviceprovider->getType() === ServiceProviderType::APACHE_SHIBBOLETH){
            return  $serviceprovider->getPrefix();
        }

        return '';
    }
}
