!function(){"use strict";function e(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function t(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}function n(e,n,o){return n&&t(e.prototype,n),o&&t(e,o),e}function o(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&r(e,t)}function a(e){return(a=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function r(e,t){return(r=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function l(e,t){return!t||"object"!=typeof t&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function c(e){var t="àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;",n=new RegExp(t.split("").join("|"),"g");return e.toString().toLowerCase().replace(/\s+/g,"-").replace(n,(function(e){return"aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------".charAt(t.indexOf(e))})).replace(/&/g,"-and-").replace(/[^\w\-]+/g,"").replace(/\-\-+/g,"-").replace(/^-+/,"").replace(/-+$/,"")}var i=wp.i18n.__,u=wp.element,s=u.Component,p=u.Fragment,d=wp.blockEditor,m=d.PanelColorSettings,f=d.InspectorControls,g=d.InspectorAdvancedControls,b=d.InnerBlocks,y=wp.components,C=y.PanelBody,h=y.TextControl,k=function(t){function r(){return e(this,r),l(this,a(r).apply(this,arguments))}return o(r,t),n(r,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=e.className,o=e.setAttributes,a=t.pairedID,r=t.groupID,l=t.textColor,u=t.backgroundColor,s=t.attrID,d={color:l||"",backgroundColor:u||""};return React.createElement(p,null,React.createElement(f,null,React.createElement(C,{title:i("Options","modal"),initialOpen:!1},React.createElement(h,{label:i("Paired ID","modal"),help:i("Associates this content with another paired element.","modal"),type:"text",value:a,onChange:function(e){return o({pairedID:e})}}),React.createElement(h,{label:i("Group ID","modal"),help:i("Associates this content with other paired elements.","modal"),type:"text",value:r,onChange:function(e){return o({groupID:e})}})),React.createElement(m,{title:i("Color settings","modal"),initialOpen:!1,colorSettings:[{label:i("Text Color","modal"),value:l,onChange:function(e){return o({textColor:e})}},{label:i("Background Color","modal"),value:u,onChange:function(e){return o({backgroundColor:e})}}]})),React.createElement(g,null,React.createElement(h,{label:i("Custom CSS ID","modal"),type:"text",value:s,onChange:function(e){return o({attrID:e})}})),React.createElement("div",{id:"".concat(s||""),className:"".concat(n||""),"data-src":"#".concat(a?c(a):""),"data-fancybox":"".concat(r||""),"data-touch":"false",style:d},React.createElement(b,null)))}}]),r}(s),w=(wp.i18n.__,wp.element.Component),v=wp.blockEditor.InnerBlocks,E=function(t){function r(){return e(this,r),l(this,a(r).apply(this,arguments))}return o(r,t),n(r,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=e.className,o=t.pairedID,a=t.groupID,r=t.textColor,l=t.backgroundColor,i=t.attrID,u={color:r||"",backgroundColor:l||""};return React.createElement("a",{id:"".concat(i||""),className:"".concat(n||""),"data-src":"#".concat(o?c(o):""),"data-fancybox":"".concat(a||""),"data-touch":"false",href:"javascript:;",style:u},React.createElement(v.Content,null))}}]),r}(w),I={name:"modal/inline-link",category:"common",attributes:{pairedID:{type:"string",default:"999999"},groupID:{type:"string",default:""},attrID:{type:"string",default:""},textColor:{type:"string",default:""},backgroundColor:{type:"string",default:""}}},_=wp.i18n.__,R=I.name,x=I.category,D=I.attributes,O={title:_("Inline Link","modal"),description:_("An inline modal link block.","modal"),icon:"admin-links",category:x,keywords:[_("inline modal popup content modal","modal")],supports:{align:["wide","full"]},attributes:D,edit:k,save:E},j=Object.freeze({__proto__:null,name:R,category:x,metadata:I,settings:O}),P=wp.i18n.__,A=wp.element,B=A.Component,N=A.Fragment,S=wp.blockEditor,T=S.PanelColorSettings,z=S.InspectorControls,F=(S.InspectorAdvancedControls,S.InnerBlocks),L=wp.components,G=L.PanelBody,M=L.TextControl,$=function(t){function r(){return e(this,r),l(this,a(r).apply(this,arguments))}return o(r,t),n(r,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=e.className,o=e.setAttributes,a=t.pairedID,r=t.textColor,l=t.backgroundColor,i={color:r||"",backgroundColor:l||""};return React.createElement(N,null,React.createElement(z,null,React.createElement(G,{title:P("Options","modal"),initialOpen:!1},React.createElement(M,{label:P("Paired ID","modal"),help:P("Associates this content with another paired element.","modal"),type:"text",value:a,onChange:function(e){return o({pairedID:e})}})),React.createElement(T,{title:P("Color settings","modal"),initialOpen:!1,colorSettings:[{label:P("Text Color","modal"),value:r,onChange:function(e){return o({textColor:e})}},{label:P("Background Color","modal"),value:l,onChange:function(e){return o({backgroundColor:e})}}]})),React.createElement("div",{id:"".concat(a?c(a):""),className:"".concat(n||""),style:i},React.createElement(F,null)))}}]),r}(B),q=(wp.i18n.__,wp.element.Component),H=wp.blockEditor.InnerBlocks,J=function(t){function r(){return e(this,r),l(this,a(r).apply(this,arguments))}return o(r,t),n(r,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=e.className,o=t.pairedID,a=t.textColor,r=t.backgroundColor,l={color:a||"",backgroundColor:r||"",display:"none"};return React.createElement("div",{id:"".concat(o?c(o):""),className:"".concat(n||""),style:l},React.createElement(H.Content,null))}}]),r}(q),K={name:"modal/inline-content",category:"common",attributes:{pairedID:{type:"string",default:"999999"},textColor:{type:"string",default:""},backgroundColor:{type:"string",default:""}}},Q=wp.i18n.__,U=K.name,V=K.category,W=K.attributes,X={title:Q("Inline Content","modal"),description:Q("An inline modal content block.","modal"),icon:"editor-code",category:V,keywords:[Q("inline modal popup content modal","modal")],supports:{align:["wide","full"]},attributes:W,edit:$,save:J},Y=Object.freeze({__proto__:null,name:U,category:V,metadata:K,settings:X}),Z=wp.blocks,ee=Z.registerBlockType;(0,Z.registerBlockCollection)("modal",{title:"Modal"}),[j,Y].forEach((function(e){var t=e.name,n=e.settings;ee(t,n)}))}();