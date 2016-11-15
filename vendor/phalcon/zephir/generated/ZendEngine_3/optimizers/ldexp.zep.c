
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
#include "kernel/math.h"
#include "kernel/operators.h"
#include "kernel/memory.h"


ZEPHIR_INIT_CLASS(Test_Optimizers_Ldexp) {

	ZEPHIR_REGISTER_CLASS(Test\\Optimizers, Ldexp, test, optimizers_ldexp, test_optimizers_ldexp_method_entry, 0);

	return SUCCESS;

}

PHP_METHOD(Test_Optimizers_Ldexp, testInt) {

	zval _0, _1;
	int x, exponent;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);


	x = 2;
	exponent = 3;
	ZVAL_LONG(&_0, x);
	ZVAL_LONG(&_1, exponent);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testDoubleInt) {

	zval _0, _1;
	int exponent;
	double x;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);


	x = 2.0;
	exponent = 3;
	ZVAL_DOUBLE(&_0, x);
	ZVAL_LONG(&_1, exponent);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testDouble) {

	zval _0, _1;
	double x, exponent;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);


	x = 2.0;
	exponent = 3.0;
	ZVAL_DOUBLE(&_0, x);
	ZVAL_DOUBLE(&_1, exponent);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testVar) {

	zval _0, _1;
	int x, exponent;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);


	x = 2;
	exponent = 3;
	ZVAL_LONG(&_0, x);
	ZVAL_LONG(&_1, exponent);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testIntValue1) {

	zval _0, _1;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);


	ZVAL_LONG(&_0, 2);
	ZVAL_LONG(&_1, 3);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testIntParameter) {

	zval *x_param = NULL, *exponent_param = NULL, _0, _1;
	int x, exponent;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	zephir_fetch_params(0, 2, 0, &x_param, &exponent_param);

	x = zephir_get_intval(x_param);
	exponent = zephir_get_intval(exponent_param);


	ZVAL_LONG(&_0, x);
	ZVAL_LONG(&_1, exponent);
	RETURN_DOUBLE(zephir_ldexp(&_0, &_1 TSRMLS_CC));

}

PHP_METHOD(Test_Optimizers_Ldexp, testVarParameter) {

	zval *x, x_sub, *exponent, exponent_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&x_sub);
	ZVAL_UNDEF(&exponent_sub);

	zephir_fetch_params(0, 2, 0, &x, &exponent);



	RETURN_DOUBLE(zephir_ldexp(x, exponent TSRMLS_CC));

}

