!function(o){"use strict";function a(e,t){this.$element=o(e),this.options=o.extend({},o.fn.hierarchySelect.defaults,t),this.$button=this.$element.children("button"),this.$menu=this.$element.children(".dropdown-menu"),this.$menuInner=this.$menu.children(".hs-menu-inner"),this.$searchbox=this.$menu.find("input"),this.$hiddenField=this.$element.children("input"),this.previouslySelected=null,this.init()}a.prototype={constructor:a,init:function(){this.setWidth(),this.setHeight(),this.initSelect(),this.clickListener(),this.buttonListener(),this.searchListener()},initSelect:function(){var e=this.$hiddenField.val();this.options.initialValueSet&&e&&0<e.length?this.setValue(e):(e=this.$menuInner.find("a[data-default-selected]:first")).length?this.setValue(e.data("value")):(e=this.$menuInner.find("a:first"),this.setValue(e.data("value")))},setWidth:function(){var e;this.$searchbox.attr("size",1),"auto"===this.options.width?(e=this.$menu.width(),this.$element.css("min-width",e+2+"px")):this.options.width?(this.$element.css("width",this.options.width),this.$menu.css("min-width",this.options.width),this.$button.css("width","100%")):this.$element.css("min-width","42px")},setHeight:function(){this.options.height&&(this.$menu.css("overflow","hidden"),this.$menuInner.css({"max-height":this.options.height,"overflow-y":"auto"}))},getText:function(){return this.$button.text()},getValue:function(){return this.$hiddenField.val()},setValue:function(e){e=this.$menuInner.find('a[data-value="'+e+'"]:first');this.setSelected(e)},enable:function(){this.$button.removeAttr("disabled")},disable:function(){this.$button.attr("disabled","disabled")},setSelected:function(e){var t,n;e.length&&this.previouslySelected!==e&&(t=e.text(),e.data("display-val")&&(t=e.data("display-val")),n=e.data("value"),this.previouslySelected=e,this.$button.html(t),this.$hiddenField.val(n),this.$menu.find(".active").removeClass("active"),this.options.onChange&&this.options.onChange(n,t),this.options.resetSearchOnSelection&&this.resetSearch(),e.addClass("active"))},moveUp:function(){var e=this.$menuInner.find("a:not(.d-none,.disabled)"),t=this.$menuInner.find(".active"),t=e.index(t);void 0!==e[t-1]&&(this.$menuInner.find(".active").removeClass("active"),e[t-1].classList.add("active"),n(this.$menuInner[0],e[t-1]))},moveDown:function(){var e=this.$menuInner.find("a:not(.d-none,.disabled)"),t=this.$menuInner.find(".active"),t=e.index(t);void 0!==e[t+1]&&(this.$menuInner.find(".active").removeClass("active"),e[t+1]&&(e[t+1].classList.add("active"),n(this.$menuInner[0],e[t+1])))},resetSearch:function(){this.$searchbox.val("").trigger("propertychange")},selectItem:function(){var e=this,t=this.$menuInner.find(".active");t.hasClass("d-none")||t.hasClass("disabled")||(setTimeout(function(){e.$button.focus()},5),t&&this.setSelected(t),this.$button.dropdown("toggle"))},clickListener:function(){var s=this;this.$element.on("show.bs.dropdown",function(){var n=s.$menuInner.find(".active");n&&setTimeout(function(){var e=n[0],t=n[0].parentNode;t.scrollTop<=e.offsetTop-t.offsetTop&&t.scrollTop+t.clientHeight>e.offsetTop+e.clientHeight||(e.parentNode.scrollTop=e.offsetTop-e.parentNode.offsetTop)},0)}),this.$element.on("hide.bs.dropdown",function(){s.previouslySelected&&s.setSelected(s.previouslySelected)}),this.$element.on("shown.bs.dropdown",function(){s.previouslySelected=s.$menuInner.find(".active"),s.$searchbox.focus()}),this.$menuInner.on("click","a",function(e){e.preventDefault();var t=o(this);t.hasClass("disabled")?e.stopPropagation():s.setSelected(t)})},buttonListener:function(){var t=this;this.options.search||this.$button.on("keydown",function(e){switch(e.keyCode){case 9:t.$element.hasClass("show")&&e.preventDefault();break;case 13:t.$element.hasClass("show")&&(e.preventDefault(),t.selectItem());break;case 27:t.$element.hasClass("show")&&(e.preventDefault(),e.stopPropagation(),t.$button.focus(),t.previouslySelected&&t.setSelected(t.previouslySelected),t.$button.dropdown("toggle"));break;case 38:t.$element.hasClass("show")&&(e.preventDefault(),e.stopPropagation(),t.moveUp());break;case 40:t.$element.hasClass("show")&&(e.preventDefault(),e.stopPropagation(),t.moveDown())}})},searchListener:function(){var n=this;this.options.search?(this.$searchbox.on("keydown",function(e){switch(e.keyCode){case 9:e.preventDefault(),e.stopPropagation(),n.$menuInner.click(),n.$button.focus();break;case 13:n.selectItem();break;case 27:e.preventDefault(),e.stopPropagation(),n.$button.focus(),n.previouslySelected&&n.setSelected(n.previouslySelected),n.$button.dropdown("toggle");break;case 38:e.preventDefault(),n.moveUp();break;case 40:e.preventDefault(),n.moveDown()}}),this.$searchbox.on("input propertychange",function(e){e.preventDefault();var t=n.$searchbox.val().toLowerCase(),e=n.$menuInner.find("a");0===t.length?e.each(function(){var e=o(this);e.toggleClass("disabled",!1),e.toggleClass("d-none",!1)}):e.each(function(){var e=o(this);-1!==e.text().toLowerCase().indexOf(t)?(e.toggleClass("disabled",!1),e.toggleClass("d-none",!1),n.options.hierarchy&&function(e){for(var t=e,n=t.data("level");"object"==typeof t&&0<t.length&&1<n;)(t=t.prevAll('a[data-level="'+--n+'"]:first')).hasClass("d-none")&&(t.toggleClass("disabled",!0),t.removeClass("d-none"))}(e)):(e.toggleClass("disabled",!1),e.toggleClass("d-none",!0))})})):this.$searchbox.parent().toggleClass("d-none",!0)}};var e=o.fn.hierarchySelect;function n(e,t){e.offsetHeight+e.scrollTop<t.offsetTop+t.offsetHeight?e.scrollTop=t.offsetTop+t.offsetHeight-e.offsetHeight:e.scrollTop>=t.offsetTop-e.offsetTop&&(e.scrollTop=t.offsetTop-e.offsetTop)}o.fn.hierarchySelect=function(n){var s,i=Array.prototype.slice.call(arguments,1),e=this.each(function(){var e=o(this),t=e.data("HierarchySelect");t||e.data("HierarchySelect",t=new a(this,"object"==typeof n&&n)),"string"==typeof n&&(s=t[n].apply(t,i))});return void 0===s?e:s},o.fn.hierarchySelect.defaults={width:"auto",height:"256px",hierarchy:!0,search:!0,initialValueSet:!1,resetSearchOnSelection:!1},o.fn.hierarchySelect.Constructor=a,o.fn.hierarchySelect.noConflict=function(){return o.fn.hierarchySelect=e,this}}(jQuery);