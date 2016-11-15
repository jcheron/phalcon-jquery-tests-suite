
#ifdef HAVE_CONFIG_H
#include "../../ext_config.h"
#endif

#include <php.h>
#include "../../php_ext.h"
#include "../../ext.h"

#include <Zend/zend_operators.h>
#include <Zend/zend_exceptions.h>
#include <Zend/zend_interfaces.h>

#include "kernel/main.h"
#include "kernel/memory.h"
#include "kernel/fcall.h"
#include "kernel/operators.h"
#include "math.h"


ZEPHIR_INIT_CLASS(Test_BuiltIn_IntMethods) {

	ZEPHIR_REGISTER_CLASS(Test\\BuiltIn, IntMethods, test, builtin_intmethods, test_builtin_intmethods_method_entry, 0);

	return SUCCESS;

}

PHP_METHOD(Test_BuiltIn_IntMethods, getAbs) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "abs", NULL, 5, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getAbs1) {

	zval _0, _1;
	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();

	ZVAL_LONG(&_0, -5);
	ZEPHIR_CALL_FUNCTION(&_1, "abs", NULL, 5, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getBinary) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "decbin", NULL, 6, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getHex) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "dechex", NULL, 7, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getOctal) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "decoct", NULL, 8, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getPow) {

	zval *num_param = NULL, *exp_param = NULL, _0, _1, _2;
	int num, exp;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);
	ZVAL_UNDEF(&_2);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &num_param, &exp_param);

	num = zephir_get_intval(num_param);
	exp = zephir_get_intval(exp_param);


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_LONG(&_1, num);
	ZVAL_LONG(&_2, exp);
	zephir_pow_function(&_0, &_1, &_2);
	RETURN_CCTOR(_0);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getSqrt) {

	zval *num_param = NULL, _0;
	int num;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	RETURN_DOUBLE(sqrt(num));

}

PHP_METHOD(Test_BuiltIn_IntMethods, getExp) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "exp", NULL, 1, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getSin) {

	zval *num_param = NULL, _0;
	int num;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	RETURN_DOUBLE(sin(num));

}

PHP_METHOD(Test_BuiltIn_IntMethods, getCos) {

	zval *num_param = NULL, _0;
	int num;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	RETURN_DOUBLE(cos(num));

}

PHP_METHOD(Test_BuiltIn_IntMethods, getTan) {

	zval *num_param = NULL, _0;
	int num;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	RETURN_DOUBLE(tan(num));

}

PHP_METHOD(Test_BuiltIn_IntMethods, getAsin) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "asin", NULL, 9, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getAcos) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "acos", NULL, 10, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getAtan) {

	zval *num_param = NULL, _0, _1;
	int num, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &num_param);

	num = zephir_get_intval(num_param);


	ZVAL_LONG(&_0, num);
	ZEPHIR_CALL_FUNCTION(&_1, "atan", NULL, 11, &_0);
	zephir_check_call_status();
	RETURN_CCTOR(_1);

}

PHP_METHOD(Test_BuiltIn_IntMethods, getLog) {

	zval *num_param = NULL, *base_param = NULL, _0$$3, _1$$3, _2, _3, _4;
	int num, base, ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0$$3);
	ZVAL_UNDEF(&_1$$3);
	ZVAL_UNDEF(&_2);
	ZVAL_UNDEF(&_3);
	ZVAL_UNDEF(&_4);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &num_param, &base_param);

	num = zephir_get_intval(num_param);
	if (!base_param) {
		base = -1;
	} else {
		base = zephir_get_intval(base_param);
	}


	if (base == -1) {
		ZVAL_LONG(&_0$$3, num);
		ZEPHIR_CALL_FUNCTION(&_1$$3, "log", NULL, 12, &_0$$3);
		zephir_check_call_status();
		RETURN_CCTOR(_1$$3);
	}
	ZVAL_LONG(&_2, num);
	ZVAL_LONG(&_3, base);
	ZEPHIR_CALL_FUNCTION(&_4, "log", NULL, 12, &_2, &_3);
	zephir_check_call_status();
	RETURN_CCTOR(_4);

}

