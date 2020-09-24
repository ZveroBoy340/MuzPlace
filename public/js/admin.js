!function(e){var t=window.webpackHotUpdate;window.webpackHotUpdate=function(e,o){!function(e,t){if(!b[e]||!y[e])return;for(var o in y[e]=!1,t)Object.prototype.hasOwnProperty.call(t,o)&&(v[o]=t[o]);0==--g&&0===w&&H()}(e,o),t&&t(e,o)};var o,n=!0,r="8e5eb535d4cb8ae017b2",i={},s=[],c=[];function a(e){var t=A[e];if(!t)return I;var n=function(n){return t.hot.active?(A[n]?-1===A[n].parents.indexOf(e)&&A[n].parents.push(e):(s=[e],o=n),-1===t.children.indexOf(n)&&t.children.push(n)):(console.warn("[HMR] unexpected require("+n+") from disposed module "+e),s=[]),I(n)},r=function(e){return{configurable:!0,enumerable:!0,get:function(){return I[e]},set:function(t){I[e]=t}}};for(var i in I)Object.prototype.hasOwnProperty.call(I,i)&&"e"!==i&&"t"!==i&&Object.defineProperty(n,i,r(i));return n.e=function(e){return"ready"===u&&d("prepare"),w++,I.e(e).then(t,(function(e){throw t(),e}));function t(){w--,"prepare"===u&&(m[e]||x(e),0===w&&0===g&&H())}},n.t=function(e,t){return 1&t&&(e=n(e)),I.t(e,-2&t)},n}function l(e){var t={_acceptedDependencies:{},_declinedDependencies:{},_selfAccepted:!1,_selfDeclined:!1,_disposeHandlers:[],_main:o!==e,active:!0,accept:function(e,o){if(void 0===e)t._selfAccepted=!0;else if("function"==typeof e)t._selfAccepted=e;else if("object"==typeof e)for(var n=0;n<e.length;n++)t._acceptedDependencies[e[n]]=o||function(){};else t._acceptedDependencies[e]=o||function(){}},decline:function(e){if(void 0===e)t._selfDeclined=!0;else if("object"==typeof e)for(var o=0;o<e.length;o++)t._declinedDependencies[e[o]]=!0;else t._declinedDependencies[e]=!0},dispose:function(e){t._disposeHandlers.push(e)},addDisposeHandler:function(e){t._disposeHandlers.push(e)},removeDisposeHandler:function(e){var o=t._disposeHandlers.indexOf(e);o>=0&&t._disposeHandlers.splice(o,1)},check:E,apply:C,status:function(e){if(!e)return u;f.push(e)},addStatusHandler:function(e){f.push(e)},removeStatusHandler:function(e){var t=f.indexOf(e);t>=0&&f.splice(t,1)},data:i[e]};return o=void 0,t}var f=[],u="idle";function d(e){u=e;for(var t=0;t<f.length;t++)f[t].call(null,e)}var p,v,h,g=0,w=0,m={},y={},b={};function S(e){return+e+""===e?+e:e}function E(e){if("idle"!==u)throw new Error("check() is only allowed in idle status");return n=e,d("check"),(t=1e4,t=t||1e4,new Promise((function(e,o){if("undefined"==typeof XMLHttpRequest)return o(new Error("No browser support"));try{var n=new XMLHttpRequest,i=I.p+""+r+".hot-update.json";n.open("GET",i,!0),n.timeout=t,n.send(null)}catch(e){return o(e)}n.onreadystatechange=function(){if(4===n.readyState)if(0===n.status)o(new Error("Manifest request to "+i+" timed out."));else if(404===n.status)e();else if(200!==n.status&&304!==n.status)o(new Error("Manifest request to "+i+" failed."));else{try{var t=JSON.parse(n.responseText)}catch(e){return void o(e)}e(t)}}}))).then((function(e){if(!e)return d("idle"),null;y={},m={},b=e.c,h=e.h,d("prepare");var t=new Promise((function(e,t){p={resolve:e,reject:t}}));v={};return x(0),"prepare"===u&&0===w&&0===g&&H(),t}));var t}function x(e){b[e]?(y[e]=!0,g++,function(e){var t=document.createElement("script");t.charset="utf-8",t.src=I.p+""+e+"."+r+".hot-update.js",document.head.appendChild(t)}(e)):m[e]=!0}function H(){d("ready");var e=p;if(p=null,e)if(n)Promise.resolve().then((function(){return C(n)})).then((function(t){e.resolve(t)}),(function(t){e.reject(t)}));else{var t=[];for(var o in v)Object.prototype.hasOwnProperty.call(v,o)&&t.push(S(o));e.resolve(t)}}function C(t){if("ready"!==u)throw new Error("apply() is only allowed in ready status");var o,n,c,a,l;function f(e){for(var t=[e],o={},n=t.map((function(e){return{chain:[e],id:e}}));n.length>0;){var r=n.pop(),i=r.id,s=r.chain;if((a=A[i])&&!a.hot._selfAccepted){if(a.hot._selfDeclined)return{type:"self-declined",chain:s,moduleId:i};if(a.hot._main)return{type:"unaccepted",chain:s,moduleId:i};for(var c=0;c<a.parents.length;c++){var l=a.parents[c],f=A[l];if(f){if(f.hot._declinedDependencies[i])return{type:"declined",chain:s.concat([l]),moduleId:i,parentId:l};-1===t.indexOf(l)&&(f.hot._acceptedDependencies[i]?(o[l]||(o[l]=[]),p(o[l],[i])):(delete o[l],t.push(l),n.push({chain:s.concat([l]),id:l})))}}}}return{type:"accepted",moduleId:e,outdatedModules:t,outdatedDependencies:o}}function p(e,t){for(var o=0;o<t.length;o++){var n=t[o];-1===e.indexOf(n)&&e.push(n)}}t=t||{};var g={},w=[],m={},y=function(){console.warn("[HMR] unexpected require("+x.moduleId+") to disposed module")};for(var E in v)if(Object.prototype.hasOwnProperty.call(v,E)){var x;l=S(E);var H=!1,C=!1,M=!1,_="";switch((x=v[E]?f(l):{type:"disposed",moduleId:E}).chain&&(_="\nUpdate propagation: "+x.chain.join(" -> ")),x.type){case"self-declined":t.onDeclined&&t.onDeclined(x),t.ignoreDeclined||(H=new Error("Aborted because of self decline: "+x.moduleId+_));break;case"declined":t.onDeclined&&t.onDeclined(x),t.ignoreDeclined||(H=new Error("Aborted because of declined dependency: "+x.moduleId+" in "+x.parentId+_));break;case"unaccepted":t.onUnaccepted&&t.onUnaccepted(x),t.ignoreUnaccepted||(H=new Error("Aborted because "+l+" is not accepted"+_));break;case"accepted":t.onAccepted&&t.onAccepted(x),C=!0;break;case"disposed":t.onDisposed&&t.onDisposed(x),M=!0;break;default:throw new Error("Unexception type "+x.type)}if(H)return d("abort"),Promise.reject(H);if(C)for(l in m[l]=v[l],p(w,x.outdatedModules),x.outdatedDependencies)Object.prototype.hasOwnProperty.call(x.outdatedDependencies,l)&&(g[l]||(g[l]=[]),p(g[l],x.outdatedDependencies[l]));M&&(p(w,[x.moduleId]),m[l]=y)}var R,O=[];for(n=0;n<w.length;n++)l=w[n],A[l]&&A[l].hot._selfAccepted&&m[l]!==y&&O.push({module:l,errorHandler:A[l].hot._selfAccepted});d("dispose"),Object.keys(b).forEach((function(e){!1===b[e]&&function(e){delete installedChunks[e]}(e)}));for(var j,D,U=w.slice();U.length>0;)if(l=U.pop(),a=A[l]){var P={},L=a.hot._disposeHandlers;for(c=0;c<L.length;c++)(o=L[c])(P);for(i[l]=P,a.hot.active=!1,delete A[l],delete g[l],c=0;c<a.children.length;c++){var k=A[a.children[c]];k&&((R=k.parents.indexOf(l))>=0&&k.parents.splice(R,1))}}for(l in g)if(Object.prototype.hasOwnProperty.call(g,l)&&(a=A[l]))for(D=g[l],c=0;c<D.length;c++)j=D[c],(R=a.children.indexOf(j))>=0&&a.children.splice(R,1);for(l in d("apply"),r=h,m)Object.prototype.hasOwnProperty.call(m,l)&&(e[l]=m[l]);var q=null;for(l in g)if(Object.prototype.hasOwnProperty.call(g,l)&&(a=A[l])){D=g[l];var $=[];for(n=0;n<D.length;n++)if(j=D[n],o=a.hot._acceptedDependencies[j]){if(-1!==$.indexOf(o))continue;$.push(o)}for(n=0;n<$.length;n++){o=$[n];try{o(D)}catch(e){t.onErrored&&t.onErrored({type:"accept-errored",moduleId:l,dependencyId:D[n],error:e}),t.ignoreErrored||q||(q=e)}}}for(n=0;n<O.length;n++){var B=O[n];l=B.module,s=[l];try{I(l)}catch(e){if("function"==typeof B.errorHandler)try{B.errorHandler(e)}catch(o){t.onErrored&&t.onErrored({type:"self-accept-error-handler-errored",moduleId:l,error:o,originalError:e}),t.ignoreErrored||q||(q=o),q||(q=e)}else t.onErrored&&t.onErrored({type:"self-accept-errored",moduleId:l,error:e}),t.ignoreErrored||q||(q=e)}}return q?(d("fail"),Promise.reject(q)):(d("idle"),new Promise((function(e){e(w)})))}var A={};function I(t){if(A[t])return A[t].exports;var o=A[t]={i:t,l:!1,exports:{},hot:l(t),parents:(c=s,s=[],c),children:[]};return e[t].call(o.exports,o,o.exports,a(t)),o.l=!0,o.exports}I.m=e,I.c=A,I.d=function(e,t,o){I.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},I.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},I.t=function(e,t){if(1&t&&(e=I(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(I.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)I.d(o,n,function(t){return e[t]}.bind(null,n));return o},I.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return I.d(t,"a",t),t},I.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},I.p="",I.h=function(){return r},a(36)(I.s=36)}([function(e,t,o){var n,r,i={},s=(n=function(){return window&&document&&document.all&&!window.atob},function(){return void 0===r&&(r=n.apply(this,arguments)),r}),c=function(e,t){return t?t.querySelector(e):document.querySelector(e)},a=function(e){var t={};return function(e,o){if("function"==typeof e)return e();if(void 0===t[e]){var n=c.call(this,e,o);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(e){n=null}t[e]=n}return t[e]}}(),l=null,f=0,u=[],d=o(38);function p(e,t){for(var o=0;o<e.length;o++){var n=e[o],r=i[n.id];if(r){r.refs++;for(var s=0;s<r.parts.length;s++)r.parts[s](n.parts[s]);for(;s<n.parts.length;s++)r.parts.push(y(n.parts[s],t))}else{var c=[];for(s=0;s<n.parts.length;s++)c.push(y(n.parts[s],t));i[n.id]={id:n.id,refs:1,parts:c}}}}function v(e,t){for(var o=[],n={},r=0;r<e.length;r++){var i=e[r],s=t.base?i[0]+t.base:i[0],c={css:i[1],media:i[2],sourceMap:i[3]};n[s]?n[s].parts.push(c):o.push(n[s]={id:s,parts:[c]})}return o}function h(e,t){var o=a(e.insertInto);if(!o)throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");var n=u[u.length-1];if("top"===e.insertAt)n?n.nextSibling?o.insertBefore(t,n.nextSibling):o.appendChild(t):o.insertBefore(t,o.firstChild),u.push(t);else if("bottom"===e.insertAt)o.appendChild(t);else{if("object"!=typeof e.insertAt||!e.insertAt.before)throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");var r=a(e.insertAt.before,o);o.insertBefore(t,r)}}function g(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e);var t=u.indexOf(e);t>=0&&u.splice(t,1)}function w(e){var t=document.createElement("style");if(void 0===e.attrs.type&&(e.attrs.type="text/css"),void 0===e.attrs.nonce){var n=function(){0;return o.nc}();n&&(e.attrs.nonce=n)}return m(t,e.attrs),h(e,t),t}function m(e,t){Object.keys(t).forEach((function(o){e.setAttribute(o,t[o])}))}function y(e,t){var o,n,r,i;if(t.transform&&e.css){if(!(i="function"==typeof t.transform?t.transform(e.css):t.transform.default(e.css)))return function(){};e.css=i}if(t.singleton){var s=f++;o=l||(l=w(t)),n=E.bind(null,o,s,!1),r=E.bind(null,o,s,!0)}else e.sourceMap&&"function"==typeof URL&&"function"==typeof URL.createObjectURL&&"function"==typeof URL.revokeObjectURL&&"function"==typeof Blob&&"function"==typeof btoa?(o=function(e){var t=document.createElement("link");return void 0===e.attrs.type&&(e.attrs.type="text/css"),e.attrs.rel="stylesheet",m(t,e.attrs),h(e,t),t}(t),n=H.bind(null,o,t),r=function(){g(o),o.href&&URL.revokeObjectURL(o.href)}):(o=w(t),n=x.bind(null,o),r=function(){g(o)});return n(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;n(e=t)}else r()}}e.exports=function(e,t){if("undefined"!=typeof DEBUG&&DEBUG&&"object"!=typeof document)throw new Error("The style-loader cannot be used in a non-browser environment");(t=t||{}).attrs="object"==typeof t.attrs?t.attrs:{},t.singleton||"boolean"==typeof t.singleton||(t.singleton=s()),t.insertInto||(t.insertInto="head"),t.insertAt||(t.insertAt="bottom");var o=v(e,t);return p(o,t),function(e){for(var n=[],r=0;r<o.length;r++){var s=o[r];(c=i[s.id]).refs--,n.push(c)}e&&p(v(e,t),t);for(r=0;r<n.length;r++){var c;if(0===(c=n[r]).refs){for(var a=0;a<c.parts.length;a++)c.parts[a]();delete i[c.id]}}}};var b,S=(b=[],function(e,t){return b[e]=t,b.filter(Boolean).join("\n")});function E(e,t,o,n){var r=o?"":n.css;if(e.styleSheet)e.styleSheet.cssText=S(t,r);else{var i=document.createTextNode(r),s=e.childNodes;s[t]&&e.removeChild(s[t]),s.length?e.insertBefore(i,s[t]):e.appendChild(i)}}function x(e,t){var o=t.css,n=t.media;if(n&&e.setAttribute("media",n),e.styleSheet)e.styleSheet.cssText=o;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(o))}}function H(e,t,o){var n=o.css,r=o.sourceMap,i=void 0===t.convertToAbsoluteUrls&&r;(t.convertToAbsoluteUrls||i)&&(n=d(n)),r&&(n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(r))))+" */");var s=new Blob([n],{type:"text/css"}),c=e.href;e.href=URL.createObjectURL(s),c&&URL.revokeObjectURL(c)}},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){},function(e,t,o){"use strict";o.r(t);o(37),o(39),o(40),o(41),o(42),o(43),o(44),o(45),o(46),o(47),o(48),o(49),o(50),o(51),o(52),o(53),o(54),o(55),o(56),o(57),o(58),o(59),o(60),o(61),o(62),o(63),o(64),o(65),o(66),o(67),o(68),o(69),o(70),o(71),o(72),o(73),o(74),o(75),o(76),o(77),o(78);window.show_popup=function(e){console.log(e),document.querySelector("#"+e).classList.add("popup-wrap--active")},window.close_popup=function(e){console.log(e),document.querySelector("#"+e).classList.remove("popup-wrap--active")},document.querySelector(".popup-wrap")&&document.querySelector(".popup-wrap").addEventListener("click",(function(e){null==e.target.closest(".popup")&&close_popup(e.target.getAttribute("id"))}))},function(e,t,o){var n=o(1);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(1,(function(){var t=o(1);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t){e.exports=function(e){var t="undefined"!=typeof window&&window.location;if(!t)throw new Error("fixUrls requires window.location");if(!e||"string"!=typeof e)return e;var o=t.protocol+"//"+t.host,n=o+t.pathname.replace(/\/[^\/]*$/,"/");return e.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi,(function(e,t){var r,i=t.trim().replace(/^"(.*)"$/,(function(e,t){return t})).replace(/^'(.*)'$/,(function(e,t){return t}));return/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(i)?e:(r=0===i.indexOf("//")?i:0===i.indexOf("/")?o+i:n+i.replace(/^\.\//,""),"url("+JSON.stringify(r)+")")}))}},function(e,t,o){var n=o(2);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(2,(function(){var t=o(2);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(3);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(3,(function(){var t=o(3);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(4);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(4,(function(){var t=o(4);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(5);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(5,(function(){var t=o(5);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(6);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(6,(function(){var t=o(6);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(7);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(7,(function(){var t=o(7);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(8);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(8,(function(){var t=o(8);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(9);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(9,(function(){var t=o(9);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(10);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(10,(function(){var t=o(10);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(11);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(11,(function(){var t=o(11);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(12);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(12,(function(){var t=o(12);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(13);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(13,(function(){var t=o(13);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(14);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(14,(function(){var t=o(14);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(15);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(15,(function(){var t=o(15);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(16);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(16,(function(){var t=o(16);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t){if(document.querySelector(".artists--slider"))new Swiper(".artists--slider .swiper-container",{speed:400,spaceBetween:32,slidesPerView:3,loop:!0,autoHeight:!0})},function(e,t,o){var n=o(17);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(17,(function(){var t=o(17);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(18);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(18,(function(){var t=o(18);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(19);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(19,(function(){var t=o(19);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(20);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(20,(function(){var t=o(20);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(21);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(21,(function(){var t=o(21);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(22);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(22,(function(){var t=o(22);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(23);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(23,(function(){var t=o(23);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(24);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(24,(function(){var t=o(24);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t){window.hideUnderstand=function(){document.querySelector(".understand").classList.add("understand--opacity0"),document.querySelector(".understand").addEventListener("transitionend",(function e(){document.querySelector(".understand").classList.add("understand--hide"),document.querySelector(".understand").removeEventListener("transitionend",e)}))},document.querySelector(".understand .btn")&&document.querySelector(".understand .btn").addEventListener("click",hideUnderstand)},function(e,t,o){var n=o(25);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(25,(function(){var t=o(25);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(26);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(26,(function(){var t=o(26);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(27);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(27,(function(){var t=o(27);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(28);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(28,(function(){var t=o(28);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(29);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(29,(function(){var t=o(29);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(30);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(30,(function(){var t=o(30);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(31);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(31,(function(){var t=o(31);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(32);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(32,(function(){var t=o(32);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(33);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(33,(function(){var t=o(33);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(34);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(34,(function(){var t=o(34);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t,o){var n=o(35);"string"==typeof n&&(n=[[e.i,n,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0},i=o(0)(n,r);n.locals&&(e.exports=n.locals),e.hot.accept(35,(function(){var t=o(35);if("string"==typeof t&&(t=[[e.i,t,""]]),!function(e,t){var o,n=0;for(o in e){if(!t||e[o]!==t[o])return!1;n++}for(o in t)n--;return 0===n}(n.locals,t.locals))throw new Error("Aborting CSS HMR due to changed css-modules locals.");i(t)})),e.hot.dispose((function(){i()}))},function(e,t){function o(e){for(var t=0,o=0;o<e.length;o++)t<$(e[o]).outerHeight()&&(t=$(e[o]).outerHeight());e.css("height",t)}window.onload=function(){for(var e=0;e<n.length;e++){o($(n[e]).find(".need__item:not(.need__item--fill)"))}};var n=$(".need__list")},function(e,t){if(document.querySelector(".event-slider"))new Swiper(".event-slider .swiper-container",{speed:400,spaceBetween:32,autoHeight:!0,slidesPerView:3})},function(e,t){if(document.querySelector(".reviews-slider"))new Swiper(".reviews-slider > .swiper-container",{speed:1e3,spaceBetween:25,autoHeight:!0,slidesPerView:2,on:{slideChange:hideUnderstand}}),new Swiper(".reviews-slider .swiper-slide1 .swiper-container",{speed:400,spaceBetween:15,autoHeight:!0,slidesPerView:5,grabCursor:!0,loop:!0,loopAdditionalSlides:0,navigation:{nextEl:".swiper-slide1 .swiper-button-next",prevEl:".swiper-slide1 .swiper-button-prev"}}),new Swiper(".reviews-slider .swiper-slide2 .swiper-container",{speed:400,spaceBetween:15,autoHeight:!0,slidesPerView:5,grabCursor:!0,loop:!0,navigation:{nextEl:".swiper-slide2 .swiper-button-next",prevEl:".swiper-slide2 .swiper-button-prev"}}),new Swiper(".reviews-slider .swiper-slide3 .swiper-container",{speed:400,spaceBetween:15,autoHeight:!0,slidesPerView:5,grabCursor:!0,loop:!0,navigation:{nextEl:".swiper-slide3 .swiper-button-next",prevEl:".swiper-slide3 .swiper-button-prev"}}),new Swiper(".reviews-slider .swiper-slide4 .swiper-container",{speed:400,spaceBetween:15,autoHeight:!0,slidesPerView:5,grabCursor:!0,loop:!0,navigation:{nextEl:".swiper-slide3 .swiper-button-next",prevEl:".swiper-slide3 .swiper-button-prev"}})},function(e,t){$("body").on("click",".select__value",function(e){$(this).closest(".select").hasClass("select--active")?$(".select--active").removeClass("select--active"):($(".select--active").removeClass("select--active"),$(this).closest(".select").addClass("select--active"))}),$("body").on("click",".select__variant",function(e){var e=$(this).find("span").html();$(this).closest(".select").find(".select__value").html(e),$(this).closest(".select").find(".select__variant--active").removeClass("select__variant--active"),$(this).addClass("select__variant--active"),$(this).closest(".select").removeClass("select--active")}),$("body").mouseup((function(e){var t=$(".select--active");t.is(e.target)||0!==t.has(e.target).length||$(".select--active").removeClass("select--active")}))}]);

$(document).ready(function(){
    if (location.search.indexOf('proposal=success') > -1) {
        $('.popup-message.success .popup-text').text('Заявка на участие успешно отправлена!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('event=added') > -1) {
        $('.popup-message.success .popup-text').text('Ваше мероприятие отправлено на проверку!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('proposal=deleted') > -1) {
        $('.popup-message.success .popup-text').text('Заявка на участие успешно удалена!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('proposal=decline') > -1) {
        $('.popup-message.success .popup-text').text('Заявка на участие успешно отклонена!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('proposal=accept') > -1) {
        $('.popup-message.success .popup-text').text('Заявка на участие успешно принята!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('event=deleted') > -1) {
        $('.popup-message.success .popup-text').text('Ваше мероприятие успешно удалено!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('event=edited') > -1) {
        $('.popup-message.success .popup-text').text('Ваше мероприятие отправлено на проверку!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('proposal=error') > -1) {
        $('.popup-message.error .popup-text').text('У Вас уже есть заявка на эту дату');
        $('.popup-message.error').show(500);
    }
    if (location.search.indexOf('review=added') > -1) {
        $('.popup-message.success .popup-text').text('Ваш отзыв успешно опубликован!');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('review=double') > -1) {
        $('.popup-message.error .popup-text').text('Только один отзыв на одну заявку');
        $('.popup-message.error').show(500);
    }
    if (location.search.indexOf('review=false') > -1) {
        $('.popup-message.error .popup-text').text('Отзыв можно подать только после окончания мероприятия');
        $('.popup-message.error').show(500);
    }
    if (location.search.indexOf('verify=true') > -1) {
        $('.popup-message.success .popup-text').text('Вы подтвердили почту и можете перейти в личный кабинет');
        $('.popup-message.success').show(500);
    }
    if (location.search.indexOf('info=saved') > -1) {
        $('.popup-message.success .popup-text').text('Ваши настройки успешно сохранены!');
        $('.popup-message.success').show(500);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

var genre_events = '';
var type_events = '';
var sort_events = '';

var events_in = '';
var events_out = '';

$("body").on("click",".sort-events",function(){
    sort_events = $(this).attr('data-sort');

    $.ajax({
        url:"/events/filter",
        type:"post",
        data: "sort=" + sort_events + "&type=" + type_events + "&genre=" + genre_events + "&events_in=" + events_in + "&events_out=" + events_out,
        success: function(data){
            $('.events-liste').html(data);
        }
    });
});

$("body").on("click",".type-events",function(){
    type_events = $(this).attr('data-type');

    $.ajax({
        url:"/events/filter",
        type:"post",
        data: "sort=" + sort_events + "&type=" + type_events + "&genre=" + genre_events + "&events_in=" + events_in + "&events_out=" + events_out,
        success: function(data){
            $('.events-liste').html(data);
        }
    });
});

$("body").on("click",".genre-events",function(){
    genre_events = $(this).attr('data-genre');

    $.ajax({
        url:"/events/filter",
        type:"post",
        data: "sort=" + sort_events + "&type=" + type_events + "&genre=" + genre_events + "&events_in=" + events_in + "&events_out=" + events_out,
        success: function(data){
            $('.events-liste').html(data);
        }
    });
});

$("#events_in").datepicker({
    minDate: new Date(),
    onSelect: function(events_in) {
        events_out = $('#events_out').val();
        if (events_in != "" && events_in != null && events_out != "" && events_out != null) {
            $.ajax({
                url:"/events/filter",
                type:"post",
                data: "sort=" + sort_events + "&type=" + type_events + "&genre=" + genre_events + "&events_in=" + events_in + "&events_out=" + events_out,
                success: function(data){
                    $('.events-liste').html(data);
                }
            });
        }
    }
});

$("#events_out").datepicker({
    minDate: new Date(),
    onSelect: function(events_out) {
        events_in = $('#events_in').val();
        if (events_in != "" && events_in != null && events_out != "" && events_out != null) {
            $.ajax({
                url:"/events/filter",
                type:"post",
                data: "sort=" + sort_events + "&type=" + type_events + "&genre=" + genre_events + "&events_in=" + events_in + "&events_out=" + events_out,
                success: function(data){
                    $('.events-liste').html(data);
                }
            });
        }
    }
});

var genre_artists = '';
var type_artists = '';
var sort_artists = 'rating';
var price_artists = '';

var artists_search = '';
var start_date = '';

$("body").on("click",".price-artists",function(){
    price_artists = $(this).attr('data-a_price');
    $.ajax({
        url:"/artists/filter",
        type:"post",
        data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
        success: function(data){
            $('.artists.artists--list').html(data);
        }
    });
});

$("body").on("click",".genre-artists",function(){
    genre_artists = $(this).attr('data-a_genre');
    $.ajax({
        url:"/artists/filter",
        type:"post",
        data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
        success: function(data){
            $('.artists.artists--list').html(data);
        }
    });
});

$("body").on("click",".type-artist",function(){
    type_artists = $(this).attr('data-a_type');
    $.ajax({
        url:"/artists/filter",
        type:"post",
        data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
        success: function(data){
            $('.artists.artists--list').html(data);
        }
    });
});

$("body").on("click",".sort-artists",function(){
    sort_artists = $(this).attr('data-a_sort');
    $.ajax({
        url:"/artists/filter",
        type:"post",
        data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
        success: function(data){
            $('.artists.artists--list').html(data);
        }
    });
});

$("#artists_search").datepicker({
    minDate: new Date(),
    onSelect: function(search_date) {
        artists_search = search_date;
        $.ajax({
            url:"/artists/filter",
            type:"post",
            data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
            success: function(data){
                $('.artists.artists--list').html(data);
            }
        });
    }
});

$(document).ready(function() {
    $('.reviews-item').each(function() {
        var current_textbox = $(this).find('.review-textbox').height();
        if (current_textbox >= 50) {
            $(this).find('.more-review').addClass('active');
        }
    });
    $("body").on("click","#gift_event",function(){
        var link_form = '/invite/'+artist_id;
        var message_invite = 'Здравствуйте! Хочу пригласить Вас на мероприятие';

        $('#invite_message').find('textarea').val(message_invite);
        $('#invite_message').find('form').attr('action', link_form);
        $('#invite_message').show(500);
    });
});

$("body").on("click",".dates-creates .artiste.datepicker-here",function(){
    $(this).datepicker({minDate: new Date()});
});

$("body").on("click",".attached-review",function(){
    if(!$(this).parent('.review-autor').find('.review.review-page').hasClass('active')) {
        $(this).text('Скрыть вложения');
        $(this).addClass('active');
        $(this).parent('.review-autor').find('.review.review-page').addClass('active');
        $(this).parent('.review-autor').find('.review.review-page').show();
    }
    else {
        $(this).text('Показать вложения');
        $(this).removeClass('active');
        $(this).parent('.review-autor').find('.review.review-page').removeClass('active');
        $(this).parent('.review-autor').find('.review.review-page').hide();
    }
});

$("body").on("click",".other_city",function(){
    $('.popup-message.select-city').show(500);
});

$("body").on("click",".other_city",function(){
    $('.popup-message.select-city').show(500);
});

$("body").on("click",".more-review",function(){
    if ($(this).parent('.review-textbox').hasClass('active')) {
        $(this).parent('.review-textbox').removeClass('active');
    } else {
        $(this).parent('.review-textbox').addClass('active');
    }
});

$('.faq_question').click(function() {

    if ($(this).parent().is('.open')) {
        $(this).closest('.faq').find('.faq_answer_container').slideUp();
        $(this).closest('.faq').removeClass('open');
    } else {
        $('.faq_answer_container').slideUp();
        $('.faq').removeClass('open');
        $(this).closest('.faq').find('.faq_answer_container').slideDown();
        $(this).closest('.faq').addClass('open');
    }

});

$("body").on("click","#create-event",function(){
    var error = 0;

    if (error == 0) {
        $( "#submit-create-event" ).submit();
    }
});

$("body").on("click",".event-page-1",function(e){
    $('#create_event_1').addClass('active');
    $('#create_event_2').removeClass('active');
    $('#create_event_3').removeClass('active');
    $('.create__nav-bar span').removeClass('active');
    $('.create__nav-bar span:nth-child(1)').addClass('active');
});

$("body").on("click",".event-page-2",function(e){
    var error = 0;
    if(!$('#name-event').val()) {
        $('.popup-message.error .popup-text').text('Не задано название мероприятия');
        $('.popup-message.error').show(500);
        error = 1;
    }
    if(!$('#description-event').val()) {
        $('.popup-message.error .popup-text').text('Не задано описание мероприятия');
        $('.popup-message.error').show(500);
        error = 1;
    }
    if(!$('#cover').val()) {
        $('.popup-message.error .popup-text').text('Не задана обложка мероприятия');
        $('.popup-message.error').show(500);
        error = 1;
    }

    $( ".artiste.datepicker-here" ).each(function(count) {
        var current_data = $('#date-event_'+count+' .artiste.datepicker-here').val();
        if (current_data == "" || current_data == "00.00.0000") {
            $('.popup-message.error .popup-text').text('Проверьте корректность даты мероприятия');
            $('.popup-message.error').show(500);
            error = 1;
        }
    });

    if (error == 0) {
        $('#create_event_1').removeClass('active');
        $('#create_event_3').removeClass('active');
        $('#create_event_2').addClass('active');
        $('.create__nav-bar span').removeClass('active');
        $('.create__nav-bar span:nth-child(2)').addClass('active');
    }
});

$("body").on("click",".event-page-3",function(e){
    var error = 0;
    $( ".artiste.datepicker-here" ).each(function(count) {
        var current_data = $(this).val();
        /*var current_data = $('#date-event_'+count+' .artiste.datepicker-here').val();*/
        var counter = 0;
        var counter_artist = $('.artist-create-item').length;

        $( ".artist-create-item" ).each(function(index) {
            var finded_artist = $('#artist_'+index+' .data_artist .select__value').text();

            if(current_data == finded_artist) {
                counter++;
            }
            else if (counter == 0 && counter_artist == (index + 1)) {
                $('.popup-message.error .popup-text').text('Не заданы артисты на дату: '+current_data+'');
                $('.popup-message.error').show(500);
                error = 1;
            }
        });
    });
    if (error == 0) {
        $('#create_event_1').removeClass('active');
        $('#create_event_2').removeClass('active');
        $('#create_event_3').addClass('active');
        $('.create__nav-bar span').removeClass('active');
        $('.create__nav-bar span:nth-child(3)').addClass('active');
    }
});

$("body").on("click",".only-organizator",function(){
    $('.popup-message.error .popup-text').text('Доступно только для организаторов');
    $('.popup-message.error').show(500);
});

$("body").on("click",".only-artist",function(){
    $('.popup-message.error .popup-text').text('Заявку могуть подать только артисты');
    $('.popup-message.error').show(500);
});

$("body").on("click",".read-notice",function(){
    var notice_id = $(this).attr('data-notice');
    var notice_element = $(this).closest('.lk-list__item');
    var count_notices = parseInt($('#count_notices').text(), 10);

    $.ajax({
        url:"/lk-messages/" + notice_id,
        type:"GET",
        dataType:"json",
        data: notice_id,
        success: function(data){
            if (data.data == true) {
                notice_element.addClass('readed-notice');
                notice_element.find('.read-notice').remove();
                notice_element.find('.delete-notice').attr('data-viewed', 1);
                count_notices--;
                if (count_notices == 0) {
                    $('#count_notices').remove();
                }
                else {
                    $('#count_notices').text(count_notices);
                }
            }
        }
    });
});

$("body").on("click",".delete-notice",function(){
    var notice_id = $(this).attr('data-notice');
    var notice_viewed = $(this).attr('data-viewed');
    var notice_element = $(this).closest('.lk-list__item');
    var count_notices = parseInt($('#count_notices').text(), 10);
    var count_messages = $(".lk-messages .lk-list__item" ).length;

    $.ajax({
        url:"/lk-messages/delete/" + notice_id,
        type:"GET",
        dataType:"json",
        data: notice_id,
        success: function(data){
            if (data.data == true) {
                notice_element.remove();
                count_messages--;
                if (count_messages == 0) {
                    $('.lk-list__header.after').after('<div class="no-events"><span class="icon-warning">!</span>У Вас нет новых уведомлений</div>');
                }
                if (notice_viewed == 0) {
                    count_notices--;
                    if (count_notices == 0) {
                        $('#count_notices').remove();
                    }
                    else {
                        $('#count_notices').text(count_notices);
                    }
                }
            }
        }
    });
});

$("body").on("click","#all-notice",function(){
    $.ajax({
        url:"/lk-messages/read/all",
        type:"GET",
        dataType:"json",
        data: true,
        success: function(data){
            if (data.data == true) {
                $('.lk-list__item').addClass('readed-notice');
                $('.read-notice').remove();
                $('#count_notices').remove();
            }
        }
    });
});

$("body").on("click",".minus-exp",function(){
    var expirience = $('#expirience').val();
    if (expirience == "") {
        expirience = 0;
    }
    expirience = parseInt(expirience);

    if (expirience > 0) {
        expirience = expirience - 1;
        $('#expirience').val(expirience);
    }
});

$("body").on("click",".plus-exp",function(){
    var expirience = $('#expirience').val();
    if (expirience == "") {
        expirience = 0;
    }
    expirience = parseInt(expirience);

    if (expirience < 99) {
        expirience = expirience + 1;
        $('#expirience').val(expirience);
    }
});

$("#notice_in").datepicker({
    onSelect: function(first) {
        var last = $('#notice_out').val();
        if (first != "" && first != null && last != "" && last != null) {
            $.ajax({
                url:"/lk-messages/date/" + first + "/" + last,
                type:"GET",
                dataType:"json",
                data: true,
                success: function(data){
                    if (data.data == true) {
                        $('.lk-list__item').addClass('old');
                        $('.notices-paginator').addClass('old');
                        $('.no-events').addClass('old');
                        $('.lk-list .lk-list__header.after').after(data.result);
                        if (!$('.btn-reset-ajax').length) {
                            $('.lk-messages .lk-list').append('<a class="btn-reset-ajax">Сбросить фильтр</a>');
                        }
                    }
                }
            });
        }
    }
});

$("#notice_out").datepicker({
    onSelect: function(last) {
        var first = $('#notice_in').val();
        if (first != "" && first != null && last != "" && last != null) {
            $.ajax({
                url:"/lk-messages/date/" + first + "/" + last,
                type:"GET",
                dataType:"json",
                data: true,
                success: function(data){
                    if (data.data == true) {
                        $('.lk-list__item').addClass('old');
                        $('.notices-paginator').addClass('old');
                        $('.no-events').addClass('old');
                        $('.lk-list .lk-list__header.after').after(data.result);
                        if (!$('.btn-reset-ajax').length) {
                            $('.lk-messages .lk-list').append('<a class="btn-reset-ajax">Сбросить фильтр</a>');
                        }
                    }
                }
            });
        }
    }
});

$(".lk-events .datepicker-here").datepicker({
    onSelect: function(date) {
        $.ajax({
            url:"/lk-events/date/" + date,
            type:"GET",
            dataType:"json",
            success: function(data){
                if (data.data == true) {
                    $('#my-response .lk-list__item').addClass('old');
                    $('.btn-reset-ajax').remove();
                    $('.no-events').remove();
                    $('.notices-paginator').addClass('old');
                    $('.no-events').addClass('old');
                    $('#my-response').append(data.result);
                    if (!$('.btn-reset-ajax').length) {
                        $('#my-response').append('<a class="btn-reset-ajax">Сбросить фильтр</a>');
                    }

                }
                else if (data.data == 'artist' ) {
                    $('#my-response').addClass('old');;
                    $('#my-party').addClass('old');;
                    $('#my-response-2').remove();
                    $('#my-party-2').remove();
                    $('.lk-events .list-event-flex').prepend(data.html);

                    if (!$('.btn-reset-ajax').length) {
                        $('#my-response-2').append('<a class="btn-reset-ajax">Сбросить фильтр</a>');
                        $('#my-party-2').append('<a class="btn-reset-ajax">Сбросить фильтр</a>');
                    }

                    if($('#btn_my_party').hasClass('no-active')) {
                        $('#my-response-2').addClass('active');
                    }
                    else {
                        $('#my-party-2').addClass('active');
                    }
                }
            }
        });
    }
});

$("body").on("click",".close-popup",function(){
    $(this).parent('.popup-message').hide(500);
});

$("body").on("click",".btn-reset-ajax",function(){
    $('#my-response-2').remove();
    $('#my-party-2').remove();
    $('.lk-list__item.old').removeClass('old');
    $('.lk-list__item.item-ajax').remove();
    $('.no-events.item-ajax').remove();
    $('.btn-reset-ajax').remove();
    $('.no-events.ajax').remove();

    $('#my-response').removeClass('old');
    $('#my-party').removeClass('old');
});

$("body").on("click",".btn_popup.confirm",function(){
    $(this).closest('.popup-message').hide(500);
});

$("body").on("click",".btn_popup.close",function(){
    $(this).closest('.popup-message').hide(500);
});

$("body").on("click",".btn.add-proposal",function(){
    var link_form = $(this).attr("data-link");
    $('.popup-message.add-proposal').find('form').attr('action', link_form);
    $('.popup-message.add-proposal').show(500);
});

$("body").on("click",".del-proposal",function(){
    var link_form = $(this).attr("data-del-href");
    $('.popup-message.warning .popup-text').text('Вы уверены, что хотите удалить заявку?');
    $('.popup-message.warning #del-selected').attr('href', link_form);
    $('.popup-message.warning').show(500);
});

$("body").on("click",".del-event",function(){
    var link_form = $(this).attr("data-del-href");
    $('.popup-message.warning .popup-text').text('Вы уверены, что хотите удалить мероприятие?');
    $('.popup-message.warning #del-selected').attr('href', link_form);
    $('.popup-message.warning').show(500);
});

$( ".rating-stars .rate1" ).click(function() {
    var textContent = $('.rating-stars .rate1').html();
    $('.rating_autor_review .rate1').html(textContent);
});

$('#double-text-review').on('keyup', function() {
    var text_review = $(this).val();
    $('#double-review').text(text_review);
});

$(document).ready(function() {
    $(".type-user span").click(function () {
        $(".type-user span").removeClass("active");
        $(this).addClass("active");
    });
});

$('#organizator').click(function(){
    $('#status').val('organizator');
});

$('#artist').click(function(){
    $('#status').val('artist');
});

$('#btn_my_response').click(function(){
    $('#my-party').removeClass('active');
    $('#my-party-2').removeClass('active');
    $('#btn_my_response').removeClass('no-active');
    $('#btn_my_party').addClass('no-active');
    $('#my-response').addClass('active');
    $('#my-response-2').addClass('active');
});

$('#btn_my_party').click(function(){
    $('#my-response').removeClass('active');
    $('#my-response-2').removeClass('active');
    $('#btn_my_party').removeClass('no-active');
    $('#btn_my_response').addClass('no-active');
    $('#my-party').addClass('active');
    $('#my-party-2').addClass('active');
});

$('#btn_email_show').click(function(){
    $(this).addClass('hidden');
    $('#none_email').addClass('none');
    $('#show_email').removeClass('none');
});

$('#btn_phone_show').click(function(){
    $(this).addClass('hidden');
    $('#none_phone').addClass('none');
    $('#show_phone').removeClass('none');
});

$('.current-genre span').click(function(){
    $('.current-genre span').removeClass('active');
    $(this).addClass('active');
    var genre = $(this).attr("data-genre");
    $('#current_genre').val(genre);
});

$("body").on("click",".delete_track",function(e){
    $(this).parents('.track-item').remove();
    var track_id = $(this).attr("data-track-id");
    track_id = parseInt(track_id);
    $("#tracks_"+track_id+"").remove();
    $("#play_player").after('<input type="hidden" name="delete_track[]" id="delete_track" value="'+track_id+'">');
});

$("body").on("click",".play_track",function(e){
    var play_url = $(this).attr("data-track-play");
    if ($(this).hasClass('play')) {
        document.getElementById("play_player").pause();
        $('.play_track').removeClass('play');
        $('.track-item').removeClass('play');
    }
    else {
        $('.play_track').removeClass('play');
        $(this).addClass('play');
        $('.track-item').removeClass('play');
        $(this).parent('.track-item').addClass('play');
        $("#play_player_src").attr("src", play_url);
        document.getElementById("play_player").load();
        document.getElementById("play_player").play();
    }
});

$('.add_track').click(function(){
    var track_num = $(this).attr("data-tracks");
    track_num = parseInt(track_num);
    var input_file = $("#tracks_"+track_num+"").val();

    if (input_file != "" && input_file != null) {
        track_num++;
        $(this).attr('data-tracks', track_num);

        $('.add_track_list.lk-event__item-btns').before('<input type="file" id="tracks_'+track_num+'" name="tracks[]" accept=".mp3,audio/*" class="none">');
        $("#tracks_"+track_num+"").trigger("click");
    }
    else {
        if (input_file == null) {
            $('.add_track_list.lk-event__item-btns').before('<input type="file" id="tracks_'+track_num+'" name="tracks[]" accept=".mp3,audio/*" class="none">');
            $("#tracks_"+track_num+"").trigger("click");
        }
        else {
            $("#tracks_"+track_num+"").trigger("click");
        }
    }
    check_tracks(input_file, track_num);
});

function check_tracks(input_file, track_num) {
    $('#tracks_'+track_num+'').change(function(e){
        var file = e.currentTarget.files[0];
        var fileName = file.name;
        fileName = fileName.replace(/\.[^/.]+$/, "");
        var fileUrl = URL.createObjectURL(file);

        $("#player_src").attr("src", fileUrl);
        document.getElementById("player").load();

        var audioElement = document.getElementById("player");
        audioElement.onloadedmetadata = function() {
            var currentTime = audioElement.duration;
            var seconds = currentTime % 60;
            var foo = currentTime - seconds;
            var minutes = foo / 60;

            seconds = parseFloat(seconds).toFixed(0);

            if(seconds < 10){
                seconds = "0" + seconds.toString();
            }

            var trackTime = minutes + ":" + seconds;
            $('.my-track_list #player').after('<div class="track-item"><div class="play_track" data-track-play="'+fileUrl+'"></div> <div class="track_name">'+fileName+'</div> <div class="time_track">'+trackTime+'</div> <div class="delete_track" data-track-id="'+track_num+'"></div><div class="hp_slide"><div class="hp_range"></div></div></div>');
            $("#tracks_"+track_num+"").after('<input type="hidden" name="track_time[]" value="'+trackTime+'">');
        };
    });
}

$('.del-img').click(function(){
    $('.cover-image img').attr('src', '');
    $('#obloshka').val("");
});

$('.del-cover').click(function(){
    $('.inputs__file.cover').removeClass('set-image');
    $('.inputs__file.cover img').attr('src', '');
    $('#cover').val("");
});

$('#cover').change(function(){
    if ($('#cover').val() != "") {
        $('.inputs__file.cover').addClass('set-image');
    }
});

$('.del-doc').click(function(){
    $('.del-doc').removeClass('active');
    $('.dogovors').removeClass('set-doc').text("Добавить договор");
    $('#dogovor').val("");
});

$('#dogovor').change(function(e){
    if ($('#dogovor').val() != "") {
        var file = e.currentTarget.files[0];
        var fileName = file.name;
        $('.dogovors').addClass('set-doc').text(fileName);
        $('.del-doc').addClass('active');
    }
});

$("body").on("click",".add_date_event.dates",function(e){
    var event_num = $(this).attr("data-events");
    event_element = parseInt(event_num);
    event_element++;
    $(this).attr("data-events", event_element);
    $(".add_date_event.dates").before('<div class="inputs__inputs" id="date-event_'+event_element+'"> <div class="inputs__wrap"> <p class="inputs__title">Дата</p> <input type="date" value="00.00.0000" name="date['+event_element+'][]" class="form-control date-input artiste datepicker-here" data-date="'+event_element+'"> </div> <div class="inputs__wrap"> <p class="inputs__title">C</p> <input type="time" name="date['+event_element+'][]" value="00:00" class="form-control date-input times"> </div> <div class="inputs__wrap"> <p class="inputs__title">До</p> <input type="time" name="date['+event_element+'][]" value="00:00" class="form-control date-input times"> </div> <span class="del_dates" data-number="'+event_element+'"></span> </div>');

    $( ".artist-create-item" ).each(function(index) {
        $(this).find('.data_artist .select__variants').append('<label for="artist_date['+index+']_'+event_element+'" class="select__variant" data-element="'+event_element+'"><span>дд.мм.гггг</span></label>');
        $(this).find('.data_artist .radio-elements').append('<input type="radio" name="artist_date['+index+'][]" id="artist_date['+index+']_'+event_element+'" value="'+event_element+'">');
    });

    /*$(".select.data_artist .select__variants").append('<label for="artist_date[0]_'+event_element+'" class="select__variant" data-element="'+event_element+'"><span>дд.мм.гггг</span></label>');
    $(".select.data_artist .radio-elements").append('<input type="radio" name="artist_date[0][]" id="artist_date[0]_'+event_element+'" value="'+event_element+'">');*/
    $('.artiste.datepicker-here').datepicker({minDate: new Date()})
});

$("body").on("click",".del_dates",function(e){
    var data_number = $(this).attr('data-number');
    $(this).parent().remove();

    $( ".data_artist .radio-elements input" ).each(function(index) {
        var element = index + 1;
        if ($(this).val() == data_number) {
            $(this).remove();
            $('.data_artist .select__variants label:nth-child('+element+')').remove();
        }
    });
});

$("body").on("blur",".date-input.artiste",function(e){
    var date = $(this).val();
    var element = $(this).attr('data-date');
    element = parseInt(element);
    if (element == 0) {
        $('.select.data_artist .select__value').text(date);
        $( ".data_artist .select__variants label:nth-child(1)" ).find('span').text(date);
    }
    /*element++;*/

    $( ".data_artist .select__variants label" ).each(function(index) {
        if ($(this).attr('data-element') == element) {
            $(this).find('span').text(date);
        }
    });


    /*$(".select.data_artist .select__variants label:nth-child("+element+")").find('span').text(date);*/
});

$('.add_date_event.artistes').click(function(){
    var artist_num = $(this).attr("data-artists");
    artist_num = parseInt(artist_num);
    artist_element = artist_num;
    artist_element++;

    var artist_item = $(".artist-create-item").eq(artist_num).clone().prop('id', 'artist_'+artist_element);
    artist_item.find('input').each(function() {
        this.id = this.id.replace(/\[\d\]/g, '['+artist_element+']');
        this.name = this.name.replace(/\[\d\]/g, '['+artist_element+']');
    });
    artist_item.find('label').each(function() {
        var for_tag = $(this).attr('for');
        for_tag = for_tag.replace(/\[\d\]/g, '['+artist_element+']');
        $(this).attr('for', for_tag);
    });

    $('.artist-create-item').eq(artist_num).after(function() {
        return artist_item;
    });
    $(this).attr("data-artists", artist_element);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.img-view').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function addPhoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var photo_num = $('.add_foto').attr('data-photos');

        reader.onload = function(e) {
            $('.add_foto').before('<div data-photo="'+photo_num+'" class="review-foto" style="background: url('+e.target.result+');"><span>x</span></div>');
            $('.images_autor_review').append('<div class="review-foto" id="review_preview_'+photo_num+'" style="background: url('+e.target.result+')"></div>');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('body').on("click",".add_foto",function(e){
    var photo_num = $('.add_foto').attr('data-photos');
    var current_input = $('#review-foto_'+photo_num+'').val();

    if (current_input != "" && current_input != null) {
        photo_num++;
        $('.add_foto').attr('data-photos', photo_num);
        $('.add_foto').before('<input type="file" name="photo['+photo_num+']" id="review-foto_'+photo_num+'" class="img-load review-add-photo none">');
        $('#review-foto_'+photo_num+'').trigger("click");
    }
    else {
        if (current_input == null) {
            $('.add_foto').before('<input type="file" name="photo['+photo_num+']" id="review-foto_'+photo_num+'" class="img-load review-add-photo none">');
            $('#review-foto_'+photo_num+'').trigger("click");
        }
        else {
            $('#review-foto_'+photo_num+'').trigger("click");
        }
    }

});

var player = document.getElementById('play_player');
var duration = 0;

if (player) {
    player.addEventListener("timeupdate", function() {
        var currentTime = player.currentTime;
        duration = player.duration;
        $('.hp_range').stop(true, true).animate({
            'width': (currentTime + .25) / duration * 100 + '%'
        }, 250, 'linear');
    });

    $('.hp_slide').click(function(e) {
        var pc = e.offsetX / $(this).width();
        player.currentTime = duration * pc;
    })
}

$(".img-load").change(function() {
    readURL(this);
});

$("body").on("click",".review-foto span",function(e){
    var find_input = $(this).parent('.review-foto').attr('data-photo');
    $('#review-foto_'+find_input+'').remove();
    $('#review_preview_'+find_input+'').remove();
    $(this).parent('.review-foto').remove();
});

$("body").on("change",".review-add-photo",function(e){
    addPhoto(this);
});

$('.times').chungTimePicker();

function date_time(){
    $('.times').chungTimePicker();
}
setInterval(date_time, 500);

window.addEventListener("DOMContentLoaded", function() {
    [].forEach.call( document.querySelectorAll('.tel'), function(input) {
        var keyCode;
        function mask(event) {
            event.keyCode && (keyCode = event.keyCode);
            var pos = this.selectionStart;
            if (pos < 3) event.preventDefault();
            var matrix = "+7 (___) __-__-___",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, ""),
                new_value = matrix.replace(/[_\d]/g, function(a) {
                    return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                });
            i = new_value.indexOf("_");
            if (i != -1) {
                i < 5 && (i = 3);
                new_value = new_value.slice(0, i)
            }
            var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                function(a) {
                    return "\\d{1," + a.length + "}"
                }).replace(/[+()]/g, "\\$&");
            reg = new RegExp("^" + reg + "$");
            if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
            if (event.type == "blur" && this.value.length < 5)  this.value = ""
        }

        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
        input.addEventListener("keydown", mask, false)

    });

});
