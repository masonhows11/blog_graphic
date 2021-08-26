/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
// jQuery 3
__webpack_require__(Object(function webpackMissingModule() { var e = new Error("Cannot find module '/admin/plugins/jquery/dist/jquery.min'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())); // jQuery UI 1.11.4

/*
require('/resources/admin/plugins/jquery-ui/jquery-ui.min')

$.widget.bridge('uibutton', $.ui.button);
// Bootstrap 3.3.7
require('/resources/admin/plugins/bootstrap/dist/js/bootstrap.min')
// sweetalert 2.1
require('https://cdn.jsdelivr.net/npm/sweetalert2@11')
// ckeditor config file
require('/resources/admin/ckeditor/ckeditor')
CKEDITOR.replace('editor-text', {
    language: 'fa',
    removePlugins: 'image',
});
// file-manager standalone button js conf
require('/resources/admin/file-manager/js/file-manager')
require('/resources/admin/file-manager/js/file-manager.js.map')
////////////////////////// AdminLTE JS Files ////////////////
// AdminLTE for demo purposes
require('/resources/admin/js/demo')
// Slim_scroll
require('/resources/admin/plugins/slimScroll/jquery.slimscroll.min')
// FastClick
require('/resources/admin/plugins/fastclick/lib/fastclick')
// AdminLTE App
require('/resources/admin/js/adminlte.min')

$(function () {
    $('.parent').click(function () {
        $(this).siblings('.child').slideToggle('fast');
    })
})

$(document).ready(function () {
    $('.alert-success').fadeIn().delay(3000).fadeOut();
});
$(document).ready(function () {
    $('.alert-warning').fadeIn().delay(3000).fadeOut();
});
*/
/******/ })()
;