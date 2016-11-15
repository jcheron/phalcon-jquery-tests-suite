
#ifdef HAVE_CONFIG_H
#include "../ext_config.h"
#endif

#include <php.h>
#include "../php_ext.h"
#include "../ext.h"

#include <Zend/zend_operators.h>
#include <Zend/zend_exceptions.h>
#include <Zend/zend_interfaces.h>

#include "kernel/main.h"
#include "kernel/operators.h"
#include "kernel/memory.h"
#include "kernel/fcall.h"


/**
 * Static Function calls
 */
ZEPHIR_INIT_CLASS(Test_Scall) {

	ZEPHIR_REGISTER_CLASS_EX(Test, Scall, test, scall, test_scallparent_ce, test_scall_method_entry, 0);

	return SUCCESS;

}

PHP_METHOD(Test_Scall, testMethod1) {

	ZEPHIR_INIT_THIS();


	RETURN_STRING("hello public");

}

PHP_METHOD(Test_Scall, testMethod2) {

	ZEPHIR_INIT_THIS();


	RETURN_STRING("hello protected");

}

PHP_METHOD(Test_Scall, testMethod3) {

	ZEPHIR_INIT_THIS();


	RETURN_STRING("hello private");

}

PHP_METHOD(Test_Scall, testMethod4) {

	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	zephir_fetch_params(0, 2, 0, &a, &b);



	zephir_add_function(return_value, a, b);
	return;

}

PHP_METHOD(Test_Scall, testMethod5) {

	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	zephir_fetch_params(0, 2, 0, &a, &b);



	zephir_add_function(return_value, a, b);
	return;

}

PHP_METHOD(Test_Scall, testMethod6) {

	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	zephir_fetch_params(0, 2, 0, &a, &b);



	zephir_add_function(return_value, a, b);
	return;

}

PHP_METHOD(Test_Scall, testMethod7) {

	ZEPHIR_INIT_THIS();


	object_init(return_value);
	return;

}

PHP_METHOD(Test_Scall, testCall1) {

	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod1", NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall2) {

	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod2", NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall3) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod3", &_0, 58);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall4) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod4", NULL, 0, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall5) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod5", NULL, 0, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall6) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod6", &_0, 59, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall7) {

	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod1", NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall8) {

	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod2", NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall9) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod3", &_0, 58);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall10) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod4", NULL, 0, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall11) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod5", NULL, 0, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall12) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	zval *a, a_sub, *b, b_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&a_sub);
	ZVAL_UNDEF(&b_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &a, &b);



	ZEPHIR_RETURN_CALL_SELF("testmethod6", &_0, 59, a, b);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall13) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_PARENT(test_scall_ce, this_ptr, "testmethod1", &_0, 60);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall14) {

	int ZEPHIR_LAST_CALL_STATUS;
	zephir_fcall_cache_entry *_0 = NULL;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_PARENT(test_scall_ce, this_ptr, "testmethod2", &_0, 61);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testCall15) {

	int ZEPHIR_LAST_CALL_STATUS;
	ZEPHIR_INIT_THIS();


	ZEPHIR_MM_GROW();

	ZEPHIR_RETURN_CALL_SELF("testmethod7", NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Scall, testMethod16) {

	zval *a_param = NULL, *b_param = NULL;
	long a, b;
	ZEPHIR_INIT_THIS();


	zephir_fetch_params(0, 2, 0, &a_param, &b_param);

	a = zephir_get_intval(a_param);
	b = zephir_get_intval(b_param);


	RETURN_LONG((a + b));

}

PHP_METHOD(Test_Scall, testCall17) {

	zend_bool _0;
	int ZEPHIR_LAST_CALL_STATUS, _1;
	zephir_fcall_cache_entry *_4 = NULL;
	zval *k_param = NULL, *p, p_sub, _3$$3;
	long k, i = 0, j, _2;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&p_sub);
	ZVAL_UNDEF(&_3$$3);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &k_param, &p);

	k = zephir_get_intval(k_param);


	j = 0;
	_2 = k;
	_1 = 1;
	_0 = 0;
	if (_1 <= _2) {
		while (1) {
			if (_0) {
				_1++;
				if (!(_1 <= _2)) {
					break;
				}
			} else {
				_0 = 1;
			}
			i = _1;
			ZEPHIR_CALL_CE_STATIC(&_3$$3, test_scallexternal_ce, "testmethod3", &_4, 0, p, p);
			zephir_check_call_status();
			j += zephir_get_numberval(&_3$$3);
		}
	}
	RETURN_MM_LONG(j);

}

PHP_METHOD(Test_Scall, testCall18) {

	zend_bool _0;
	int ZEPHIR_LAST_CALL_STATUS, _1;
	zephir_fcall_cache_entry *_4 = NULL;
	zval *k_param = NULL, *p, p_sub, _3$$3;
	long k, i = 0, j, _2;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&p_sub);
	ZVAL_UNDEF(&_3$$3);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &k_param, &p);

	k = zephir_get_intval(k_param);


	j = 0;
	_2 = k;
	_1 = 1;
	_0 = 0;
	if (_1 <= _2) {
		while (1) {
			if (_0) {
				_1++;
				if (!(_1 <= _2)) {
					break;
				}
			} else {
				_0 = 1;
			}
			i = _1;
			ZEPHIR_CALL_SELF(&_3$$3, "testmethod16", &_4, 0, p, p);
			zephir_check_call_status();
			j += zephir_get_numberval(&_3$$3);
		}
	}
	RETURN_MM_LONG(j);

}

PHP_METHOD(Test_Scall, testMethodStatic) {

	ZEPHIR_INIT_THIS();


	RETURN_STRING("hello Scall");

}

