/*
[{"btnName":"Inline Code","className":"redactor_format_pre","wrap":"code","forceBlock":"0"}]
 */

if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.addattributes = {
	init: function()
	{
		try { this.opts.addAttributes = jQuery.parseJSON(this.opts.addAttributes); } catch(e) {} 

		this.opts.changeCallback = function() { this.addAttributes(); }
	},
	addAttributes: function()
	{
		var editor = this.$editor;
		jQuery.each(this.opts.addAttributes, function(i, data) {
			for(var tag in data) {
				editor.find(tag).each(function(i, elem) {
					jQuery.each(data[tag], function(i, tagData) {
						for(var attr in tagData) {
							$(elem).prop(attr, tagData[attr]);
						}
					});
				});
			}
		});
		this.sync();
	},
};