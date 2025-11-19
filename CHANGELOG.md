# Changelog

All notable changes to this project will be documented in this file.

## [1.1.0] - 2025-11-19

### Added
- Dynamic color configuration via Site Settings
- CSS variable implementation for theme colors
- Lightbox color customization
- Voucher design customization
- Complete documentation for color settings
- Color configuration examples in README

### Changed
- Locked door colors now use CSS variables from Site Settings
- Lightbox badges, buttons and vouchers now use configurable colors
- Music toggle button respects theme colors
- All hardcoded colors replaced with CSS variables

### Technical
- Added `--lightbox-accent` CSS variable
- Updated `adventskalender.css` to use CSS variables throughout
- Site settings now properly control Lightbox appearance
- Colors cascade through all UI components

## [1.0.0] - 2025-11-16

### Added
- Initial release
- 24 configurable advent calendar doors
- Multimedia support (images, videos, audio)
- Digital voucher system with download function
- Lightbox view for door content
- Site Set integration for TYPO3 v13
- Customizable colors via Site Settings
- Optional background music with toggle
- Snow animation
- Decorative images (horse, reindeer) with animations
- Multi-language support (DE, EN, RU)
- Responsive design
- Individual icons for each day
- Sound effect for locked doors
- Translation support for door records and vouchers

### Features
- Grid layout with random door order
- Special styling for day 6 (Nikolaus) and day 24 (Christmas)
- Animated entrance effects for all elements
- Sticky voucher display in lightbox
- HTML2Canvas integration for voucher downloads
- Bootstrap Icons integration
- Animate.css integration
