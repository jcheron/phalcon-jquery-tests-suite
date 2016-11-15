@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../phalcon/zephir/bin/zephir
bash "%BIN_TARGET%" %*
