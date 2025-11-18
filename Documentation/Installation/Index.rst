.. include:: /Includes.rst.txt

.. _installation:

============
Installation
============

.. _installation-composer:

Installation with Composer
===========================

Use Composer to install the extension::

   composer require hamstah/adventskalender

.. _installation-extension-manager:

Installation via Extension Manager
===================================

1. Go to :guilabel:`Admin Tools > Extensions`
2. Search for "adventskalender"
3. Click the :guilabel:`Install` button
4. Clear all caches

.. _installation-database:

Database Setup
==============

After installation, update the database schema:

1. Go to :guilabel:`Admin Tools > Maintenance`
2. Select :guilabel:`Analyze Database Structure`
3. Click :guilabel:`Apply selected changes`

.. _installation-site-set:

Activate Site Set
=================

1. Go to :guilabel:`Site Management > Sites`
2. Edit your site
3. Go to the :guilabel:`Sets` tab
4. Click :guilabel:`Add set`
5. Select "🎄 Adventskalender"
6. Save

.. _installation-clear-cache:

Clear Caches
============

::

   php vendor/bin/typo3 cache:flush
