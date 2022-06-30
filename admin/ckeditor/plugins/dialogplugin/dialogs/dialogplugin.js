CKEDITOR.dialog.add('dialogplugin', function(editor) {
    CKEDITOR.skins.load(editor, 'dialogplugin');
    return {
        title: 'Message For You',
        minWidth: CKEDITOR.env.ie ? 150 : 120,
        minHeight: 100,
        contents: [
			{
			    id: 'dialog_plugin',
			    label: '',
			    title: '',
			    expand: true,
			    padding: 0,
			    elements:
				[
					{
					    type: 'html',
					    html: '<p>' + 'This is the dialog plugin message :)' + '</p>'
					}
				]
			}
		]
    };
});
