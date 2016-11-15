
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
#include "kernel/memory.h"
#include "kernel/fcall.h"


/**
 * Variable declaration
 */
ZEPHIR_INIT_CLASS(Test_DeclareTest) {

	ZEPHIR_REGISTER_CLASS(Test, DeclareTest, test, declaretest, test_declaretest_method_entry, 0);

	return SUCCESS;

}

PHP_METHOD(Test_DeclareTest, testStringDeclare1) {

	zval *a = NULL;

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(a);
	ZVAL_STRING(a, "/@(\w+)(?:\s*(?:\(\s*)?(.*?)(?:\s*\))?)??\s*(?:\n|\*\/)/", 1);
	RETURN_CCTOR(a);

}

PHP_METHOD(Test_DeclareTest, testStringDeclare2) {

	zval *a = NULL;

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(a);
	ZVAL_STRING(a, "/(\w+)\s*=\s*(\[[^\]]*\]|\"[^\"]*\"|[^,)]*)\s*(?:,|$)/", 1);
	RETURN_CCTOR(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare1) {

	int a;


	a = 1;
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare2) {

	unsigned int a;


	a = 1;
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare3) {

	double a;


	a = 1.0;
	RETURN_DOUBLE(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare4) {

	double a;


	a = 1.0;
	RETURN_DOUBLE(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare5) {

	char a;


	a = 'A';
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare6) {

	unsigned char a;


	a = 'A';
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare7) {

	long a;


	a = 1;
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare8) {

	zend_bool a;


	a = 1;
	RETURN_BOOL(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare9) {

	zend_bool a;


	a = 0;
	RETURN_BOOL(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare10) {

	int a;


	a = 10;
	RETURN_LONG(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare11) {

	double a;


	a = 10.5;
	RETURN_DOUBLE(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare12) {

	zend_bool a;


	a = 0;
	RETURN_BOOL(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare13) {

	zend_bool a;


	a = 1;
	RETURN_BOOL(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare14) {

	zval *a = NULL;

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(a);
	ZVAL_STRING(a, "hello", 1);
	RETURN_CCTOR(a);

}

PHP_METHOD(Test_DeclareTest, testDeclare15) {

	zval *a = NULL;

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(a);
	ZVAL_NULL(a);
	RETURN_CCTOR(a);

}

PHP_METHOD(Test_DeclareTest, testDeclareMcallExpression) {

	zval *a = NULL;
	int ZEPHIR_LAST_CALL_STATUS;

	ZEPHIR_MM_GROW();

	ZEPHIR_CALL_METHOD(&a, this_ptr, "testdeclare14", NULL, 0);
	zephir_check_call_status();
	RETURN_CCTOR(a);

}

