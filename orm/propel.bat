@echo off

php ../vendor/propel/propel/bin/propel model:build --schema-dir="schema" --output-dir="classes"
