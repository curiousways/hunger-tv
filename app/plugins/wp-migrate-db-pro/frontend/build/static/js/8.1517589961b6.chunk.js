(this.webpackJSONPwpmdb=this.webpackJSONPwpmdb||[]).push([[8],{729:function(e,t,n){"use strict";n.r(t);var a,l=n(0),i=n.n(l),c=n(1),r=n(7),s=n(38),u=n(12),p=n(16),m=n(113),o=n.n(m),d=n(36),f=n.n(d),b=n(17),g=n(41),h=n(18),_=n.n(h),O=n(13),v=n.n(O),j=n(199),E=Object(r.c)(function(e){return{theme_plugin_files:e.theme_plugin_files,panel_info:e.panels,local_version:e.migrations.local_site.theme_plugin_files_version}},{})(function(e){var t="",n=e.theme_plugin_files,a=e.disabled,l=e.local_version,r=[],u=e.panel_info.panelsOpen;if(a)return i.a.createElement(j.a,{message:e.theme_plugin_files.message,pluginSlug:"wp-migrate-db-pro-theme-plugin-files",remoteUpgradable:e.theme_plugin_files.remoteUpgradable,version:l,shortName:s.c});if(e.hasOwnProperty("items")&&e.hasOwnProperty("selected")){e.items.forEach(function(t){_()(e.selected,t.path)&&r.push(t.name)});var p=e.items.length,m=e.selected.length,o=Object(c.c)(Object(c.a)("<b>(%s of %s)</b>"),m,p);!_()(u,e.type)&&n[e.type].enabled&&m>0&&(t="".concat(o," ").concat(r.join(", ")))}return i.a.createElement(i.a.Fragment,null,v()(t))}),y=n(583),P=n(95),w=n(23),S=function(e){var t=Object(r.d)(),n=e.theme_plugin_files,a=e.type,l=e.disabled,c="undefined"!==typeof n&&n[e.type].enabled,s=function(n){if(l)return n.preventDefault(),!1;t(c?Object(w.h)(e.type):Object(w.c)(e.type)),function(e){e.toggleThemePluginFiles(e.type)}(e,e.type)};return i.a.createElement("div",{className:"tpf-panel-header"},i.a.createElement("input",{type:"checkbox",onChange:s,checked:c,id:a}),i.a.createElement("h4",{className:"panel-title"},i.a.createElement("label",{htmlFor:a,onClick:s},e.title," ")))},k=n(25),N=n(153),x=b.a.select(a||(a=Object(p.a)(["\n  min-height: 180px;\n  margin-bottom: 10px;\n"])));var C=function(e,t,n){e.updateSelected(t,n)},F=function(e,t,n){var a=[];if("object"===typeof t){var l=Object.values(t).map(function(e){return e[0].path});n["".concat(e,"_selected")].forEach(function(e){l.includes(e)&&a.push(e)})}return a};var T=function(e,t){var n=e.theme_plugin_files,a=e.panelsOpen,p=e.current_migration,m=e.remote_site,d=e.local_site,b=p.status,h=p.intent,_=function(e){var t=e.theme_plugin_files;return"undefined"!==typeof t.available&&!t.available}(e),O=Object(r.d)(),v=t.title,j=t.type,w=t.panel_name,T=t.items,D=T.map(function(e){return e.path}),U=!1,A=function(e,t,n,a,l){var i=l.site_details,c=F(a,"plugins"===a?i.plugins:i.themes,e);return{enabled:e["".concat(a.slice(0,-1),"_files")].enabled,isOpen:t.includes("".concat(a.slice(0,-1),"_files")),selected:c,selectionEmpty:o()(n,{name:"SELECTED_".concat(a.toUpperCase(),"_EMPTY")})}}(n,a,b,j,"pull"===h?m:d),J=A.enabled,I=A.isOpen,L=A.selected,M=A.selectionEmpty;Object(l.useEffect)(function(){O(e.updateSelected(L,j))},[]),L.length&&J&&!I&&(U=!0);var Y=[];return U&&Y.push("has-divider"),J&&Y.push("enabled"),i.a.createElement(g.a,{title:v,className:Y.join(" "),header:i.a.createElement(S,Object(u.a)({},e,{items:T,disabled:_,selected:L,title:v,type:w})),panelName:w,disabled:_,forceDivider:U,callback:function(t){return Object(N.b)(t,w,I,J,_,e.addOpenPanel,e.removeOpenPanel,function(){return O(Object(s.j)(w))})},bodyClass:"tpf-panel-body",panelSummary:i.a.createElement(E,Object(u.a)({},e,{disabled:_,items:T,selected:L,title:v,type:w}))},i.a.createElement("div",null,i.a.createElement(x,{multiple:!0,value:L,onChange:function(t){return function(e,t,n,a){t(n,[].slice.call(e.target.selectedOptions).map(function(e){return e.value}),a)}(t,C,e,j)}},T.map(function(e){return i.a.createElement("option",{key:f()(),value:e.path},e.name)}))),i.a.createElement("div",{className:"excludes-wrap"},i.a.createElement(y.a,Object(u.a)({},e,{excludes:n.excludes,excludesUpdater:e.updateExcludes}))),i.a.createElement("div",{className:"select-group"},i.a.createElement("p",{className:"multiselect-options"},i.a.createElement("button",{onClick:function(){return e.updateSelected(D,j)}},Object(c.a)("Select All","wp-migrate-db")),i.a.createElement("button",{onClick:function(){return e.updateSelected([],j)}},Object(c.a)("Deselect All","wp-migrate-db")),i.a.createElement("button",{onClick:function(){return function(e,t,n,a){return Object(P.a)(e.updateSelected,t,n,a)}(e,D,L,j)}},Object(c.a)("Invert Selection","wp-migrate-db")))),M&&i.a.createElement(k.c,{className:"error-msg"},Object(c.c)(Object(c.a)("Please select %s files for migration","wp-migrate-db"),"themes"===j?"theme":"plugin")))},D=n(4),U=(n(538),n(34));function A(e,t){var n={};return["themes","plugins"].forEach(function(a,l){var i=e.local_site.site_details[a];"pull"===t&&(i=e.remote_site.site_details[a]);var c=[];for(var r in i){var s=i[r];c.push({name:s[0].name,path:s[0].path})}return n[a]=c}),n}var J=function(e){var t=A(e,e.current_migration.intent).themes;return T(e,{title:Object(c.a)("Theme Files","wp-migrate-db"),type:"themes",panel_name:"theme_files",items:t})},I=function(e){var t=A(e,e.current_migration.intent).plugins;return T(e,{title:Object(c.a)("Plugin Files","wp-migrate-db"),type:"plugins",panel_name:"plugin_files",items:t})};t.default=Object(r.c)(function(e){var t=Object(D.f)("current_migration",e),n=Object(D.f)("local_site",e),a=Object(D.f)("remote_site",e),l=Object(U.a)("panelsOpen",e),i=Object(D.d)("stages",e),c=Object(D.g)("status",e);return{theme_plugin_files:e.theme_plugin_files,current_migration:t,local_site:n,remote_site:a,panelsOpen:l,stages:i,status:c}},{toggleThemePluginFiles:s.j,updateSelected:s.n,togglePanelsOpen:w.l,addOpenPanel:w.c,removeOpenPanel:w.h,updateExcludes:s.m,kickOffTPFStage:s.g})(function(e){return i.a.createElement("div",{className:"theme-plugin-files"},i.a.createElement(J,e),i.a.createElement(I,e))})}}]);