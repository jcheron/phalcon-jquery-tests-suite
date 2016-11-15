@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../techpivot/phalcon-ci-installer/bin/install-phalcon.sh
bash "%BIN_TARGET%" %*
