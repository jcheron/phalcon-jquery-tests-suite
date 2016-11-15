
extern zend_class_entry *test_mcallinternal_ce;

ZEPHIR_INIT_CLASS(Test_McallInternal);

void zep_Test_McallInternal_a(int ht, zval *return_value, zval *this_ptr, int return_value_used);
void zep_Test_McallInternal_b(int ht, zval *return_value, zval *this_ptr, int return_value_used, zval *a_ext , zval *b_ext );
void zep_Test_McallInternal_c(int ht, zval *return_value, zval *this_ptr, int return_value_used, zval *a_param_ext, zval *b_param_ext);
PHP_METHOD(Test_McallInternal, e);
PHP_METHOD(Test_McallInternal, d);
PHP_METHOD(Test_McallInternal, f);
PHP_METHOD(Test_McallInternal, g);
void zep_Test_McallInternal_other(int ht, zval *return_value, zval *this_ptr, int return_value_used, zval *a_param_ext, zval *b_param_ext);
PHP_METHOD(Test_McallInternal, callFibonacci);

ZEND_BEGIN_ARG_INFO_EX(arginfo_test_mcallinternal_b, 0, 0, 2)
	ZEND_ARG_INFO(0, a)
	ZEND_ARG_INFO(0, b)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_INFO_EX(arginfo_test_mcallinternal_c, 0, 0, 2)
	ZEND_ARG_INFO(0, a)
	ZEND_ARG_INFO(0, b)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_INFO_EX(arginfo_test_mcallinternal_other, 0, 0, 2)
	ZEND_ARG_INFO(0, a)
	ZEND_ARG_INFO(0, b)
ZEND_END_ARG_INFO()

ZEPHIR_INIT_FUNCS(test_mcallinternal_method_entry) {
	PHP_ME(Test_McallInternal, e, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(Test_McallInternal, d, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(Test_McallInternal, f, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(Test_McallInternal, g, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(Test_McallInternal, callFibonacci, NULL, ZEND_ACC_PUBLIC)
	PHP_FE_END
};
