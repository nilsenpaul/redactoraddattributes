Redactor Add Attributes for Craft
===========

This plugin is a Craft wrapper for a Redactor plugin that can be used to automatically add attributes to tags in Redactor. You could use it to add a class to every img-tag, for example.


Usage
---
Download the code and put it in a folder named redactoraddattributes in your craft plugins folder. Go to Settings > Plugins 
and install it. You can now click on the plugin name to enter the settings.

In the settings you can add content to the only field there is. The JSON object you have to provide is an array 
with the different attributes you want to add, and the tags you want to add them to. It may look something like this:

    [
        { 
        	"img": [
        		{ "class": "img img-responsive" },
        	],
        	"p": [
        		{ "class": "text-paragraph" },
        	]
        },
    ]


The last thing you need to do is enable the Add Attributes plugin in the Redactor configuration and hook in the configuration. 
Here's an example (could be myredactor.json in /craft/config/redactor):

    {
	    buttons: ['formatting','italic','unorderedlist','orderedlist','link','table','html'],
        formattingTags: ['p', 'h3'],
	    plugins: ['fullscreen', 'addattributes'],
        addAttributes: RedactorAddAttributes.addAttributesJson,
    }


That's about it.


Known issues
---
- Stopped working after Craft 2.3.2624. Haven't had time to fix this yet.
- Classes do not get added, but replace any existing class attribute. 


Todo/plans
---
- Add a table-field-style settings page



Changelog
---
### Version 0.1
 - Initial public release
