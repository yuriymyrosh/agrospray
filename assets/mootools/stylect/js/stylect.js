/* Contao Open Source CMS, (c) 2005-2014 Leo Feyer, LGPL license */
var Stylect={isWebkit:Browser.chrome||Browser.safari||navigator.userAgent.match(/(?:webkit|khtml)/i),template:new Element("div",{"class":"styled_select",html:"<span></span><b><i></i></b>"}),update:function(e){var t=e.retrieve("div"),n=e.getElement('option[value="'+Slick.escapeRegExp(e.value)+'"]');t&&n&&t.getElement("span").set("text",n.get("text"))},keydown:function(e){setTimeout(function(){Stylect.update(e)},100)},focus:function(e){e.addClass("focused")},blur:function(e){e.removeClass("focused")},convertSelects:function(){if(Browser.ie6||Browser.ie7||Browser.ie8)return;$$("select").each(function(e){if(e.get("multiple"))return;if(e.hasClass("tl_chosen"))return;var t=e.get("class"),n=e.retrieve("div"),r=e.get("style");n||(n=Stylect.template.clone(),n.addClass(t).inject(e,"before")),e.setStyle("opacity",0),Stylect.isWebkit&&e.setStyle("margin-bottom","4px"),e.addEvents({change:function(){Stylect.update(e)},keydown:function(){Stylect.keydown(e)},focus:function(){Stylect.focus(n)},blur:function(){Stylect.blur(n)}}),e.disabled&&n.addClass("disabled"),e.hasClass("active")&&n.addClass("active"),r&&r.test("(^width|[^-]width)")&&n.setStyle("width",e.getStyle("width")),e.store("div",n),Stylect.update(e)})}};window.addEvent("domready",function(){Stylect.convertSelects()}),window.addEvent("ajax_change",function(){Stylect.convertSelects()});