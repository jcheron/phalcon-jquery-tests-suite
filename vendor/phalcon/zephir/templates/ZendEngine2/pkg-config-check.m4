
	AC_MSG_CHECKING([for %PACKAGE_LOWER%])
	if $PKG_CONFIG --exists %PACKAGE_LOWER%; then
		PHP_%PACKAGE_UPPER%_VERSION=`$PKG_CONFIG %PACKAGE_LOWER% --modversion`
		PHP_%PACKAGE_UPPER%_PREFIX=`$PKG_CONFIG %PACKAGE_LOWER% --variable=prefix`

		if $PKG_CONFIG %PACKAGE_PKG_CONFIG_COMPARE_VERSION% %PACKAGE_LOWER%; then
			AC_MSG_RESULT([found version $PHP_%PACKAGE_UPPER%_VERSION, under $PHP_%PACKAGE_UPPER%_PREFIX])
			PHP_%PACKAGE_UPPER%_LIBS=`$PKG_CONFIG %PACKAGE_LOWER% --libs`
			PHP_%PACKAGE_UPPER%_INCS=`$PKG_CONFIG %PACKAGE_LOWER% --cflags`

			PHP_EVAL_LIBLINE($PHP_%PACKAGE_UPPER%_LIBS, %PROJECT_UPPER%_SHARED_LIBADD)
			PHP_EVAL_INCLINE($PHP_%PACKAGE_UPPER%_INCS)
		else
			AC_MSG_ERROR(Requested '%PACKAGE_LOWER% %PACKAGE_REQUESTED_VERSION%' but version of %PACKAGE_LOWER% is $PHP_%PACKAGE_UPPER%_VERSION)
		fi
	else
		AC_MSG_ERROR(Unable to find %PACKAGE_LOWER% installation)
	fi

