# BanByNameBot
This Telegram bot looks for the given text in a joining user's details (first, last and username) and kicks them if it matches the given filter

# Requirements

- PHP 7
- BotAPI webhook
- [PHPBot](https://github.com/kyle2142/phpbot)

# Installation

- Fulfill requirements
  - You can change the `require` path if you are not installing [PHPBot](https://github.com/kyle2142/phpbot) via `composer`
- Change the constants at the top of the file to suit your needs

# Notes

By default, this script uses `stripos` to check whether user details contains `FILTER`, so take note that it is case-insensitive.
For case sensitivity, you can either remove the `i` or you can use regex.


If you set `USE_REGEX` to `true`, make sure that `FILTER` is a valid PCRE pattern, **including delimiters**.  
You can specify flags via the `(?xyz)` construct.

For example `i` activates case insensitivity. `FILTER = '/(?i)beep/'` will match
- `beep`
- `beEp`
- `BEEP`

etc.

For more regex help, you can consult http://regex101.com
