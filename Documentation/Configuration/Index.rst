.. include:: /Includes.rst.txt

.. _configuration:

=============
Configuration
=============

.. _configuration-site-sets:

Site Set Settings
=================

All configuration is done via Site Sets in TYPO3 v13.

Go to :guilabel:`Site Management > Sites > [Your Site] > Settings tab`

.. _configuration-voucher:

Voucher Settings
----------------

.. confval:: adventskalender.voucherHeadline
   :name: voucher-headline
   :type: string
   :Default: Geschenkgutschein

   The headline text displayed on every voucher.

.. _configuration-colors-unlocked:

Unlocked Door Colors
--------------------

.. confval:: adventskalender.doorUnlockedColorStart
   :name: door-unlocked-color-start
   :type: color
   :Default: #0f7c3c

   Start color of the gradient for unlocked doors.

.. confval:: adventskalender.doorUnlockedColorEnd
   :name: door-unlocked-color-end
   :type: color
   :Default: #2d5016

   End color of the gradient for unlocked doors.

.. _configuration-colors-locked:

Locked Door Colors
------------------

.. confval:: adventskalender.doorLockedColorStart
   :name: door-locked-color-start
   :type: color
   :Default: #c31432

   Start color of the gradient for locked doors.

.. confval:: adventskalender.doorLockedColorEnd
   :name: door-locked-color-end
   :type: color
   :Default: #d32f2f

   End color of the gradient for locked doors.

.. _configuration-colors-special:

Special Day Colors
------------------

.. confval:: adventskalender.specialChristmasColorStart
   :name: special-christmas-color-start
   :type: color
   :Default: #ffd700

   Start color for door 24 (Christmas Eve).

.. confval:: adventskalender.specialChristmasColorEnd
   :name: special-christmas-color-end
   :type: color
   :Default: #ff8c00

   End color for door 24 (Christmas Eve).

.. confval:: adventskalender.specialNikolausColorStart
   :name: special-nikolaus-color-start
   :type: color
   :Default: #ff0000

   Start color for door 6 (St. Nicholas Day).

.. confval:: adventskalender.specialNikolausColorEnd
   :name: special-nikolaus-color-end
   :type: color
   :Default: #8b0000

   End color for door 6 (St. Nicholas Day).

.. _configuration-music:

Music Settings
--------------

.. confval:: adventskalender.musicEnabled
   :name: music-enabled
   :type: bool
   :Default: true

   Enable or disable background music.

.. confval:: adventskalender.musicPath
   :name: music-path
   :type: string
   :Default: /_assets/.../Music/song_christmas.mp3

   Path to the background music MP3 file.

.. _configuration-snow:

Snow Animation
--------------

.. confval:: adventskalender.snowEnabled
   :name: snow-enabled
   :type: bool
   :Default: true

   Enable or disable the snowflake animation.

.. _configuration-plugin:

Plugin Configuration
====================

Each plugin instance can be configured individually via FlexForm:

Custom Title
   Optional custom headline (overrides default translation)

Custom Description
   Optional custom description text (overrides default translation)

Background Image
   Select from predefined background images
