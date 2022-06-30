/*
Copyright (C) 2010 Jonnas Fonini <contato@fonini.net>

Este programa é um software livre; você pode redistribui-lo e/ou 
modifica-lo dentro dos termos da Licença Pública Geral GNU como 
publicada pela Fundação do Software Livre (FSF); na versão 2 da 
Licença, ou (na sua opnião) qualquer versão.

Este programa é distribuido na esperança que possa ser  util, 
mas SEM NENHUMA GARANTIA; sem uma garantia implicita de ADEQUAÇÂO a qualquer
MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU para maiores detalhes.

Você deve ter recebido uma cópia da Licença Pública Geral GNU
junto com este programa, se não, escreva para a Fundação do Software Livre(FSF) Inc., 
51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

CKEDITOR.dialog.add( 'cor', function( editor )
{
	return {
		title : 'Inserir divs coloridas',
		minWidth : 390,
		minHeight : 230,
		contents : [
		{
			id : 'urlTab',
			label : 'Cor do fundo',
			title : 'Cor do fundo',
			elements :
			[
				{
					id : 'cor',
					type : 'text',
					label : 'Coloque a cor do fundo, em HEX. EX: #000000'
				},
			]
		},
        ],
		onOk : function() {
			var editor = this.getParentEditor();
			var cor = this.getValueOf( 'urlTab', 'cor' );
					cor = cor.replace(/^[^v]+v.(.{11}).*/,"$1");
					editor.insertHtml('<div style="background:'+cor+';padding:4px;color:#000;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;margin:0 auto;width:98%"></div>');
		},
	buttons : [ CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton ]
	};
} );

CKEDITOR.plugins.add( 'cor',
{
	init : function( editor )
	{
		var command = editor.addCommand( 'cor', new CKEDITOR.dialogCommand( 'cor' ) );
		command.modes = { wysiwyg:1, source:1 };
		command.canUndo = false;

		editor.ui.addButton( 'cor',
		{
			label : 'Inserir div colorida',
			command : 'cor',
			icon : this.path + 'plugin.png'
		});

		CKEDITOR.dialog.add( 'cor', 'cor' );
	}
});
