
extern zend_class_entry *test_4__closure_ce;

ZEPHIR_INIT_CLASS(test_4__closure);

PHP_METHOD(test_4__closure, __invoke);

ZEND_BEGIN_ARG_INFO_EX(arginfo_test_4__closure___invoke, 0, 0, 1)
	ZEND_ARG_INFO(0, param1)
ZEND_END_ARG_INFO()

ZEPHIR_INIT_FUNCS(test_4__closure_method_entry) {
	PHP_ME(test_4__closure, __invoke, arginfo_test_4__closure___invoke, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_FE_END
};
