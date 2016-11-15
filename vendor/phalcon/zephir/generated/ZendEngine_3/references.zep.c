
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


ZEPHIR_INIT_CLASS(Test_References) {

	ZEPHIR_REGISTER_CLASS(Test, References, test, references, test_references_method_entry, 0);

	return SUCCESS;

}

PHP_METHOD(Test_References, assignByRef) {

	ZEPHIR_INIT_THIS();



}

