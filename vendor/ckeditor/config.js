/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/ckfinder.html',
    config.filebrowserImageBrowseUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/ckfinder.html?type=Images',
    config.filebrowserFlashBrowseUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/ckfinder.html?type=Flash',
    config.filebrowserUploadUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    config.filebrowserImageUploadUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    config.filebrowserFlashUploadUrl = 'http://localhost:3000/estrutura_mvc/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

};