.. _bugs-and-feature-request-label:

Bugs and feature requests
=========================

General
*******

* check the behaviour on multiple identifier for one table mapping
* add phpsimplesaml support
* implement checkbox if user must exists

Feature mapping
***************

First safe error (Bug)
++++++++++++++++++++++

This error exists because if you create the feature map the first time there is no reference to its parent. In the
parent record is the table name available. Without this we can not determine which fields we are able to use. So the
select input is empty. Because of this there is an error when the record is safed the first time. If somebody has an
idea how to fix this please contact me daniel.pfeil@itpfeil.de.

