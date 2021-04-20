/* eslint-disable */

import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import TweenMax from 'gsap/src/uncompressed/TweenMax'; // eslint-disable-line
import ScrollMagic from 'scrollmagic'; // eslint-disable-lines

export default {
  init() {
    var $my_width = $( window ).width();
// copy to clipboard https://cdn.jsdelivr.net/clipboard.js/1.5.10/clipboard.min.js
/*!
 * clipboard.js v1.5.10
 * https://zenorocha.github.io/clipboard.js
 *
 * Licensed MIT © Zeno Rocha
 */
! function(t) {
  if ("object" == typeof exports && "undefined" != typeof module) module.exports = t();
  else if ("function" == typeof define && define.amd) define([], t);
  else {
      var e;
      e = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this, e.Clipboard = t()
  }
}(function() {
  //var t, e, n; // eslint-disable-lines
  return function t(e, n, o) {
      function i(c, a) {
          if (!n[c]) {
              if (!e[c]) {
                  var s = "function" == typeof require && require;
                  if (!a && s) return s(c, !0);
                  if (r) return r(c, !0);
                  var l = new Error("Cannot find module '" + c + "'");
                  throw l.code = "MODULE_NOT_FOUND", l
              }
              var u = n[c] = {
                  exports: {},
              };
              e[c][0].call(u.exports, function(t) {
                  var n = e[c][1][t];
                  return i(n ? n : t)
              }, u, u.exports, t, e, n, o)
          }
          return n[c].exports
      }
      for (var r = "function" == typeof require && require, c = 0; c < o.length; c++) i(o[c]);
      return i
  }({
      1: [function(t, e, n) {
          var o = t("matches-selector");
          e.exports = function(t, e, n) {
              for (var i = n ? t : t.parentNode; i && i !== document;) {
                  if (o(i, e)) return i;
                  i = i.parentNode
              }
          }
      }, {
          "matches-selector": 5
      }],
      2: [function(t, e, n) {
          function o(t, e, n, o, r) {
              var c = i.apply(this, arguments);
              return t.addEventListener(n, c, r), {
                  destroy: function() {
                      t.removeEventListener(n, c, r)
                  }
              }
          }

          function i(t, e, n, o) {
              return function(n) {
                  n.delegateTarget = r(n.target, e, !0), n.delegateTarget && o.call(t, n)
              }
          }
          var r = t("closest");
          e.exports = o
      }, {
          closest: 1
      }],
      3: [function(t, e, n) {
          n.node = function(t) {
              return void 0 !== t && t instanceof HTMLElement && 1 === t.nodeType
          }, n.nodeList = function(t) {
              var e = Object.prototype.toString.call(t);
              return void 0 !== t && ("[object NodeList]" === e || "[object HTMLCollection]" === e) && "length" in t && (0 === t.length || n.node(t[0]))
          }, n.string = function(t) {
              return "string" == typeof t || t instanceof String
          }, n.fn = function(t) {
              var e = Object.prototype.toString.call(t);
              return "[object Function]" === e
          }
      }, {}],
      4: [function(t, e, n) {
          function o(t, e, n) {
              if (!t && !e && !n) throw new Error("Missing required arguments");
              if (!a.string(e)) throw new TypeError("Second argument must be a String");
              if (!a.fn(n)) throw new TypeError("Third argument must be a Function");
              if (a.node(t)) return i(t, e, n);
              if (a.nodeList(t)) return r(t, e, n);
              if (a.string(t)) return c(t, e, n);
              throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")
          }

          function i(t, e, n) {
              return t.addEventListener(e, n), {
                  destroy: function() {
                      t.removeEventListener(e, n)
                  }
              }
          }

          function r(t, e, n) {
              return Array.prototype.forEach.call(t, function(t) {
                  t.addEventListener(e, n)
              }), {
                  destroy: function() {
                      Array.prototype.forEach.call(t, function(t) {
                          t.removeEventListener(e, n)
                      })
                  }
              }
          }

          function c(t, e, n) {
              return s(document.body, t, e, n)
          }
          var a = t("./is"),
              s = t("delegate");
          e.exports = o
      }, {
          "./is": 3,
          delegate: 2
      }],
      5: [function(t, e, n) {
          function o(t, e) {
              if (r) return r.call(t, e);
              for (var n = t.parentNode.querySelectorAll(e), o = 0; o < n.length; ++o)
                  if (n[o] == t) return !0;
              return !1
          }
          var i = Element.prototype,
              r = i.matchesSelector || i.webkitMatchesSelector || i.mozMatchesSelector || i.msMatchesSelector || i.oMatchesSelector;
          e.exports = o
      }, {}],
      6: [function(t, e, n) {
          function o(t) {
              var e;
              if ("INPUT" === t.nodeName || "TEXTAREA" === t.nodeName) t.focus(), t.setSelectionRange(0, t.value.length), e = t.value;
              else {
                  t.hasAttribute("contenteditable") && t.focus();
                  var n = window.getSelection(),
                      o = document.createRange();
                  o.selectNodeContents(t), n.removeAllRanges(), n.addRange(o), e = n.toString()
              }
              return e
          }
          e.exports = o
      }, {}],
      7: [function(t, e, n) {
          function o() {}
          o.prototype = {
              on: function(t, e, n) {
                  var o = this.e || (this.e = {});
                  return (o[t] || (o[t] = [])).push({
                      fn: e,
                      ctx: n
                  }), this
              },
              once: function(t, e, n) {
                  function o() {
                      i.off(t, o), e.apply(n, arguments)
                  }
                  var i = this;
                  return o._ = e, this.on(t, o, n)
              },
              emit: function(t) {
                  var e = [].slice.call(arguments, 1),
                      n = ((this.e || (this.e = {}))[t] || []).slice(),
                      o = 0,
                      i = n.length;
                  for (o; i > o; o++) n[o].fn.apply(n[o].ctx, e);
                  return this
              },
              off: function(t, e) {
                  var n = this.e || (this.e = {}),
                      o = n[t],
                      i = [];
                  if (o && e)
                      for (var r = 0, c = o.length; c > r; r++) o[r].fn !== e && o[r].fn._ !== e && i.push(o[r]);
                  return i.length ? n[t] = i : delete n[t], this
              }
          }, e.exports = o
      }, {}],
      8: [function(e, n, o) {
          ! function(i, r) {
              if ("function" == typeof t && t.amd) t(["module", "select"], r);
              else if ("undefined" != typeof o) r(n, e("select"));
              else {
                  var c = {
                      exports: {}
                  };
                  r(c, i.select), i.clipboardAction = c.exports
              }
          }(this, function(t, e) {
              "use strict";

              function n(t) {
                  return t && t.__esModule ? t : {
                      "default": t
                  }
              }

              function o(t, e) {
                  if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
              }
              var i = n(e),
                  r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                      return typeof t
                  } : function(t) {
                      return t && "function" == typeof Symbol && t.constructor === Symbol ? "symbol" : typeof t
                  },
                  c = function() {
                      function t(t, e) {
                          for (var n = 0; n < e.length; n++) {
                              var o = e[n];
                              o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(t, o.key, o)
                          }
                      }
                      return function(e, n, o) {
                          return n && t(e.prototype, n), o && t(e, o), e
                      }
                  }(),
                  a = function() {
                      function t(e) {
                          o(this, t), this.resolveOptions(e), this.initSelection()
                      }
                      return t.prototype.resolveOptions = function t() {
                          var e = arguments.length <= 0 || void 0 === arguments[0] ? {} : arguments[0];
                          this.action = e.action, this.emitter = e.emitter, this.target = e.target, this.text = e.text, this.trigger = e.trigger, this.selectedText = ""
                      }, t.prototype.initSelection = function t() {
                          this.text ? this.selectFake() : this.target && this.selectTarget()
                      }, t.prototype.selectFake = function t() {
                          var e = this,
                              n = "rtl" == document.documentElement.getAttribute("dir");
                          this.removeFake(), this.fakeHandler = document.body.addEventListener("click", function() {
                              return e.removeFake()
                          }), this.fakeElem = document.createElement("textarea"), this.fakeElem.style.fontSize = "12pt", this.fakeElem.style.border = "0", this.fakeElem.style.padding = "0", this.fakeElem.style.margin = "0", this.fakeElem.style.position = "fixed", this.fakeElem.style[n ? "right" : "left"] = "-9999px", this.fakeElem.style.top = (window.pageYOffset || document.documentElement.scrollTop) + "px", this.fakeElem.setAttribute("readonly", ""), this.fakeElem.value = this.text, document.body.appendChild(this.fakeElem), this.selectedText = (0, i.default)(this.fakeElem), this.copyText()
                      }, t.prototype.removeFake = function t() {
                          this.fakeHandler && (document.body.removeEventListener("click"), this.fakeHandler = null), this.fakeElem && (document.body.removeChild(this.fakeElem), this.fakeElem = null)
                      }, t.prototype.selectTarget = function t() {
                          this.selectedText = (0, i.default)(this.target), this.copyText()
                      }, t.prototype.copyText = function t() {
                          var e = void 0;
                          try {
                              e = document.execCommand(this.action)
                          } catch (n) {
                              e = !1
                          }
                          this.handleResult(e)
                      }, t.prototype.handleResult = function t(e) {
                          e ? this.emitter.emit("success", {
                              action: this.action,
                              text: this.selectedText,
                              trigger: this.trigger,
                              clearSelection: this.clearSelection.bind(this)
                          }) : this.emitter.emit("error", {
                              action: this.action,
                              trigger: this.trigger,
                              clearSelection: this.clearSelection.bind(this)
                          })
                      }, t.prototype.clearSelection = function t() {
                          this.target && this.target.blur(), window.getSelection().removeAllRanges()
                      }, t.prototype.destroy = function t() {
                          this.removeFake()
                      }, c(t, [{
                          key: "action",
                          set: function t() {
                              var e = arguments.length <= 0 || void 0 === arguments[0] ? "copy" : arguments[0];
                              if (this._action = e, "copy" !== this._action && "cut" !== this._action) throw new Error('Invalid "action" value, use either "copy" or "cut"')
                          },
                          get: function t() {
                              return this._action
                          }
                      }, {
                          key: "target",
                          set: function t(e) {
                              if (void 0 !== e) {
                                  if (!e || "object" !== ("undefined" == typeof e ? "undefined" : r(e)) || 1 !== e.nodeType) throw new Error('Invalid "target" value, use a valid Element');
                                  if ("copy" === this.action && e.hasAttribute("disabled")) throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');
                                  if ("cut" === this.action && (e.hasAttribute("readonly") || e.hasAttribute("disabled"))) throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');
                                  this._target = e
                              }
                          },
                          get: function t() {
                              return this._target
                          }
                      }]), t
                  }();
              t.exports = a
          })
      }, {
          select: 6
      }],
      9: [function(e, n, o) {
          ! function(i, r) {
              if ("function" == typeof t && t.amd) t(["module", "./clipboard-action", "tiny-emitter", "good-listener"], r);
              else if ("undefined" != typeof o) r(n, e("./clipboard-action"), e("tiny-emitter"), e("good-listener"));
              else {
                  var c = {
                      exports: {}
                  };
                  r(c, i.clipboardAction, i.tinyEmitter, i.goodListener), i.clipboard = c.exports
              }
          }(this, function(t, e, n, o) {
              "use strict";

              function i(t) {
                  return t && t.__esModule ? t : {
                      "default": t
                  }
              }

              function r(t, e) {
                  if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
              }

              function c(t, e) {
                  if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                  return !e || "object" != typeof e && "function" != typeof e ? t : e
              }

              function a(t, e) {
                  if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                  t.prototype = Object.create(e && e.prototype, {
                      constructor: {
                          value: t,
                          enumerable: !1,
                          writable: !0,
                          configurable: !0
                      }
                  }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
              }

              function s(t, e) {
                  var n = "data-clipboard-" + t;
                  if (e.hasAttribute(n)) return e.getAttribute(n)
              }
              var l = i(e),
                  u = i(n),
                  f = i(o),
                  d = function(t) {
                      function e(n, o) {
                          r(this, e);
                          var i = c(this, t.call(this));
                          return i.resolveOptions(o), i.listenClick(n), i
                      }
                      return a(e, t), e.prototype.resolveOptions = function t() {
                          var e = arguments.length <= 0 || void 0 === arguments[0] ? {} : arguments[0];
                          this.action = "function" == typeof e.action ? e.action : this.defaultAction, this.target = "function" == typeof e.target ? e.target : this.defaultTarget, this.text = "function" == typeof e.text ? e.text : this.defaultText
                      }, e.prototype.listenClick = function t(e) {
                          var n = this;
                          this.listener = (0, f.default)(e, "click", function(t) {
                              return n.onClick(t)
                          })
                      }, e.prototype.onClick = function t(e) {
                          var n = e.delegateTarget || e.currentTarget;
                          this.clipboardAction && (this.clipboardAction = null), this.clipboardAction = new l.default({
                              action: this.action(n),
                              target: this.target(n),
                              text: this.text(n),
                              trigger: n,
                              emitter: this
                          })
                      }, e.prototype.defaultAction = function t(e) {
                          return s("action", e)
                      }, e.prototype.defaultTarget = function t(e) {
                          var n = s("target", e);
                          return n ? document.querySelector(n) : void 0
                      }, e.prototype.defaultText = function t(e) {
                          return s("text", e)
                      }, e.prototype.destroy = function t() {
                          this.listener.destroy(), this.clipboardAction && (this.clipboardAction.destroy(), this.clipboardAction = null)
                      }, e
                  }(u.default);
              t.exports = d
          })
      }, {
          "./clipboard-action": 8,
          "good-listener": 4,
          "tiny-emitter": 7
      }]
  }, {}, [9])(9)
});

    // social copy link code

    var clipboard = new Clipboard('.btn-copy', {// eslint-disable-lines
      text: function() {
          return document.querySelector('input[type=hidden]').value;
      },
  });
  clipboard.on('success', function(e) {
    alert("Copied!");
    e.clearSelection();
  });
  $("#input-url").val(location.href);
  //safari
  if (navigator.vendor.indexOf("Apple")==0 && /\sSafari\//.test(navigator.userAgent)) {
     $('.btn-copy').on('click', function() {
  var msg = window.prompt("Copy this link", location.href);// eslint-disable-lines

  });
    }


    // start of scroll magic parallax stuff

    // Import ScrollMagic library

  var controller = new ScrollMagic.Controller(); // eslint-disable-line

  $(".ani").each(function() {
    if($my_width > 768) {
      console.log ('jello'+$my_width);

		var parallax = TweenMax.to($(this).find(".article-detail"), 1, { // eslint-disable-line
			y: '-80',
		});

	var projectTitle = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement: ".article-detail",
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
      .addTo(controller);
    }

  });

  $(".ani-2").each(function() {
    if($my_width > 768) {
    console.log ('found ani-2');
		var parallax2 = TweenMax.to($(this).find(".article-detail-inner-2"), 1, { // eslint-disable-line
			y: '-75',
		});

	var projectTitle2 = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement:  this,
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax2)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
      .addTo(controller);
    }

  });

  $(".ani-3").each(function() {
    if($my_width > 768) {
    console.log ('found ani-3');
		var parallax3 = TweenMax.to($(this).find(".article-detail-inner-3"), 1, { // eslint-disable-line
			y: '-75',
		});

	var projectTitle3 = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement: this,
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax3)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
      .addTo(controller);
    }

	});
  // scroll
  /*!
 * Infinite Ajax Scroll v2.3.1
 * A jQuery plugin for infinite scrolling
 * https://infiniteajaxscroll.com
 *
 * Commercial use requires one-time purchase of a commercial license
 * https://infiniteajaxscroll.com/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright (c) 2018 Webcreate (Jeroen Fiege)
 */
/*!
 * Infinite Ajax Scroll v2.3.1
 * A jQuery plugin for infinite scrolling
 * https://infiniteajaxscroll.com
 *
 * Commercial use requires one-time purchase of a commercial license
 * https://infiniteajaxscroll.com/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright (c) 2018 Webcreate (Jeroen Fiege)
 */
var IASCallbacks = function(a) {
  return this.list = [], this.fireStack = [], this.isFiring = !1, this.isDisabled = !1, this.Deferred = a.Deferred, this.fire = function(a) {
      var b = a[0],
          c = a[1],
          d = a[2];
      this.isFiring = !0;
      for (var e = 0, f = this.list.length; f > e; e++)
          if (void 0 != this.list[e] && !1 === this.list[e].fn.apply(b, d)) {
              c.reject();
              break
          }
      this.isFiring = !1, c.resolve(), this.fireStack.length && this.fire(this.fireStack.shift())
  }, this.inList = function(a, b) {
      b = b || 0;
      for (var c = b, d = this.list.length; d > c; c++)
          if (this.list[c].fn === a || a.guid && this.list[c].fn.guid && a.guid === this.list[c].fn.guid) return c;
      return -1
  }, this
};
IASCallbacks.prototype = {
      add: function(a, b) {
          var c = {
              fn: a,
              priority: b,
          };
          b = b || 0;
          for (var d = 0, e = this.list.length; e > d; d++)
              if (b > this.list[d].priority) return this.list.splice(d, 0, c), this;
          return this.list.push(c), this
      },
      remove: function(a) {
          for (var b = 0;
              (b = this.inList(a, b)) > -1;) this.list.splice(b, 1);
          return this
      },
      has: function(a) {
          return this.inList(a) > -1
      },
      fireWith: function(a, b) {
          var c = this.Deferred();
          return this.isDisabled ? c.reject() : (b = b || [], b = [a, c, b.slice ? b.slice() : b], this.isFiring ? this.fireStack.push(b) : this.fire(b), c)
      },
      disable: function() {
          this.isDisabled = !0
      },
      enable: function() {
          this.isDisabled = !1
      },
  },
  function(a) {
      "use strict";
      var b = -1,
          c = function(c, d) {
              return this.itemsContainerSelector = d.container, this.itemSelector = d.item, this.nextSelector = d.next, this.paginationSelector = d.pagination, this.$scrollContainer = c, this.$container = window === c.get(0) ? a(document) : c, this.defaultDelay = d.delay, this.negativeMargin = d.negativeMargin, this.nextUrl = null, this.isBound = !1, this.isPaused = !1, this.isInitialized = !1, this.jsXhr = !1, this.listeners = {
                  next: new IASCallbacks(a),
                  load: new IASCallbacks(a),
                  loaded: new IASCallbacks(a),
                  render: new IASCallbacks(a),
                  rendered: new IASCallbacks(a),
                  scroll: new IASCallbacks(a),
                  noneLeft: new IASCallbacks(a),
                  ready: new IASCallbacks(a),
              }, this.extensions = [], this.scrollHandler = function() {
                  if (this.isBound && !this.isPaused) {
                      var a = this.getCurrentScrollOffset(this.$scrollContainer),
                          c = this.getScrollThreshold();
                      b != c && (this.fire("scroll", [a, c]), a >= c && this.next())
                  }
              }, this.getItemsContainer = function() {
                  return a(this.itemsContainerSelector, this.$container)
              }, this.getLastItem = function() {
                  return a(this.itemSelector, this.getItemsContainer().get(0)).last()
              }, this.getFirstItem = function() {
                  return a(this.itemSelector, this.getItemsContainer().get(0)).first()
              }, this.getScrollThreshold = function(a) {
                  var c;
                  return a = a || this.negativeMargin, a = a >= 0 ? -1 * a : a, c = this.getLastItem(), 0 === c.length ? b : c.offset().top + c.height() + a
              }, this.getCurrentScrollOffset = function(a) {
                  var b = 0,
                      c = a.height();
                  return b = window === a.get(0) ? a.scrollTop() : a.offset().top, (-1 != navigator.platform.indexOf("iPhone") || -1 != navigator.platform.indexOf("iPod")) && (c += 80), b + c
              }, this.getNextUrl = function(b) {
                  return b = b || this.$container, a(this.nextSelector, b).last().attr("href")
              }, this.load = function(b, c, d) {
                  function e(b) {
                      f = a(this.itemsContainerSelector, b).eq(0), 0 === f.length && (f = a(b).filter(this.itemsContainerSelector).eq(0)), f && f.find(this.itemSelector).each(function() {
                          i.push(this)
                      }), h.fire("loaded", [b, i]), c && (g = +new Date - j, d > g ? setTimeout(function() {
                          c.call(h, b, i)
                      }, d - g) : c.call(h, b, i))
                  }
                  var f, g, h = this,
                      i = [],
                      j = +new Date;
                  d = d || this.defaultDelay;
                  var k = {
                      url: b,
                      ajaxOptions: {
                          dataType: "html",
                      },
                  };
                  return h.fire("load", [k]), this.jsXhr = a.ajax(k.url, k.ajaxOptions).done(a.proxy(e, h)), this.jsXhr
              }, this.render = function(b, c) {
                  var d = this,
                      e = this.getLastItem(),
                      f = 0,
                      g = this.fire("render", [b]);
                  g.done(function() {
                      a(b).hide(), e.after(b), a(b).fadeIn(400, function() {
                          ++f < b.length || (d.fire("rendered", [b]), c && c())
                      })
                  }), g.fail(function() {
                      c && c()
                  })
              }, this.hidePagination = function() {
                  this.paginationSelector && a(this.paginationSelector, this.$container).hide()
              }, this.restorePagination = function() {
                  this.paginationSelector && a(this.paginationSelector, this.$container).show()
              }, this.throttle = function(b, c) {
                  var d, e, f = 0;
                  return d = function() {
                      function a() {
                          f = +new Date, b.apply(d, g)
                      }
                      var d = this,
                          g = arguments,
                          h = +new Date - f;
                      e ? clearTimeout(e) : a(), h > c ? a() : e = setTimeout(a, c)
                  }, a.guid && (d.guid = b.guid = b.guid || a.guid++), d
              }, this.fire = function(a, b) {
                  return this.listeners[a].fireWith(this, b)
              }, this.pause = function() {
                  this.isPaused = !0
              }, this.resume = function() {
                  this.isPaused = !1
              }, this
          };
      c.prototype.initialize = function() {
          if (this.isInitialized) return !1;
          var a = !!("onscroll" in this.$scrollContainer.get(0)),
              b = this.getCurrentScrollOffset(this.$scrollContainer),
              c = this.getScrollThreshold();
          return a ? (this.hidePagination(), this.bind(), this.nextUrl = this.getNextUrl(), this.nextUrl || this.fire("noneLeft", [this.getLastItem()]), this.nextUrl && b >= c ? (this.next(), this.one("rendered", function() {
              this.isInitialized = !0, this.fire("ready")
          })) : (this.isInitialized = !0, this.fire("ready")), this) : !1
      }, c.prototype.reinitialize = function() {
          this.isInitialized = !1, this.unbind(), this.initialize()
      }, c.prototype.bind = function() {
          if (!this.isBound) {
              this.$scrollContainer.on("scroll", a.proxy(this.throttle(this.scrollHandler, 150), this));
              for (var b = 0, c = this.extensions.length; c > b; b++) this.extensions[b].bind(this);
              this.isBound = !0, this.resume()
          }
      }, c.prototype.unbind = function() {
          if (this.isBound) {
              this.$scrollContainer.off("scroll", this.scrollHandler);
              for (var a = 0, b = this.extensions.length; b > a; a++) "undefined" != typeof this.extensions[a].unbind && this.extensions[a].unbind(this);
              this.isBound = !1
          }
      }, c.prototype.destroy = function() {
          try {
              this.jsXhr.abort()
          } catch (a) {}// eslint-disable-line
          this.unbind(), this.$scrollContainer.data("ias", null)
      }, c.prototype.on = function(b, c, d) {
          if ("undefined" == typeof this.listeners[b]) throw new Error('There is no event called "' + b + '"');
          return d = d || 0, this.listeners[b].add(a.proxy(c, this), d), this.isInitialized && ("ready" === b ? a.proxy(c, this)() : "noneLeft" !== b || this.nextUrl || a.proxy(c, this)()), this
      }, c.prototype.one = function(a, b) {
          var c = this,
              d = function() {
                  c.off(a, b), c.off(a, d)
              };
          return this.on(a, b), this.on(a, d), this
      }, c.prototype.off = function(a, b) {
          if ("undefined" == typeof this.listeners[a]) throw new Error('There is no event called "' + a + '"');
          return this.listeners[a].remove(b), this
      }, c.prototype.next = function() {
          var a = this.nextUrl,
              b = this;
          if (!a) return !1;
          this.pause();
          var c = this.fire("next", [a]);
          return c.done(function() {
              b.load(a, function(a, c) {
                  b.render(c, function() {
                      b.nextUrl = b.getNextUrl(a), b.nextUrl || b.fire("noneLeft", [b.getLastItem()]), b.resume()
                  })
              })
          }), c.fail(function() {
              b.resume()
          }), !0
      }, c.prototype.extension = function(a) {
          if ("undefined" == typeof a.bind) throw new Error('Extension doesn\'t have required method "bind"');
          return "undefined" != typeof a.initialize && a.initialize(this), this.extensions.push(a), this.isBound && this.reinitialize(), this
      }, a.ias = function(b) {// eslint-disable-line
          var c = a(window);
          return c.ias.apply(c, arguments)
      }, a.fn.ias = function(b) {
          var d = Array.prototype.slice.call(arguments),
              e = this;
          return this.each(function() {
              var f = a(this),
                  g = f.data("ias"),
                  h = a.extend({}, a.fn.ias.defaults, f.data(), "object" == typeof b && b);
              if (g || (f.data("ias", g = new c(f, h)), h.initialize && a(document).ready(a.proxy(g.initialize, g))), "string" == typeof b) {
                  if ("function" != typeof g[b]) throw new Error('There is no method called "' + b + '"');
                  d.shift(), g[b].apply(g, d)
              }
              e = g
          }), e
      }, a.fn.ias.defaults = {
          item: ".item",
          container: ".listing",
          next: ".next",
          pagination: !1,
          delay: 600,
          negativeMargin: 10,
          initialize: !0,
      }
  }(jQuery);
var IASHistoryExtension = function(a) {
  return a = jQuery.extend({}, this.defaults, a), this.ias = null, this.prevSelector = a.prev, this.prevUrl = null, this.listeners = {
      prev: new IASCallbacks(jQuery),
  }, this.onPageChange = function(a, b, c) {
      if (window.history && window.history.replaceState) {
          var d = history.state;
          history.replaceState(d, document.title, c)
      }
  }, this.onScroll = function(a, b) {// eslint-disable-line
      var c = this.getScrollThresholdFirstItem();
      this.prevUrl && (a -= this.ias.$scrollContainer.height(), c >= a && this.prev())
  }, this.onReady = function() {
      var a = this.ias.getCurrentScrollOffset(this.ias.$scrollContainer),
          b = this.getScrollThresholdFirstItem();
      a -= this.ias.$scrollContainer.height(), b >= a && this.prev()
  }, this.getPrevUrl = function(a) {
      return a || (a = this.ias.$container), jQuery(this.prevSelector, a).last().attr("href")
  }, this.getScrollThresholdFirstItem = function() {
      var a;
      return a = this.ias.getFirstItem(), 0 === a.length ? -1 : a.offset().top
  }, this.renderBefore = function(a, b) {
      var c = this.ias,
          d = c.getFirstItem(),
          e = 0;
      c.fire("render", [a]), jQuery(a).hide(), d.before(a), jQuery(a).fadeIn(400, function() {
          ++e < a.length || (c.fire("rendered", [a]), b && b())
      })
  }, this
};
IASHistoryExtension.prototype.initialize = function(a) {
  var b = this;
  this.ias = a, jQuery.extend(a.listeners, this.listeners), a.prev = function() {
      return b.prev()
  }, this.prevUrl = this.getPrevUrl()
}, IASHistoryExtension.prototype.bind = function(a) {
  a.on("pageChange", jQuery.proxy(this.onPageChange, this)), a.on("scroll", jQuery.proxy(this.onScroll, this)), a.on("ready", jQuery.proxy(this.onReady, this))
}, IASHistoryExtension.prototype.unbind = function(a) {
  a.off("pageChange", this.onPageChange), a.off("scroll", this.onScroll), a.off("ready", this.onReady)
}, IASHistoryExtension.prototype.prev = function() {
  var a = this.prevUrl,
      b = this,
      c = this.ias;
  if (!a) return !1;
  c.pause();
  var d = c.fire("prev", [a]);
  return d.done(function() {
      c.load(a, function(a, d) {
          b.renderBefore(d, function() {
              b.prevUrl = b.getPrevUrl(a), c.resume(), b.prevUrl && b.prev()
          })
      })
  }), d.fail(function() {
      c.resume()
  }), !0
}, IASHistoryExtension.prototype.defaults = {
  prev: ".prev",
};
var IASNoneLeftExtension = function(a) {
  return a = jQuery.extend({}, this.defaults, a), this.ias = null, this.uid = (new Date).getTime(), this.html = a.html.replace("{text}", a.text), this.showNoneLeft = function() {
      var a = jQuery(this.html).attr("id", "ias_noneleft_" + this.uid),
          b = this.ias.getLastItem();
      b.after(a), a.fadeIn()
  }, this
};
IASNoneLeftExtension.prototype.bind = function(a) {
  this.ias = a, a.on("noneLeft", jQuery.proxy(this.showNoneLeft, this))
}, IASNoneLeftExtension.prototype.unbind = function(a) {
  a.off("noneLeft", this.showNoneLeft)
}, IASNoneLeftExtension.prototype.defaults = {
  text: "You reached the end.",
  html: '<div class="ias-noneleft" style="text-align: center;">{text}</div>',
};
var IASPagingExtension = function() {
  return this.ias = null, this.pagebreaks = [
      [0, document.location.toString()],
  ], this.lastPageNum = 1, this.enabled = !0, this.listeners = {
      pageChange: new IASCallbacks(jQuery),
  }, this.onScroll = function(a, b) {// eslint-disable-line
      if (this.enabled) {
          var c, d = this.ias,
              e = this.getCurrentPageNum(a),
              f = this.getCurrentPagebreak(a);
          this.lastPageNum !== e && (c = f[1], d.fire("pageChange", [e, a, c])), this.lastPageNum = e
      }
  }, this.onNext = function(a) {
      var b = this.ias.getCurrentScrollOffset(this.ias.$scrollContainer);
      this.pagebreaks.push([b, a]);
      var c = this.getCurrentPageNum(b) + 1;
      this.ias.fire("pageChange", [c, b, a]), this.lastPageNum = c
  }, this.onPrev = function(a) {
      var b = this,
          c = b.ias,
          d = c.getCurrentScrollOffset(c.$scrollContainer),
          e = d - c.$scrollContainer.height(),
          f = c.getFirstItem();
      this.enabled = !1, this.pagebreaks.unshift([0, a]), c.one("rendered", function() {
          for (var d = 1, g = b.pagebreaks.length; g > d; d++) b.pagebreaks[d][0] = b.pagebreaks[d][0] + f.offset().top;
          var h = b.getCurrentPageNum(e) + 1;
          c.fire("pageChange", [h, e, a]), b.lastPageNum = h, b.enabled = !0
      })
  }, this
};
IASPagingExtension.prototype.initialize = function(a) {
  this.ias = a, jQuery.extend(a.listeners, this.listeners)
}, IASPagingExtension.prototype.bind = function(a) {
  try {
      a.on("prev", jQuery.proxy(this.onPrev, this), this.priority)
  } catch (b) {}// eslint-disable-line
  a.on("next", jQuery.proxy(this.onNext, this), this.priority), a.on("scroll", jQuery.proxy(this.onScroll, this), this.priority)
}, IASPagingExtension.prototype.unbind = function(a) {
  try {
      a.off("prev", this.onPrev)
  } catch (b) {}// eslint-disable-line
  a.off("next", this.onNext), a.off("scroll", this.onScroll)
}, IASPagingExtension.prototype.getCurrentPageNum = function(a) {
  for (var b = this.pagebreaks.length - 1; b > 0; b--)
      if (a > this.pagebreaks[b][0]) return b + 1;
  return 1
}, IASPagingExtension.prototype.getCurrentPagebreak = function(a) {
  for (var b = this.pagebreaks.length - 1; b >= 0; b--)
      if (a > this.pagebreaks[b][0]) return this.pagebreaks[b];
  return null
}, IASPagingExtension.prototype.priority = 500;
var IASSpinnerExtension = function(a) {
  return a = jQuery.extend({}, this.defaults, a), this.ias = null, this.uid = (new Date).getTime(), this.src = a.src, this.html = a.html.replace("{src}", this.src), this.showSpinner = function() {
      var a = this.getSpinner() || this.createSpinner(),
          b = this.ias.getLastItem();
      b.after(a), a.fadeIn()
  }, this.showSpinnerBefore = function() {
      var a = this.getSpinner() || this.createSpinner(),
          b = this.ias.getFirstItem();
      b.before(a), a.fadeIn()
  }, this.removeSpinner = function() {
      this.hasSpinner() && this.getSpinner().remove()
  }, this.getSpinner = function() {
      var a = jQuery("#ias_spinner_" + this.uid);
      return a.length > 0 ? a : !1
  }, this.hasSpinner = function() {
      var a = jQuery("#ias_spinner_" + this.uid);
      return a.length > 0
  }, this.createSpinner = function() {
      var a = jQuery(this.html).attr("id", "ias_spinner_" + this.uid);
      return a.hide(), a
  }, this
};
IASSpinnerExtension.prototype.bind = function(a) {
  this.ias = a, a.on("next", jQuery.proxy(this.showSpinner, this)), a.on("render", jQuery.proxy(this.removeSpinner, this));
  try {
      a.on("prev", jQuery.proxy(this.showSpinnerBefore, this))
  } catch (b) {}// eslint-disable-line
}, IASSpinnerExtension.prototype.unbind = function(a) {
  a.off("next", this.showSpinner), a.off("render", this.removeSpinner);
  try {
      a.off("prev", this.showSpinnerBefore)
  } catch (b) {}// eslint-disable-line
}, IASSpinnerExtension.prototype.defaults = {
  src: "data:image/gif;base64,R0lGODlhEAAQAPQAAP///wAAAPDw8IqKiuDg4EZGRnp6egAAAFhYWCQkJKysrL6+vhQUFJycnAQEBDY2NmhoaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAAFdyAgAgIJIeWoAkRCCMdBkKtIHIngyMKsErPBYbADpkSCwhDmQCBethRB6Vj4kFCkQPG4IlWDgrNRIwnO4UKBXDufzQvDMaoSDBgFb886MiQadgNABAokfCwzBA8LCg0Egl8jAggGAA1kBIA1BAYzlyILczULC2UhACH5BAkKAAAALAAAAAAQABAAAAV2ICACAmlAZTmOREEIyUEQjLKKxPHADhEvqxlgcGgkGI1DYSVAIAWMx+lwSKkICJ0QsHi9RgKBwnVTiRQQgwF4I4UFDQQEwi6/3YSGWRRmjhEETAJfIgMFCnAKM0KDV4EEEAQLiF18TAYNXDaSe3x6mjidN1s3IQAh+QQJCgAAACwAAAAAEAAQAAAFeCAgAgLZDGU5jgRECEUiCI+yioSDwDJyLKsXoHFQxBSHAoAAFBhqtMJg8DgQBgfrEsJAEAg4YhZIEiwgKtHiMBgtpg3wbUZXGO7kOb1MUKRFMysCChAoggJCIg0GC2aNe4gqQldfL4l/Ag1AXySJgn5LcoE3QXI3IQAh+QQJCgAAACwAAAAAEAAQAAAFdiAgAgLZNGU5joQhCEjxIssqEo8bC9BRjy9Ag7GILQ4QEoE0gBAEBcOpcBA0DoxSK/e8LRIHn+i1cK0IyKdg0VAoljYIg+GgnRrwVS/8IAkICyosBIQpBAMoKy9dImxPhS+GKkFrkX+TigtLlIyKXUF+NjagNiEAIfkECQoAAAAsAAAAABAAEAAABWwgIAICaRhlOY4EIgjH8R7LKhKHGwsMvb4AAy3WODBIBBKCsYA9TjuhDNDKEVSERezQEL0WrhXucRUQGuik7bFlngzqVW9LMl9XWvLdjFaJtDFqZ1cEZUB0dUgvL3dgP4WJZn4jkomWNpSTIyEAIfkECQoAAAAsAAAAABAAEAAABX4gIAICuSxlOY6CIgiD8RrEKgqGOwxwUrMlAoSwIzAGpJpgoSDAGifDY5kopBYDlEpAQBwevxfBtRIUGi8xwWkDNBCIwmC9Vq0aiQQDQuK+VgQPDXV9hCJjBwcFYU5pLwwHXQcMKSmNLQcIAExlbH8JBwttaX0ABAcNbWVbKyEAIfkECQoAAAAsAAAAABAAEAAABXkgIAICSRBlOY7CIghN8zbEKsKoIjdFzZaEgUBHKChMJtRwcWpAWoWnifm6ESAMhO8lQK0EEAV3rFopIBCEcGwDKAqPh4HUrY4ICHH1dSoTFgcHUiZjBhAJB2AHDykpKAwHAwdzf19KkASIPl9cDgcnDkdtNwiMJCshACH5BAkKAAAALAAAAAAQABAAAAV3ICACAkkQZTmOAiosiyAoxCq+KPxCNVsSMRgBsiClWrLTSWFoIQZHl6pleBh6suxKMIhlvzbAwkBWfFWrBQTxNLq2RG2yhSUkDs2b63AYDAoJXAcFRwADeAkJDX0AQCsEfAQMDAIPBz0rCgcxky0JRWE1AmwpKyEAIfkECQoAAAAsAAAAABAAEAAABXkgIAICKZzkqJ4nQZxLqZKv4NqNLKK2/Q4Ek4lFXChsg5ypJjs1II3gEDUSRInEGYAw6B6zM4JhrDAtEosVkLUtHA7RHaHAGJQEjsODcEg0FBAFVgkQJQ1pAwcDDw8KcFtSInwJAowCCA6RIwqZAgkPNgVpWndjdyohACH5BAkKAAAALAAAAAAQABAAAAV5ICACAimc5KieLEuUKvm2xAKLqDCfC2GaO9eL0LABWTiBYmA06W6kHgvCqEJiAIJiu3gcvgUsscHUERm+kaCxyxa+zRPk0SgJEgfIvbAdIAQLCAYlCj4DBw0IBQsMCjIqBAcPAooCBg9pKgsJLwUFOhCZKyQDA3YqIQAh+QQJCgAAACwAAAAAEAAQAAAFdSAgAgIpnOSonmxbqiThCrJKEHFbo8JxDDOZYFFb+A41E4H4OhkOipXwBElYITDAckFEOBgMQ3arkMkUBdxIUGZpEb7kaQBRlASPg0FQQHAbEEMGDSVEAA1QBhAED1E0NgwFAooCDWljaQIQCE5qMHcNhCkjIQAh+QQJCgAAACwAAAAAEAAQAAAFeSAgAgIpnOSoLgxxvqgKLEcCC65KEAByKK8cSpA4DAiHQ/DkKhGKh4ZCtCyZGo6F6iYYPAqFgYy02xkSaLEMV34tELyRYNEsCQyHlvWkGCzsPgMCEAY7Cg04Uk48LAsDhRA8MVQPEF0GAgqYYwSRlycNcWskCkApIyEAOwAAAAAAAAAAAA==",
  html: '<div class="ias-spinner" style="text-align: center;"><img src="{src}"/></div>',
};
var IASTriggerExtension = function(a) {
  return a = jQuery.extend({}, this.defaults, a), this.ias = null, this.html = a.html.replace("{text}", a.text), this.htmlPrev = a.htmlPrev.replace("{text}", a.textPrev), this.enabled = !0, this.count = 0, this.offset = a.offset, this.$triggerNext = null, this.$triggerPrev = null, this.showTriggerNext = function() {
      if (!this.enabled) return !0;
      if (!1 === this.offset || ++this.count < this.offset) return !0;
      var a = this.$triggerNext || (this.$triggerNext = this.createTrigger(this.next, this.html)),
          b = this.ias.getLastItem();
      return b.after(a), a.fadeIn(), !1
  }, this.showTriggerPrev = function() {
      if (!this.enabled) return !0;
      var a = this.$triggerPrev || (this.$triggerPrev = this.createTrigger(this.prev, this.htmlPrev)),
          b = this.ias.getFirstItem();
      return b.before(a), a.fadeIn(), !1
  }, this.onRendered = function() {
      this.enabled = !0
  }, this.createTrigger = function(a, b) {
      var c, d = (new Date).getTime();
      return b = b || this.html, c = jQuery(b).attr("id", "ias_trigger_" + d), c.hide(), c.on("click", jQuery.proxy(a, this)), c
  }, this
};
IASTriggerExtension.prototype.bind = function(a) {
  this.ias = a, a.on("next", jQuery.proxy(this.showTriggerNext, this), this.priority), a.on("rendered", jQuery.proxy(this.onRendered, this), this.priority);
  try {
      a.on("prev", jQuery.proxy(this.showTriggerPrev, this), this.priority)
  } catch (b) {}// eslint-disable-line
}, IASTriggerExtension.prototype.unbind = function(a) {
  a.off("next", this.showTriggerNext), a.off("rendered", this.onRendered);
  try {
      a.off("prev", this.showTriggerPrev)
  } catch (b) {}// eslint-disable-line
}, IASTriggerExtension.prototype.next = function() {
  this.enabled = !1, this.ias.pause(), this.$triggerNext && (this.$triggerNext.remove(), this.$triggerNext = null), this.ias.next()
}, IASTriggerExtension.prototype.prev = function() {
  this.enabled = !1, this.ias.pause(), this.$triggerPrev && (this.$triggerPrev.remove(), this.$triggerPrev = null), this.ias.prev()
}, IASTriggerExtension.prototype.defaults = {
  text: "Load more items",
  html: '<div class="ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
  textPrev: "Load previous items",
  htmlPrev: '<div class="ias-trigger ias-trigger-prev" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
  offset: 0,
}, IASTriggerExtension.prototype.priority = 1e3;

// end scroll
    var ias = jQuery.ias({
      container:  '.all',
      item:       '.some',
      next:       '.styled-button',
      delay:      600,
      negativeMargin: 500,
    });


    ias.extension(new IASSpinnerExtension());
    ias.extension(new IASTriggerExtension({ offset: 100 }));
    ias.extension(new IASPagingExtension());
    ias.extension(new IASHistoryExtension({ prev: '.styled-button2' }));
    ias.on('rendered', function() {
      if($my_width > 1024) {
        moreContent();
        moreContent2();





      if ( document.location.href.indexOf('search') > -1 ) {
console.log('hi');
      }
      else {
        moreContent1();

      console.log('hi2');
      }
    }
    else {
    moreContent3();
    }

      console.log('i loaded more');
      var controller = new ScrollMagic.Controller(); // eslint-disable-line

  $(".ani").each(function() {
    if($my_width > 768) {
		var parallax = TweenMax.to($(this).find(".article-detail"), 1, { // eslint-disable-line
			y: '-80',
		});

	var projectTitle = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement: ".article-detail",
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
			.addTo(controller);
    }
  });

  $(".ani-2").each(function() {
    if($my_width > 768) {
    console.log ('found ani-2');
		var parallax2 = TweenMax.to($(this).find(".article-detail-inner-2"), 1, { // eslint-disable-line
			y: '-75',
		});

	var projectTitle2 = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement:  this,
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax2)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
			.addTo(controller);
    }
  });

  $(".ani-3").each(function() {
    if($my_width > 768) {
    console.log ('found ani-3');
		var parallax3 = TweenMax.to($(this).find(".article-detail-inner-3"), 1, { // eslint-disable-line
			y: '-75',
		});

	var projectTitle3 = new ScrollMagic.Scene({ // eslint-disable-line
        triggerElement: this,
				triggerHook: 1,
				duration: '100%',
			})
			.setTween(parallax3)
			.addTo(controller);

		var parallaxImage = TweenMax.to($(this).find(".parallax-image-container"), 1, { // eslint-disable-line
			y: '10%', scaleX:1, scaleY:1,
		});

		var projectImage = new ScrollMagic.Scene({ // eslint-disable-line
				triggerElement: this,
				triggerHook: 1,
				duration: '200%',
			})
			.setTween(parallaxImage)
      .addTo(controller);
    }

	});

    });
    // JavaScript to be fired on all pages

  if($my_width <= 768) {
    $( "footer" ).addClass( "mobile" );
  }
  else {
    $( "footer" ).removeClass( "mobile" );
  }
  $(".burger").click(function () {
    $( "footer" ).addClass( "visible" );
  });
  $(".close-me").click(function () {
    $( "footer" ).removeClass( "visible" );
  });
  $(window).resize(function(){
    $my_width = $( window ).width();
    if($my_width <= 768) {
      $( "footer" ).addClass( "mobile" );
    }
    else {
      $( "footer" ).removeClass( "mobile" );
    }
});
$(function() {
  $( "body" ).addClass( "ajax" );
});

// caption share reveals

$(".share-me").click(function () {
  $(this).find(".social-hide").toggleClass( "visible" );
});



// ajax load more editorials - update ads


$(function($) {
  $.fn.almComplete = function(alm){
    console.log("Ajax Load More Complete!");
    if($my_width > 1024) {
    moreContent();
    }
    else {
    moreContent3();
    }
  };
});

    // code to change gradient background
    var $offset = 0;
    var $my_height = $( window ).height();
    $(window).scroll(function() {
      var $height = $(window).scrollTop();
 //     console.log($height);
  //    console.log($offset);
 //   console.log($height - $offset);
 //   console.log('math sign is');
 //   console.log(Math.sign($height - $offset));
    try
{
    if (Math.sign($height - $offset) == -1)
    {
 //     console.log('Number is negative');
      $offset = ($height - (($my_height  * 20))+100);
  //    console.log ('reset to' + $offset);
    }
} catch ( error)
{
 // console.log('Not a number');
}


      if(($height - $offset) < $my_height) {
        $('#fixed-slice').removeClass('change-1');
        $('#fixed-slice-2').removeClass('change-1');
        $('#fixed-slice-3').removeClass('change-1');
      }
      if((($height - $offset) >= $my_height) && (($height - $offset) < ($my_height * 2))) {
        $('#fixed-slice').addClass('change-1');
        $('#fixed-slice-2').addClass('change-1');
        $('#fixed-slice-3').addClass('change-1');
        $('#fixed-slice').removeClass('change-2');
        $('#fixed-slice-2').removeClass('change-2');
        $('#fixed-slice-3').removeClass('change-2');
      }
      if((($height - $offset) >= ($my_height * 2)) && (($height - $offset) < ($my_height * 3))) {
        $('#fixed-slice').addClass('change-2');
        $('#fixed-slice-2').addClass('change-2');
        $('#fixed-slice-3').addClass('change-2');
        $('#fixed-slice').removeClass('change-1');
        $('#fixed-slice-2').removeClass('change-1');
        $('#fixed-slice-3').removeClass('change-1');
        $('#fixed-slice').removeClass('change-3');
        $('#fixed-slice-2').removeClass('change-3');
        $('#fixed-slice-3').removeClass('change-3');
      }
      if((($height - $offset) >= ($my_height * 3)) && (($height - $offset) < ($my_height * 4))) {
        $('#fixed-slice').addClass('change-3');
        $('#fixed-slice-2').addClass('change-3');
        $('#fixed-slice-3').addClass('change-3');
        $('#fixed-slice').removeClass('change-2');
        $('#fixed-slice-2').removeClass('change-2');
        $('#fixed-slice-3').removeClass('change-2');
        $('#fixed-slice').removeClass('change-4');
        $('#fixed-slice-2').removeClass('change-4');
        $('#fixed-slice-3').removeClass('change-4');
      }
      if((($height - $offset) >= ($my_height * 4)) && (($height - $offset) < ($my_height * 5))) {
        $('#fixed-slice').addClass('change-4');
        $('#fixed-slice-2').addClass('change-4');
        $('#fixed-slice-3').addClass('change-4');
        $('#fixed-slice').removeClass('change-3');
        $('#fixed-slice-2').removeClass('change-3');
        $('#fixed-slice-3').removeClass('change-3');
        $('#fixed-slice').removeClass('change-5');
        $('#fixed-slice-2').removeClass('change-5');
        $('#fixed-slice-3').removeClass('change-5');
      }
      if((($height - $offset) >= ($my_height * 5)) && (($height - $offset) < ($my_height * 6))) {
        $('#fixed-slice').addClass('change-5');
        $('#fixed-slice-2').addClass('change-5');
        $('#fixed-slice-3').addClass('change-5');
        $('#fixed-slice').removeClass('change-4');
        $('#fixed-slice-2').removeClass('change-4');
        $('#fixed-slice-3').removeClass('change-4');
        $('#fixed-slice').removeClass('change-6');
        $('#fixed-slice-2').removeClass('change-6');
        $('#fixed-slice-3').removeClass('change-6');
      }
      if((($height - $offset) >= ($my_height * 6)) && (($height - $offset) < ($my_height * 7))) {
        $('#fixed-slice').addClass('change-6');
        $('#fixed-slice-2').addClass('change-6');
        $('#fixed-slice-3').addClass('change-6');
        $('#fixed-slice').removeClass('change-5');
        $('#fixed-slice-2').removeClass('change-5');
        $('#fixed-slice-3').removeClass('change-5');
        $('#fixed-slice').removeClass('change-7');
        $('#fixed-slice-2').removeClass('change-7');
        $('#fixed-slice-3').removeClass('change-7');
      }
      if((($height - $offset) >= ($my_height * 7)) && (($height - $offset) < ($my_height * 8))) {
        $('#fixed-slice').addClass('change-7');
        $('#fixed-slice-2').addClass('change-7');
        $('#fixed-slice-3').addClass('change-7');
        $('#fixed-slice').removeClass('change-6');
        $('#fixed-slice-2').removeClass('change-6');
        $('#fixed-slice-3').removeClass('change-6');
        $('#fixed-slice').removeClass('change-8');
        $('#fixed-slice-2').removeClass('change-8');
        $('#fixed-slice-3').removeClass('change-8');
      }
      if((($height - $offset) >= ($my_height * 8)) && (($height - $offset) < ($my_height * 9))) {
        $('#fixed-slice').addClass('change-8');
        $('#fixed-slice-2').addClass('change-8');
        $('#fixed-slice-3').addClass('change-8');
        $('#fixed-slice').removeClass('change-7');
        $('#fixed-slice-2').removeClass('change-7');
        $('#fixed-slice-3').removeClass('change-7');
        $('#fixed-slice').removeClass('change-9');
        $('#fixed-slice-2').removeClass('change-9');
        $('#fixed-slice-3').removeClass('change-9');
      }
      if((($height - $offset) >= ($my_height * 9)) && (($height - $offset) < ($my_height * 10))) {
        $('#fixed-slice').addClass('change-9');
        $('#fixed-slice-2').addClass('change-9');
        $('#fixed-slice-3').addClass('change-9');
        $('#fixed-slice').removeClass('change-8');
        $('#fixed-slice-2').removeClass('change-8');
        $('#fixed-slice-3').removeClass('change-8');
        $('#fixed-slice').removeClass('change-10');
        $('#fixed-slice-2').removeClass('change-10');
        $('#fixed-slice-3').removeClass('change-10');
      }
      if((($height - $offset) >= ($my_height * 10)) && (($height - $offset) < ($my_height * 11))) {
        $('#fixed-slice').addClass('change-10');
        $('#fixed-slice-2').addClass('change-10');
        $('#fixed-slice-3').addClass('change-10');
        $('#fixed-slice').removeClass('change-9');
        $('#fixed-slice-2').removeClass('change-9');
        $('#fixed-slice-3').removeClass('change-9');
      }
      if((($height - $offset) >= ($my_height * 11)) && (($height - $offset) < ($my_height * 12))) {
        $('#fixed-slice').addClass('change-9');
        $('#fixed-slice-2').addClass('change-9');
        $('#fixed-slice-3').addClass('change-9');
        $('#fixed-slice').removeClass('change-8');
        $('#fixed-slice-2').removeClass('change-8');
        $('#fixed-slice-3').removeClass('change-8');
        $('#fixed-slice').removeClass('change-10');
        $('#fixed-slice-2').removeClass('change-10');
        $('#fixed-slice-3').removeClass('change-10');
      }
      if((($height - $offset) >= ($my_height * 12)) && (($height - $offset) < ($my_height * 13))) {
        $('#fixed-slice').addClass('change-8');
        $('#fixed-slice-2').addClass('change-8');
        $('#fixed-slice-3').addClass('change-8');
        $('#fixed-slice').removeClass('change-7');
        $('#fixed-slice-2').removeClass('change-7');
        $('#fixed-slice-3').removeClass('change-7');
        $('#fixed-slice').removeClass('change-9');
        $('#fixed-slice-2').removeClass('change-9');
        $('#fixed-slice-3').removeClass('change-9');
      }
      if((($height - $offset) >= ($my_height * 13)) && (($height - $offset) < ($my_height * 14))) {
        $('#fixed-slice').addClass('change-7');
        $('#fixed-slice-2').addClass('change-7');
        $('#fixed-slice-3').addClass('change-7');
        $('#fixed-slice').removeClass('change-6');
        $('#fixed-slice-2').removeClass('change-6');
        $('#fixed-slice-3').removeClass('change-6');
        $('#fixed-slice').removeClass('change-8');
        $('#fixed-slice-2').removeClass('change-8');
        $('#fixed-slice-3').removeClass('change-8');
      }
      if((($height - $offset) >= ($my_height * 14)) && (($height - $offset) < ($my_height * 15))) {
        $('#fixed-slice').addClass('change-6');
        $('#fixed-slice-2').addClass('change-6');
        $('#fixed-slice-3').addClass('change-6');
        $('#fixed-slice').removeClass('change-5');
        $('#fixed-slice-2').removeClass('change-5');
        $('#fixed-slice-3').removeClass('change-5');
        $('#fixed-slice').removeClass('change-7');
        $('#fixed-slice-2').removeClass('change-7');
        $('#fixed-slice-3').removeClass('change-7');
      }
      if((($height - $offset) >= ($my_height * 15)) && (($height - $offset) < ($my_height * 16))) {
        $('#fixed-slice').addClass('change-5');
        $('#fixed-slice-2').addClass('change-5');
        $('#fixed-slice-3').addClass('change-5');
        $('#fixed-slice').removeClass('change-4');
        $('#fixed-slice-2').removeClass('change-4');
        $('#fixed-slice-3').removeClass('change-4');
        $('#fixed-slice').removeClass('change-6');
        $('#fixed-slice-2').removeClass('change-6');
        $('#fixed-slice-3').removeClass('change-6');
      }
      if((($height - $offset) >= ($my_height * 16)) && (($height - $offset) < ($my_height * 17))) {
        $('#fixed-slice').addClass('change-4');
        $('#fixed-slice-2').addClass('change-4');
        $('#fixed-slice-3').addClass('change-4');
        $('#fixed-slice').removeClass('change-3');
        $('#fixed-slice-2').removeClass('change-3');
        $('#fixed-slice-3').removeClass('change-3');
        $('#fixed-slice').removeClass('change-5');
        $('#fixed-slice-2').removeClass('change-5');
        $('#fixed-slice-3').removeClass('change-5');
      }
      if((($height - $offset) >= ($my_height * 17)) && (($height - $offset) < ($my_height * 18))) {
        $('#fixed-slice').addClass('change-3');
        $('#fixed-slice-2').addClass('change-3');
        $('#fixed-slice-3').addClass('change-3');
        $('#fixed-slice').removeClass('change-2');
        $('#fixed-slice-2').removeClass('change-2');
        $('#fixed-slice-3').removeClass('change-2');
        $('#fixed-slice').removeClass('change-4');
        $('#fixed-slice-2').removeClass('change-4');
        $('#fixed-slice-3').removeClass('change-4');
      }
      if((($height - $offset) >= ($my_height * 18)) && (($height - $offset) < ($my_height * 19))) {
        $('#fixed-slice').addClass('change-2');
        $('#fixed-slice-2').addClass('change-2');
        $('#fixed-slice-3').addClass('change-2');
        $('#fixed-slice').removeClass('change-1');
        $('#fixed-slice-2').removeClass('change-1');
        $('#fixed-slice-3').removeClass('change-1');
        $('#fixed-slice').removeClass('change-3');
        $('#fixed-slice-2').removeClass('change-3');
        $('#fixed-slice-3').removeClass('change-3');
      }
      if((($height - $offset) >= ($my_height * 19)) && (($height - $offset) < ($my_height * 20))) {
        $('#fixed-slice').addClass('change-1');
        $('#fixed-slice-2').addClass('change-1');
        $('#fixed-slice-3').addClass('change-1');
        $('#fixed-slice').removeClass('change-2');
        $('#fixed-slice-2').removeClass('change-2');
        $('#fixed-slice-3').removeClass('change-2');
      }
      if((($height - $offset) >= ($my_height * 20)) && (($height - $offset) < ($my_height * 21))) {
        $offset = $height;
        console.log ('new offset is'+$offset);
        $('#fixed-slice').removeClass('change-1');
        $('#fixed-slice-2').removeClass('change-1');
        $('#fixed-slice-3').removeClass('change-1');
      }
    });
    $('.hunger-gallery').slick(
      {
        dots: true,
        arrows: true,
      }
    );


// start old custom.js
    (function ($) {
      var isIPhone = false;
      var isIPad = false;
      var isTouch = false;
      var iOSVersion = 5; // eslint-disable-line
      var adminBarCorrector = 0;
      var hasTopHeader = false;
      /* BLOG
      var isBlog = false;
      */
      var isArticle = false;
   //   var isBot = false;

      var onresize = function () {
        var w = $(window).width();
        var h = $(window).height();

        if (isArticle) {
          onScroll();
        }

        hasTopHeader = $('.has-rendered-header-advert').exists();
        if(hasTopHeader){
          if ($('.has-rendered-header-advert .htvad.header:visible, .has-rendered-header-advert .htvad.takeover:visible').exists()) {
            $('#page').css('padding-top', parseInt($('.htvad.header:visible, .htvad.takeover:visible').height(), 10) + 52);
          }else{
            $('#page').css('padding-top', '');
            onScroll();
          }
        }

        if ($('#wpadminbar').exists())
          adminBarCorrector = $('#wpadminbar').height();

        /* BLOG
        if (isBlog){
          $('#content').css('min-height', Math.max($('#blogger-info').height(), $('#side').height(), $('#article.post').height()));
        }
        */

        if (w > 479 && h < 350){
          $('body').addClass('touch-menu-wide');
        }else{
          $('body').removeClass('touch-menu-wide');
        }

        var menuHeight = 52;
        $('.menu-main > li:has(ul)').off('mouseenter.nav, mouseleave.nav, touchend.nav');
        if (w < 1000) {
          if ($('body').hasClass('touch-menu-open')) {
            $('.page-header, .main-menu-container').css('height', $(document).height());
            $('.main-menu-container .bg').height(h);
            $('.main-menu-container .wrapper').height(h);
          }else{
            $('.page-header, .main-menu-container').css('height', menuHeight);
            $('.main-menu-container .bg').css({
              height: menuHeight,
              marginLeft: 0,
            });
            $('.main-menu-container .wrapper').css({
              height: menuHeight,
            });
          }
        }else{
          $('.menu-main > li:has(ul)').on('mouseenter.nav, touchend.nav', function (event) {
            if (!$('.sub-menu', this).hasClass('open')){
              event.preventDefault();
              $('.sub-menu', this).stop().addClass('open').css('height', 'auto').slideDown(100);
            }
            $('.sub-menu.open').not($('.sub-menu', this)).stop().removeClass('open').css('height', 'auto').slideUp(100);
          });
          $('.menu-main > li:has(ul)').on('mouseleave.nav', function () {
            $('.sub-menu', this).stop().removeClass('open').css('height', 'auto').slideUp(100);
          });
          $('.page-header, .main-menu-container').css('height', menuHeight);
          $('.main-menu-container .wrapper,.main-menu-container .bg').css({
            height: menuHeight,
            marginLeft: 0,
          });
          $('.toggle-menu').removeClass('open');
          $('body').removeClass('touch-menu-open touch-menu-clip');
        }

        // resize slideshows in single issue/about page
        $('.features.slideshow .slides').each(function(){
          var height = 0;
          $(this).find('> li').each(function(){
            height = Math.max(height, $(this).height());
          });
          $(this).height(height);
        });
      };
      $(window).on('resize orientationchange', onresize);

      var onready = function () {
        var deviceAgent = navigator.userAgent.toLowerCase();
        isIPhone = deviceAgent.match(/(iphone|ipod)/);
        isIPad = deviceAgent.match(/(ipad)/);
        isTouch = ('ontouchstart' in document.documentElement) || (isIPad !== null) || (isIPhone !== null);
      //  isBot = deviceAgent.toLowerCase().match(/(googlebot|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|DuckDuckBot|bingbot|slurp|java|wget|curl|Facebot|Twitterbot|facebookexternalhit|AddThis|seekbot|crawler|bot|crawler|spider|robot|crawling)/i) !== null;

        if (!!navigator.userAgent.match(' Safari/') && !navigator.userAgent.match(' Chrom') && !!navigator.userAgent.match(' Version/5.')){
          $('body').addClass('safari5');
        }

        if ($('.listed.footer').exists()){
          $('body').addClass('has-inline-page-footer');
          $('.page-footer').clone().appendTo('.listed.footer');
        }

        if ($('#wpadminbar').exists())
          adminBarCorrector = $('#wpadminbar').height();

        hasTopHeader = $('.has-rendered-header-advert').exists();

        /* BLOG
        isBlog = $('body.category, body.single-post').exists();
        */

        isArticle = $('body.single-article').exists();

        // BLOG $('.single-post .content-wrapper iframe').addClass('wrapped').wrap('<div class="video-iframe"/>');

        $('.toggle-menu, .main-menu-container').on(((isTouch)? 'touchend': 'click'), function(e){
          if (e.target.nodeName === "A" && !$(e.target).hasClass('toggle-menu')){
            return;
          }

          if ($(e.target).hasClass('logo')){
            return;
          }

          if (e.target.nodeName !== "NAV" && e.target.nodeName !== "A"){
            e.preventDefault();
            return;
          }

          if ($(window).width() > 400 && $(window).height() < 350){
            $('body').addClass('touch-menu-wide');
          }else{
            $('body').removeClass('touch-menu-wide');
          }

          if ($('body').hasClass('touch-menu-open')){
            $('.toggle-menu').removeClass('open');
            $('.main-menu-container .bg').transition({marginLeft: ($('body').hasClass('touch-menu-wide'))? -320: -200}, 250, function(){
              $('.main-menu-container .wrapper, .main-menu-container .bg').height(35);
            });
            $('.main-menu-container').transition({backgroundColor: 'rgba(255,255,255,0)'}, 500, function (){
              $('body').removeClass('touch-menu-clip');
              $('body').removeClass('touch-menu-open');
              $('.main-menu-container').height('auto');
              onresize();
            });
          }else{
            $('body').addClass('touch-menu-clip');
            $('body').addClass('touch-menu-open');
            $('.toggle-menu').addClass('open');
            $('.main-menu-container .wrapper').scrollTop(0).css({
              height: $(window).height(),
            });
            $('.main-menu-container .bg').css({
              marginLeft: ($('body').hasClass('touch-menu-wide'))? -320: -200,
              height: $(window).height(),
            }).transition({marginLeft: 0}, 500);
            $('.main-menu-container').css({
              backgroundColor: 'transparent',
              height: $(window).height(),
            }).transition({backgroundColor: 'rgba(255,255,255,0.85)'}, 500, function(){
              onresize();
            });
          }
        });

        if (isTouch) {
          var osStart = deviceAgent.indexOf( 'OS ' );
          if( ( deviceAgent.indexOf( 'iPhone' ) > -1 || deviceAgent.indexOf( 'iPad' ) > -1 ) && osStart > -1 ){
            iOSVersion = window.Number( agent.substr( osStart + 3, 3 ).replace( '_', '.' ) );// eslint-disable-line
          }
        }

        $('.searchform .s').each(function(){
          $(this).data('term', $(this).val());
        });
        $('.searchform .s').focus(function() {
          var input = $(this);
          input.removeClass('gold');
          if (input.val() == input.data('term')) {
            input.val('');
          }
        }).blur(function() {
          var input = $(this);
          input.removeClass('gold');
          if (input.val() === '' || input.val() != input.data('term')) {
            input.val(input.data('term'));
          }
        }).blur();

        $('.searchform .s').keypress(function (e) {
          var input = $(this);
          if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            if (input.val().length >= 3) {
              $(this).parents('.searchform').submit();
              return false;
            } else {
              input.addClass('gold');
              return false;
            }
          }else{
            input.removeClass('gold');
          }
        });

        $('.mobile-search .searchform label').click(function() {
          $('#mobile-search').width(100);
          $('#mobile-search').focus();
        });
        $('.mobile-search .searchform .s').focus(function() {
          $('.mobile-search .searchform label').hide();
          $('#mobile-search').width(100);
        }).blur(function() {
          $('.mobile-search .searchform label').show();
          $('#mobile-search').width(0);
        }).blur();

        $('.mobile-search .search-button').on('click', function(event){
          event.preventDefault();
          $('.mobile-search').addClass('active');
          return false;
        });

        $('.video-player:not(.init)').enableVideoPlayer();

        if ($('body.page .subscribe .submit').exists()) {
          setInterval(function () {$('body.page .subscribe .submit').toggleClass('blink');},500);
        }

        $('.social.opacity, .page-social.opacity').css('opacity', 0.5).hover(
          function () {$(this).css('opacity', 1);},
          function () {$(this).css('opacity', 0.5);}
        );

        $('.credits').doCredits();

        if('MozBoxSizing' in document.body.style)
          $('html').addClass('ff');

        if ($('.issue').exists()) {
          $('.slideshow.covers .slides').cycle();

          if ($(window).width() < 720) {
            $('.features.slideshow').remove();
          }else{
            $('.si > span').picturefill();
            $('.features.slideshow .slides').cycle();
          }
        }

        if ($().sSelect) {
          $('select#hungertv-month').show().sSelect();
        }

        if (isTouch) {
          $('.menu-main > li:has(ul)').each(function () {
            var li = $('<li>');
            $('a', this).first().clone().text('ALL').appendTo(li);
            $('ul', this).prepend(li);
          });

          $(window).on('touchmove', onScroll);
        }
        $(window).scroll(onScroll);

        /*
        $('.single-article .quote .fb.share-quote').on('click', function(event){
          event.preventDefault();
          var link = $(this);

          window.fbAsyncInit = function() {
            FB.init({
              appId      : '1570003216582218',
              xfbml      : true,
              version    : 'v2.3'
            });

            FB.getLoginStatus(function(response){
              FB.api('/me/feed', 'post', {message: 'Hello, world!'}, function(response) {
                log('API response', response);
              });
            });

            // log({
            //       method: 'feed',
            //       name: 'HUNGER TV',
            //       link: link.data('url'),
            //       picture: link.data('picture'),
            //       caption: link.data('title'),
            //       description: link.data('quote')
            //     });
            // log(2);
            // log(FB.ui(
            //   {
            //     method: 'feed',
            //     name: 'Shared Quote',
            //     link: $(this).data('url'),
            //     picture: $(this).data('picture'),
            //     caption: $(this).data('title'),
            //     description: $(this).data('quote')
            //   },
            //   function(response){
            //     log(response);
            //   }
            // ));
          };

          (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));

          return false;
        });
        */

        onresize();
        onScroll();

        // legacy code to ensure old slideshow links still to work.
        if(window.location.hash && $('body.single-article').exists()) {
          var hash = window.location.hash.substring(1);
          var keys = hash.split('-');
          if (keys.length == 2 && keys[0] == 'slideshow') {
            document.location.href="/gallery/" + HungerTV.post_id + "/1/" + parseInt(keys[1], 10) + '/slideshow/';// eslint-disable-line
          }
        }
      };
      $(document).ready(onready);

      var onload = function () {
        $(window).trigger('resize');

        //HUNGERTVTopBannerHeight = Math.max($('.htvad.header:visible, .htvad.takeover.top:visible').height(), HUNGERTVTopBannerHeight);// eslint-disable-line

        /*
        VVU: FB.XFBML.parse(); disabled so no need to load js
        if ($('.htvfb-like').exists()){
          loadSocialScripts('fb');
        }

        if ($('.twitter-share-button').exists()){
          loadSocialScripts('twitter');
        }

        if ($('.pin-it').exists()){
          loadSocialScripts('pinterest');
        }

        if ($('.tumblr-button').exists()){
          loadSocialScripts('tumblr');
        }

        */

        /*
        This is the old tracking code for advert tracking and post view tracking
        to drive the trending module. This is actually broken as it only tracks if the
        page has adverts
        if (typeof HungerTV !== undefined  && !HungerTV.counted) {
          var postID = 0;
          if ($('body.single-article').exists()) {
            postID = HungerTV.post_id;
          }

          var adids = [];
          $(".htvad").each( function () {
            if($(this).data('id') !== 0 && !$(this).hasClass('do-not-track'))
              adids.push($(this).data('id'));
          });

          if (uniqueValues(adids).length > 0){
            jQuery.post(
              HungerTV.ajaxurl,
              {
                action: 'hungertv_adv_views_submit',
                adids: uniqueValues(adids).join(','),
                postID: parseInt(HungerTV.post_id, 10)
            });
          }

          HungerTV.counted = true;
        }
       */
    /*   if (!isBot && typeof HungerTV !== undefined  && !HungerTV.counted) { // eslint-disable-line
          var adids = [];
          //$(".htvad:visible").each( function () {
          $(".htvad").each( function () {
            if($(this).data('id') !== 0 && !$(this).hasClass('do-not-track'))
              adids.push($(this).data('id'));
          });

          if (uniqueValues(adids).length > 0){
            jQuery.post(
              HungerTV.ajaxurl,// eslint-disable-line
              {
                url: document.location.href,
                action: 'hungertv_adv_views_submit',
                adids: uniqueValues(adids).join(','),
            });
          }

          HungerTV.counted = true; // eslint-disable-line
       } */

        onScroll();
        onresize();
      };
      $(window).load(onload);

      var loadSocialScripts = function(provider, callback){ // eslint-disable-line
        // VVU: FB.XFBML.parse(); generated like button disapeared after 45s
        // very annoying therefore we had to switch to iframe based like button
        // solution which is bad for page speed score but works and does not show
        // the comment popup which did not play well with the button container

        if (provider == "fb"){
          if (typeof FB !== "undefined") {
            //FB.XFBML.parse();
            if (typeof callback === "function")
              callback();
          }else{
            $.getScript("//connect.facebook.net/en_US/sdk.js", function (){
              //FB.XFBML.parse();
              if (typeof callback === "function")
                callback();
            });
          }
        }

        if (provider == "twitter"){
          if (typeof twttr !== "undefined") {
            //twttr.widgets.load();
            if (typeof callback === "function")
              callback();
          }else{
            $.getScript("http://platform.twitter.com/widgets.js", function (){
              //twttr.widgets.load();
              if (typeof callback === "function")
                callback();
            });
          }
        }

        if (provider == "pinterest"){
          $.getScript("//assets.pinterest.com/js/pinit.js");
        }

        if (provider == "tumblr"){
          $.getScript("//platform.tumblr.com/v1/share.js");
        }
      };

      var isSafari7 = /^((?!chrome).)*safari/i.test(navigator.userAgent) && navigator.userAgent.toLowerCase().indexOf('version/7') > -1;
      var safariFixApplied = false;
      var onScroll = function () {
        var scrollTop = $(window).scrollTop();

        if (hasTopHeader && HUNGERTVTopBannerHeight > 0 && $('.has-rendered-header-advert .htvad.header:visible, .has-rendered-header-advert .htvad.takeover.top:visible').exists()) { // eslint-disable-line
          if (scrollTop > HUNGERTVTopBannerHeight) { // eslint-disable-line
            $('html').addClass('top-fixed');
            $('.page-header').css('top', -HUNGERTVTopBannerHeight + adminBarCorrector); // eslint-disable-line

            if (!safariFixApplied && isSafari7){
              safariFixApplied = true;
              $('.htvad.takeover.right, .htvad.takeover.left').css('top', 1);
              setTimeout(function(){
                $('.htvad.takeover.right, .htvad.takeover.left').css('top', 0);
              }, 25);
            }
          } else {
            safariFixApplied = false;
            $('html').removeClass('top-fixed');
            $('.page-header').css('top', adminBarCorrector);
          }
        } else {
          $('html').addClass('top-fixed');
        }

        if (isArticle){
          var header = $('.article-header');
          var share = $('.article-header .share');
          if ($(window).width() >= 1000) {
            if ($('.stream').exists()){
              var s_offset = $('.stream').offset().top;
              if (scrollTop > header.offset().top - 42 - adminBarCorrector){
                if (scrollTop < s_offset - 342 - adminBarCorrector - 32){
                  share.addClass('fixed').css('top', 35 + adminBarCorrector);
                }else{
                  share.removeClass('fixed').css('top', s_offset - 342 - $('.hero').outerHeight() - 35 - 42);
                }
              }else{
                share.removeClass('fixed').css('top', '');
              }
            }
          }else{
            share.removeClass('fixed').css('top', '');
          }
        }
        /* BLOG
        if (isBlog){
          var side = $('#side');
          if ($(window).width() >= 1000) {
            if (side.height() < ($(window).height() - 28 - 28 - 50) && scrollTop > 7 + HUNGERTVTopBannerHeight && !side.hasClass('fixed')){
              side.addClass('fixed').css('top', 28 + 14 + adminBarCorrector);
            }else if(scrollTop < 7 + HUNGERTVTopBannerHeight){
              side.removeClass('fixed').css('top', '');
            }
          }else{
            side.removeClass('fixed');
          }
        }
        */
      };

      var cScrollTo = function (element, top) {
        var adminbar = 0;
        if ($('.admin-bar').length > 0)
          adminbar = 28;

        var scrollTo = 0;

        if (top !== undefined)
          scrollTo = top;

        $("body:not(:animated),html:not(:animated)").animate(
          {scrollTop: element.offset().top - adminbar - scrollTo},
          375
        );
      };

      $.fn.doCredits = function(prepare) { // eslint-disable-line
        var onresize = function(){
          var lines = $('.credits.done').data('lines') || 0;
          if (lines > 3) {
            var span = $('.credits.done span');
            var line_height = ($(window).width() >= 720)? 20:20;
            span.css('height', (3 * line_height) + 9);
            span.css('overflow', 'hidden');
            span.css('display', 'inline-block');
          }
        };
        $(window).on('resize', onresize);

        return this.each(function () {
          var credits = $(this);
          if (credits.hasClass('done'))
            return;
          var span = credits.find('span');

          if (span.exists()) {
            var h = span.css('height', 'auto').height();
            var lines = $('.credits').data('lines') || 0;
            var line_height = ($(window).width() >= 720)? 20:20;

            if (lines > 5) { // leave some error margin for font replacing
              span.css('height', 3 * line_height);
              var more = $('<a href="#" class="more">Show more</a>').on('click', function () {
                h = span.css('height', 'auto').height();
                $(this).blur();
                if ($(this).hasClass('open')) {
                  span.animate({height: (3 * line_height) + 9 }, 500, function () {
                    more.removeClass('open').text('Show more');
                  });
                } else {
                  span.css('height', (3 * line_height));
                  span.animate({height: h}, 750, function () {
                    more.addClass('open').text('Show less');
                  });
                }
                return false;
              });
              more.appendTo(credits);
              credits.addClass('done');
            }
          }
        });
      };

      $.fn.enableVideoPlayer = function(doPlayOnInit) {
        return this.each(function(){
          var player = $(this);
          player.addClass('init');
          player.parents('a').click(function(e){e.preventDefault();});
          var sources = [];

          var isMobile = /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent);
          var isSafari = /Safari/i.test(navigator.userAgent);
          var isFF = /Firefox/i.test(navigator.userAgent);
          var isChrome = !!window.chrome;

          if (typeof player.data('youtube') !== "undefined") {
            sources.push({
              "type": "video/youtube",
              "src": player.data('youtube'),
            });
          } else {
            if (typeof player.data('highres') !== "undefined") {
              sources.push({
                src: player.data('highres'),
                type: 'video/mp4',
                label: '1080p',
                res: 1080,
              });
            }
            if (typeof player.data('standard') !== "undefined") {
              sources.push({
                src: player.data('standard'),
                type: 'video/mp4',
                label: '720p',
                res: 720,
              });
            }
            if (typeof player.data('lowres') !== "undefined") {
              sources.push({
                src: player.data('lowres'),
                type: 'video/mp4',
                label: '540p',
                res: 540,
              });
            }

            if (typeof player.data('youtube') !== "undefined" && ((isMobile || isSafari) && !isFF)) {
              sources.push({
                src: player.data('youtube'),
                type: 'application/vnd.apple.mpegurl',
                label: 'AUTO',
                res: 1,
              });
            }
          }

          if (sources.length > 0){
            var poster = "";
            if (player.data('image-large') || player.data('image-small')){
              if(player.data('image-small')){
                poster = player.data('image-small');
              }
              if (player.width() > 616 && player.data('image-large'))
                poster = player.data('image-large');
            }else if(player.data('image')){
              poster = player.data('image');
            }

            var resolutionSwitcherDefault = ((isMobile || (isSafari && !isChrome))? ((isFF)?540:1):720);
            if (typeof player.data('youtube') !== "undefined")
              resolutionSwitcherDefault = 'low';
            var settings = {
              poster: poster,
              controls: true,
              plugins: {
                videoJsResolutionSwitcher: {
                  default: resolutionSwitcherDefault,
                  dynamicLabel: true,
                },
                watermark: {
                  position: 'top-right',
                  fadeTime: 3000,
                  url: 'http://www.hungertv.com',
                  image: HungerTV.tplurl + '/img/player_hunger@2x.png' // eslint-disable-line
                },
                persistvolume: {
                  namespace: 'HTV',
                },
                replayButton: {},
                htvTrack : { //xxx confirm it actuall works
                  info : player.data('tracking-info'),
                  url: player.data('permalink'),
                  debug: false,
                },
                htvEndCards: {
                  url : HungerTV.endcards, // eslint-disable-line
                  title: 'Continue watching on Hunger&hellip;',
                  target: false,
                  debug: false,
                },
              },
            };

            if (typeof player.data('youtube') !== "undefined") {
              settings.sources = sources;
            }

            if (typeof player.data('embed') !== undefined && player.data('embed')){
              settings.plugins.htvShareOverlay = {
                position: 'top-left',
                fadeTime: 3000,
                active: true,
                embed: '<iframe width="500" height="281" src="' + player.data('embed') + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                url: player.data('permalink'),
                title: player.data('title'),
                media: poster,
              };
            }

            if (typeof player.data('youtube') !== "undefined") {
              settings.techOrder = ["youtube"];
            }else{
              settings.techOrder = ["html5","flash"];
            }

            // the sharing plugin needs at least a player width of 320px as there is no handle to
            // hide it we must make sure to render it only on wide enough screens

            HUNGERTVVideoJSCount++; // eslint-disable-line

            if (typeof videojs === "function"){
              if (sources.length > 0){
                videojs(player.attr('id'), settings, function(){ // eslint-disable-line
                  var player = this;
                  var element = $(player.el());
                  var index = HUNGERTVVideoJSCount;// eslint-disable-line

                  if (typeof element.data('youtube') === "undefined") {
                    player.updateSrc(sources);
                  }

                  player.on('play', function(){
                    $().pauseVideoPlayers($(".video-js").index($(this.el())));
                  });

                  if (typeof doPlayOnInit !== 'undefined' && doPlayOnInit){
                    player.play();
                  }
                });
              }
            }else{
              log('videojs is not loaded');// eslint-disable-line
            }
          }
        });
      };

      $.fn.pauseVideoPlayers = function(videoIndex) {
        try {
          $(".video-js").each(function (index) {
            if (videoIndex !== index && typeof this.player !== 'undefined') {
              this.player.pause();
            }
          });
        } catch (e) {}// eslint-disable-line
      };

      $.fn.sharePopUp = function() {
        $(window).on('resize', function(event) {// eslint-disable-line
          $(".sharePopUpContainer").fadeOut(250);
        });
        return this.each(function() {
          if ($(this).data('sharePopUp')) {
            return;
          } else {
            $(this).data('sharePopUp', true);
          }
          var open = false;
          var init = false;

          $(this).on('click', function () {
            var parent = $(this).parent();

            var img = parent.find('img:first, .video-player:first > div');
            if (img.exists()) {
              if (!open) {
                open = true;

                var overlay = parent.find('.sharePopUpContainer');
                if (!overlay.exists());
                  overlay = $('<div class="sharePopUpContainer"><div class="sharePopUpOverlay"></div><div class="sharePopUpButtons"></div></div>');

                var buttons = overlay.find('.sharePopUpButtons');

                if (!init) {
                  parent.css('position', 'relative');

                  var title = encodeURIComponent(window.document.title);
                  var url = encodeURIComponent($(this).attr('href'));
                  var src = encodeURIComponent(img.attr('src'));

                  overlay.appendTo(parent);
                  overlay.find('.sharePopUpOverlay').css('opacity', 0.8);

                  var tmpURL = 'http://www.facebook.com/sharer.php?u=' + url + '&t=' + title;
                  var l = $('<a href="' + tmpURL + '" class="fb" target="_blank">Facebook</a>');
                  l.appendTo(buttons);

                  tmpURL = 'https://twitter.com/intent/tweet?text=' + title + '&via=hungermagazine&url=' + url;
                  l = $('<a href="' + tmpURL + '" class="twitter" target="_blank" data-via="hungermagazine">Twitter</a>');
                  l.appendTo(buttons);

                  tmpURL = 'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + src + '&description=' + title;
                  l = $('<a href="' + tmpURL + '" class="pinterest" target="_blank">Pinterest</a>');
                  l.appendTo(buttons);

                  tmpURL = 'http://www.tumblr.com/share?v=3&u=' + url + '&t=' + title;
                  l = $('<a href="' + tmpURL + '" class="tumblr" target="_blank">Tumblr</a>');
                  l.appendTo(buttons);

                  overlay.hide();
                  init = true;
                }
                $(".sharePopUpContainer").fadeOut(250);

                overlay.css({
                  width: img.width(),
                  height: img.height(),
                });

                buttons.css({
                  marginTop: (img.height()/2) - (buttons.height()/2),
                  marginLeft: (img.width()/2) - (buttons.width()/2),
                });

                parent.find(".sharePopUpContainer").stop().fadeIn(500, function () {
                  if ($(this).offset().top < $(document).scrollTop())
                    cScrollTo($(this), 100);
                });
              } else {
                open = false;
                parent.find(".sharePopUpContainer").fadeOut(250);
              }
            }
            return false;
          });
        });
      };

      /*var uniqueValues = function(input){
        var output = [];
        for (var i = 0; i < input.length; i++){
          if ((jQuery.inArray(input[i], output)) == -1){
            output.push(input[i]);
          }
        }
        return output;
      }; */

      $.fn.streamTopBorder = function(elements, current_page, clear){
        if (typeof elements === 'undefined')
          elements = $('.stream .listed');

        if (typeof clear !== 'undefined')
          elements.removeClass('c1').removeClass('c2').removeClass('c3').removeClass('p1').removeClass('p2');

        if (typeof current_page === 'undefined')
          current_page = 1;

        // the dynamic borders are only necessary for the
        // first two pages (below featured carousel and the inserted footer)
        if (current_page > 2)
          return;

        var counter = 1;
        elements.slice(0,3).each(function(){
          $(this).addClass('c' + counter + ' p' + current_page);
          counter++;
        });
      };
    })(jQuery);
//end old custom.js
// start old accordian.js
/*
  jQuery zAccordion Plugin v2.1.0
  Copyright (c) 2010 - 2012 Nate Armagost, http://www.armagost.com/zaccordion
  Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
(function(a){a.fn.zAccordion=function(e){var d={timeout:6000,width:null,slideWidth:null,tabWidth:null,height:null,startingSlide:0,slideClass:null,easing:null,speed:1200,auto:true,trigger:"click",pause:true,invert:false,animationStart:function(){},animationComplete:function(){},buildComplete:function(){},errors:false},c={displayError:function(g,f){if(window.console&&f){console.log("zAccordion: "+g+".")}},findChildElements:function(f){if(f.children().get(0)===undefined){return false}else{return true}},getNext:function(g,h){var f=h+1;if(f>=g){f=0}return f},fixHeight:function(f){if((f.height===null)&&(f.slideHeight!==undefined)){f.height=f.slideHeight;return true}else{if((f.height!==null)&&(f.slideHeight===undefined)){return true}else{if((f.height===null)&&(f.slideHeight===undefined)){return false}}}},getUnits:function(f){if(f!==null){if(f.toString().indexOf("%")>-1){return"%"}else{if(f.toString().indexOf("px")>-1){return"px"}else{return"px"}}}},toInteger:function(f){if(f!==null){return parseInt(f,10)}},sizeAccordion:function(f,g){if((g.width===undefined)&&(g.slideWidth===undefined)&&(g.tabWidth===undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth===undefined)&&(g.tabWidth===undefined)){if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{g.slideWidthUnits=g.widthUnits;g.tabWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.tabWidth=100/(f.children().size()+1);g.slideWidth=100-((f.children().size()-1)*g.tabWidth)}else{g.tabWidth=g.width/(f.children().size()+1);g.slideWidth=g.width-((f.children().size()-1)*g.tabWidth)}return true}}else{if((g.width===undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth===undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width===undefined)&&(g.slideWidth===undefined)&&(g.tabWidth!==undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth===undefined)&&(g.tabWidth!==undefined)){if(g.widthUnits!==g.tabWidthUnits){c.displayError("Units do not match",g.errors);return false}else{if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{if((((f.children().size()*g.tabWidth)>100)&&(g.widthUnits==="%"))||(((f.children().size()*g.tabWidth)>g.width)&&(g.widthUnits==="px"))){c.displayError("tabWidth too large for accordion",g.errors);return false}else{g.slideWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.slideWidth=100-((f.children().size()-1)*g.tabWidth)}else{g.slideWidth=g.width-((f.children().size()-1)*g.tabWidth)}return true}}}}else{if((g.width!==undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth===undefined)){if(g.widthUnits!==g.slideWidthUnits){c.displayError("Units do not match",g.errors);return false}else{if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{if(g.slideWidth>=g.width){c.displayError("slideWidth cannot be greater than or equal to width",g.errors);return false}else{if((((f.children().size()*g.slideWidth)<100)&&(g.widthUnits==="%"))||(((f.children().size()*g.slideWidth)<g.width)&&(g.widthUnits==="px"))){c.displayError("slideWidth too small for accordion",g.errors);return false}else{g.tabWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.tabWidth=(100-g.slideWidth)/(f.children().size()-1)}else{g.tabWidth=(g.width-g.slideWidth)/(f.children().size()-1)}return true}}}}}else{if((g.width===undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth!==undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth!==undefined)){c.displayError("At maximum two of three attributes (width, slideWidth, and tabWidth) should be defined",g.errors);return false}}}}}}}}},timer:function(k){var l=k.data("next")+1;if(k.data("pause")&&k.data("inside")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(j){}}else{if(k.data("pause")&&!k.data("inside")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(i){}k.data("interval",setTimeout(function(){k.children(k.children().get(0).tagName+":nth-child("+l+")").trigger(k.data("trigger"))},k.data("timeout")))}else{if(!k.data("pause")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(h){}k.data("interval",setTimeout(function(){k.children(k.children().get(0).tagName+":nth-child("+l+")").trigger(k.data("trigger"))},k.data("timeout")))}}}}},b={init:function(h){var i,g=["slideWidth","tabWidth","startingSlide","slideClass","animationStart","animationComplete","buildComplete"];for(i=0;i<g.length;i+=1){if(a(this).data(g[i].toLowerCase())!==undefined){a(this).data(g[i],a(this).data(g[i].toLowerCase()));a(this).removeData(g[i].toLowerCase())}}h=a.extend(d,h,a(this).data());if(this.length<=0){c.displayError("Selector does not exist",h.errors);return false}else{if(!c.fixHeight(h)){c.displayError("height must be defined",h.errors);return false}else{if(!c.findChildElements(this)){c.displayError("No child elements available",h.errors);return false}else{if(h.speed>h.timeout){c.displayError("Speed cannot be greater than timeout",h.errors);return false}else{h.heightUnits=c.getUnits(h.height);h.height=c.toInteger(h.height);h.widthUnits=c.getUnits(h.width);h.width=c.toInteger(h.width);h.slideWidthUnits=c.getUnits(h.slideWidth);h.slideWidth=c.toInteger(h.slideWidth);h.tabWidthUnits=c.getUnits(h.tabWidth);h.tabWidth=c.toInteger(h.tabWidth);if(h.slideClass!==null){h.slideOpenClass=h.slideClass+"-open";h.slideClosedClass=h.slideClass+"-closed";h.slidePreviousClass=h.slideClass+"-previous"}if(!c.sizeAccordion(this,h)){return false}else{return this.each(function(){var q=h,p=a(this),j=[],k,f,n,l,m=-1;k=q.slideWidth-q.tabWidth;f=p.get(0).tagName;n=p.children().get(0).tagName;l=p.children().size();p.data(a.extend({},{auto:q.auto,interval:null,timeout:q.timeout,trigger:q.trigger,current:q.startingSlide,previous:m,next:c.getNext(l,q.startingSlide),slideClass:q.slideClass,inside:false,pause:q.pause}));if(q.heightUnits==="%"){q.height=(p.parent().get(0).tagName==="BODY")?q.height*0.01*a(window).height():q.height*0.01*p.parent().height();q.heightUnits="px"}p.children().each(function(s){var r,o,t;o=q.invert?o=((l-1)*q.tabWidth)-(s*q.tabWidth):s*q.tabWidth;j[s]=o;r=q.invert?((l-1)-s)*10:s*10;if(q.slideClass!==null){a(this).addClass(q.slideClass)}a(this).css({top:0,"z-index":r,margin:0,padding:0,"float":"left",display:"block",position:"absolute",overflow:"hidden",width:q.slideWidth+q.widthUnits,height:q.height+q.heightUnits});if(n==="LI"){a(this).css({"text-indent":0})}if(q.invert){a(this).css({right:o+q.widthUnits,"float":"right"})}else{a(this).css({left:o+q.widthUnits,"float":"left"})}if(s===(q.startingSlide)){a(this).css("cursor","default");if(q.slideClass!==null){a(this).addClass(q.slideOpenClass)}}else{a(this).css("cursor","pointer");if(q.slideClass!==null){a(this).addClass(q.slideClosedClass)}if((s>(q.startingSlide))&&(!q.invert)){t=s+1;p.children(n+":nth-child("+t+")").css({left:j[t-1]+k+q.widthUnits})}else{if((s<(q.startingSlide))&&(q.invert)){t=s+1;p.children(n+":nth-child("+t+")").css({right:j[t-1]+k+q.widthUnits})}}}});p.css({display:"block",height:q.height+q.heightUnits,width:q.width+q.widthUnits,padding:0,position:"relative",overflow:"hidden"});if((f==="UL")||(f==="OL")){p.css({"list-style":"none"})}p.hover(function(){p.data("inside",true);if(p.data("pause")){try{clearTimeout(p.data("interval"))}catch(o){}}},function(){p.data("inside",false);if(p.data("auto")&&p.data("pause")){c.timer(p)}});p.children().bind(q.trigger,function(){if(a(this).index()!==p.data("current")){var r,o,s,t;s=m+1;t=p.data("current")+1;if((s!==0)&&(q.slideClass!==null)){p.children(n+":nth-child("+s+")").removeClass(q.slidePreviousClass)}p.children(n+":nth-child("+t+")");if(q.slideClass!==null){p.children(n+":nth-child("+t+")").addClass(q.slidePreviousClass)}m=p.data("current");p.data("previous",p.data("current"));s=m;s+=1;p.data("current",a(this).index());t=p.data("current");t+=1;p.children().css("cursor","pointer");a(this).css("cursor","default");if(q.slideClass!==null){p.children().addClass(q.slideClosedClass).removeClass(q.slideOpenClass);a(this).addClass(q.slideOpenClass).removeClass(q.slideClosedClass)}p.data("next",c.getNext(l,a(this).index()));c.timer(p);q.animationStart();if(q.invert){p.children(n+":nth-child("+t+")").stop().animate({right:j[p.data("current")]+q.widthUnits},q.speed,q.easing,q.animationComplete)}else{p.children(n+":nth-child("+t+")").stop().animate({left:j[p.data("current")]+q.widthUnits},q.speed,q.easing,q.animationComplete)}for(r=0;r<l;r+=1){o=r+1;if(r<p.data("current")){if(q.invert){p.children(n+":nth-child("+o+")").stop().animate({right:q.width-(o*q.tabWidth)+q.widthUnits},q.speed,q.easing)}else{p.children(n+":nth-child("+o+")").stop().animate({left:j[r]+q.widthUnits},q.speed,q.easing)}}if(r>p.data("current")){if(q.invert){p.children(n+":nth-child("+o+")").stop().animate({right:(l-o)*q.tabWidth+q.widthUnits},q.speed,q.easing)}else{p.children(n+":nth-child("+o+")").stop().animate({left:j[r]+k+q.widthUnits},q.speed,q.easing)}}}return false}});if(p.data("auto")){c.timer(p)}q.buildComplete()})}}}}}},stop:function(){if(a(this).data("auto")){clearTimeout(a(this).data("interval"));a(this).data("auto",false)}},start:function(){if(!a(this).data("auto")){var f=a(this).data("next")+1;a(this).data("auto",true);a(this).children(a(this).children().get(0).tagName+":nth-child("+f+")").trigger(a(this).data("trigger"))}},trigger:function(f){if((f>=a(this).children().size())||(f<0)){f=0}f+=1;a(this).children(a(this).children().get(0).tagName+":nth-child("+f+")").trigger(a(this).data("trigger"))},destroy:function(i){var f,g,h=a(this).data("slideClass");if(i!==undefined){f=(i.removeStyleAttr!==undefined)?i.removeStyleAttr:true;g=(i.removeClasses!==undefined)?i.removeClasses:false}clearTimeout(a(this).data("interval"));a(this).children().stop().unbind(a(this).data("trigger"));// eslint-disable-line
a(this).unbind("mouseenter mouseleave mouseover mouseout");if(f){a(this).removeAttr("style");a(this).children().removeAttr("style")}if(g){a(this).children().removeClass(h);a(this).children().removeClass(h+"-open");a(this).children().removeClass(h+"-closed");a(this).children().removeClass(h+"-previous")}a(this).removeData();if(i!==undefined){if(i.destroyComplete!=="undefined"){if(typeof(i.destroyComplete.afterDestroy)!=="undefined"){i.destroyComplete.afterDestroy()}if(i.destroyComplete.rebuild){return b.init.apply(this,[i.destroyComplete.rebuild])}}}}};if(b[e]){return b[e].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof e==="object"||!e){return b.init.apply(this,arguments)}else{a.error("zAccordion: "+e+" does not exist.")}}}}(jQuery));; // eslint-disable-line
(function ($) {
  var isIPhone = false;
  var isIPad = false;
  var isTouch = false; // eslint-disable-line
  var accordion = null;
  var slides = null;
  var accordion_transition_speed = 500;
  var accordion_large_min_window_height = 675;// eslint-disable-line
  var content = false;
  var renderedWidth = 0;
  var arrow_height = 27;

  /*var cycle2_default_options = {
    swipe: true,
    'swipe-fx': "scrollHorz",
    timeout: 3000,
    speed: 500,
    slides: "> li",
    'pause-on-hover': 3000,
    controlNav: false,
  };*/

  var zaccordion_default_options = {
    timeout: 5000,
    tabWidth: 49,
    width: 798,
    speed: accordion_transition_speed,
    height: 358,
    auto: true,
    slideClass: 'slide',
    buildComplete: function () {
      accordion.css('visibility', 'visible');
    },
    animationStart: function () {
      slides.find('.video-player').remove();
      slides.data('auto', true);
      $("#featured .desc li").stop(true, true);
      $("#featured .desc li:visible").hide();
      $("#featured .desc li:eq(" + $("#featured .slides").data().current + ")").show();
    },
  };

  var renderAccordion = function (format) {// eslint-disable-line
    if ((content.width() >= 980 && renderedWidth >= 980))
      return;

    accordion.css({
          'visibility':'visible',
          'opacity': 1});
      slides.css({
          'visibility':'visible',
          'opacity': 1});

    if (content.width() >= 720){
      new_width = content.width() + 14;// eslint-disable-line

      if ((new_width >= 980 && renderedWidth >= 980))// eslint-disable-line
        return;

      if (renderedWidth == new_width)// eslint-disable-line
        return;

      renderedWidth = content.width();

      accordion.addClass('is-zaccordion');

      if (accordion.hasClass('is-cycle2')){
        slides.cycle('destroy');
        slides.off('cycle-after');
        accordion.removeClass('is-cycle2');
        slides.find('.video-player').remove();
      }

      var new_tab_width = Math.max(70, Math.round((new_width * 0.0575)));// eslint-disable-line
      var new_height = 0;

      while (new_height === 0){
        var tmp_height = (new_width - 14 - (3 * new_tab_width)) / 16 * 9;// eslint-disable-line
        if (tmp_height % 1 < 0.2) {
          new_height = tmp_height;
          break;
        }else{
          new_tab_width++;
        }
        if (tmp_height < 0)
          break;
      }
      accordion.height(new_height + arrow_height);

      options = $.extend({}, zaccordion_default_options, {// eslint-disable-line
        tabWidth: new_tab_width,
        width: new_width,// eslint-disable-line
        height: new_height,
        timeout: slides.data('timeout'),
      });

      accordion.find('li > div, li img').css({
        height: new_height,
        width: 'auto',
      });

      if (!$.isEmptyObject(slides.data())) { /* If an zAccordion is found, rebuild it with new settings. */
        current = slides.data('current');// eslint-disable-line
        opts = $.extend({ // eslint-disable-line
          startingSlide: current,// eslint-disable-line
        }, options);// eslint-disable-line
        slides.zAccordion('destroy', {
          removeStyleAttr: true,
          removeClasses: true,
          destroyComplete: {
            rebuild: opts,// eslint-disable-line
          },
        });
      } else {
        slides.zAccordion(options);// eslint-disable-line
      }
      accordion.find('.ai > span').picturefill();
      slides.imagesLoaded(function(){
        accordion.removeClass('loading');
        accordion.find('.ai > span').picturefill();
      });
    } else{
      renderedWidth = content.width();

      //doInit = false// eslint-disable-line
     /* if (!accordion.hasClass('is-cycle2')){
        doInit = true;// eslint-disable-line
      }*/
      accordion.removeClass('is-zaccordion');
      accordion.addClass('is-cycle2');

      var new_height = $(window).height() - 90;// eslint-disable-line
      if (new_height > (content.width()/16*9 + arrow_height)){
        new_height = content.width()/16*9 + arrow_height;
      }

      new_height = Math.max(new_height, 150);

      accordion.height(new_height);

      /*if (doInit) {// eslint-disable-line
        slides.zAccordion('destroy', {
          removeStyleAttr: true,
          removeClasses: true,
          destroyComplete: {
            rebuild: {},
          },
        });

        accordion.find('.ai > span').picturefill();
        slides.show();


        slides.data('timeout')
        opts = $.extend({}, cycle2_default_options,{// eslint-disable-line
          timeout: slides.data('timeout'),
        });
        slides.cycle(opts);// eslint-disable-line

        slides.on('cycle-after', function( event, opts ) {
          slides.find('.video-player').remove();
          $("#featured .desc li").stop(true, true);
          $("#featured .desc li:visible").hide();
          $("#featured .desc li:eq(" + (opts.slideNum - 1) + ")").show();
        });

        slides.imagesLoaded(function(){
          accordion.removeClass('loading');
          accordion.find('.ai > span').picturefill();
        });
      }*/
      slides.css('height', new_height - arrow_height);
      accordion.find('.ai > span').picturefill();
    }
  };

  var initAccordion = function () {
    accordion.show().css('opacity', 0);
    accordion.parent().find(".desc").show();
    accordion.parent().find(".arrow").show();
    accordion.parent().find(".desc li").first().show();

    $(document).on("click", ".acc-img,.acc-caption", function () {
      var show = false;

      var article_src = $(this).parents('li').find('.acc-img').data('article-src');

      if (accordion.hasClass('is-cycle2')  && article_src !== "")
        show = true;

      if (accordion.hasClass('is-zaccordion') && !$(this).parents('li').hasClass('slide-closed') && article_src !== "")
        show = true;

      if (show) {
        if ($(this).parents('li').data('target') == "_blank") {
          window.open(article_src, '_blank');
          window.focus();
        } else {
          document.location.href = article_src;
        }
      }
    });

    var showNext = function () {
      if (accordion.hasClass('is-zaccordion')){
        slides.zAccordion("trigger", slides.data().next);
      }else{
        slides.cycle('next');
        slides.cycle('pause');
      }
    };

    var showPrev = function () {
      if (accordion.hasClass('is-zaccordion')){
        var previous = slides.data().current - 1;
        if (previous < 0)
          previous = 3;

        slides.zAccordion("trigger", previous);
      }else{
        slides.cycle('prev');
        slides.cycle('pause');
      }
    };

    accordion.parent().find(".arrow.next").on("click.zaccordion", function() {
      showNext();
      return false;
    });

    accordion.parent().find(".arrow.prev").on("click.zaccordion", function(e) {// eslint-disable-line
      showPrev();
      return false;
    });

    $(document).keydown(function(e){
      if (e.keyCode == 37) {
        showPrev();
      }
      if (e.keyCode == 39) {
        showNext();
      }
    });

    onresize(true);
    $(window).on('resize orientationchange', onresize);
  };

  var initReady = function () {
    var deviceAgent = navigator.userAgent.toLowerCase();
    isIPhone = deviceAgent.match(/(iphone|ipod)/);
    isIPad = deviceAgent.match(/(ipad)/);
    isTouch = ('ontouchstart' in document.documentElement) || (isIPad !== null) || (isIPhone !== null);

    $('h2.articles.first').text('');

    content = $('.content-header');
    accordion = $('#featured');
    slides = $('#featured').find('.slides');

    var div = $('<div/>').addClass('border');
    accordion.find(".ai").css('display', 'block').wrap(div);
    initAccordion();

    accordion.find('span.acc-dyn-video').each(function () {
      var img = $(this);
      img.parent().css({
        position: 'relative',
      });

      var a = $('<a class="video-icon-large" href="#"></a>');
      a.css({
        position: 'absolute',
        top: 0,
        left: 0,
        width: '100%',
        height: '100%',
      }).on('click', function (event) { // eslint-disable-line
        if (accordion.hasClass('is-zaccordion')){
          if ($(this).parents('li').hasClass('slide-closed')){

            slides.zAccordion("trigger", $(this).parents('li').index());
            return;
          }
          slides.zAccordion("stop");
        }else{
          slides.cycle('pause');
        }

        if (videojs !== undefined) {// eslint-disable-line
          HUNGERTVVideoJSCount++;// eslint-disable-line

          var a = $(this);
          var span = a.siblings('span.acc-dyn-video');

          if (span.exists() && span.find('img').exists()) {
            var player = $('<video class="video-player video-js vjs-16-9 vjs-default-skin has-videojs" id="htvp-' + HUNGERTVVideoJSCount + '" controls preload="auto" width="640" height="360" style="width:100%;height:100%;"><p class="vjs-no-js">Initializing video player</p></video>');// eslint-disable-line
            player.data(span.data());
            player.data('image', span.find('img').attr('src'));

            var new_width = a.parent().height() / 9 * 16;
            player.css({
              position: 'absolute',
              top: 0,
              width: new_width,
              height: a.parent().height(),
            });
            player.appendTo(a.parent());
            player.enableVideoPlayer(true);
          }
        }
        return false;
      });
      a.appendTo(img.parent());
    });

  };
  $(document).ready(initReady);

  var onresize = function (doNow) {
    slides.find('.video-player').css({
      width: slides.height()/9 * 16,
      height: slides.height(),
    });

    // debounce accordion rendering to make it less
    // sluggish
    if (typeof doNow !== "undefined"){
      renderAccordion();
    }else{
      clearTimeout(this.id);
      this.id = setTimeout(renderAccordion, 300);
    }
  };




})(jQuery);
// old accordian.js

// start old htvad.js
(function ($, w, d, u) {// eslint-disable-line
  var isIPhone = false;// eslint-disable-line
  var isIPad = false;// eslint-disable-line
  var isAndroid = false;// eslint-disable-line
  var isBlackberry = false;// eslint-disable-line
  var isTouch = false;// eslint-disable-line
  var adminBarCorrector = 0;// eslint-disable-line
 // var win = $(window);

 /* var showCarouselFallback = function(){
    var slotElement = $('#gpt-carousel');
    if (slotElement.exists()){
      var container = slotElement.parents('.htvad');
      var fallback = container.data('fallback');

      if (typeof container.data('fallback') !== 'undefined'){
        container.find('.payload').html($.parseJSON(fallback));
        $('.ai > span').picturefill();
      }
    }
  };

  var closeGallerySidebarMPU = function(){
    $('.sidebar .dfp.mpu').hide();
  };

  var closeTakeoverSlots = function(){
    HUNGERTVTopBannerHeight = 0;// eslint-disable-line
    $('body').removeClass('has-top-banner');
    $('html').addClass('top-fixed');
    $('html').removeClass('has-rendered-header-advert');
    $('.htvad.takeover').remove();
    win.trigger('scroll');
    win.trigger('resize');
  };

  var closeInSkinSlot = function(){
    HUNGERTVTopBannerHeight = 0;// eslint-disable-line
    $('body').removeClass('has-top-banner');
    $('html').addClass('top-fixed');
    $('html').removeClass('has-rendered-header-advert');
    $('.page-header .ad').remove();
    win.trigger('scroll');
    win.trigger('resize');
  };

  var closeBannerSlot = function(){
    HUNGERTVTopBannerHeight = 0;// eslint-disable-line
    $('body').removeClass('has-top-banner');
    $('html').addClass('top-fixed');
    $('html').removeClass('has-rendered-header-advert');
    win.trigger('scroll');
    win.trigger('resize');
  };

  var moveNewsletterPopup = function(){
    var item = $('.stream .listed.subscribe');
    var swapWith = item.next();
    item.before(swapWith.detach());
    if ($(".stream .listing").data('masonry')){
      $(".stream .listing").masonry('reloadItems');
    }
  }; */

 /*var closeFeatureStreamAds = function(){
    $('.stream .listed.htvad').remove();
    moveNewsletterPopup();
    win.trigger('resize');
  }; 8?

  var onready = function () {
    if (win.width() > 1000 && window.googletag){
      googletag.cmd.push(function() {// eslint-disable-line
        if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.hpto_top !== 'undefined'){// eslint-disable-line
          googletag.display('gpt-hpto-top');// eslint-disable-line
          googletag.pubads().refresh([primary_adslots.hpto_top]);// eslint-disable-line
        }
      });
      googletag.cmd.push(function() {// eslint-disable-line
        if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.hpto_left !== 'undefined'){// eslint-disable-line
          googletag.display('gpt-hpto-left');// eslint-disable-line
          googletag.pubads().refresh([primary_adslots.hpto_left]);// eslint-disable-line
        }
      });
      googletag.cmd.push(function() {// eslint-disable-line
        if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.hpto_right !== 'undefined'){// eslint-disable-line
          googletag.display('gpt-hpto-right');// eslint-disable-line
          googletag.pubads().refresh([primary_adslots.hpto_right]);// eslint-disable-line
        }
      });
    }
    };
    $(document).ready(onready);

  win.on('dfp-slot-rendered', function(event, isEmpty, slot){
    var slotID = slot.getSlotElementId();

    if (slotID.indexOf('gpt-feature-stream-mpu-1') > -1){
      window.adsRendered.FEATURE_STREAM_MPU_HPU = true;

      if (isEmpty){
        $('#' + slotID).parents('.listed').remove();
        if (slotID === 'gpt-feature-stream-mpu-1')
          moveNewsletterPopup();
      }

      $().streamTopBorder($('.stream .listed'), 1, true);
      $().streamTopBorder($('.stream .listed.do-top-border'), 2, true);

      win.trigger('resize');
    }

    if (slotID.indexOf('gpt-feature-stream-mobkoi') > -1){
      window.adsRendered.FEATURE_STREAM_MOBKOI = true;

      if (isEmpty){
        $('#' + slotID).parents('.listed').remove();
      }

      $().streamTopBorder($('.stream .listed'), 1, true);
      $().streamTopBorder($('.stream .listed.do-top-border'), 2, true);

      win.trigger('resize');
    }

    if (slotID.indexOf('gpt-feature-stream-mpu-2') > -1){
      window.adsRendered.FEATURE_STREAM_MPU_HPU_2 = true;

      if (isEmpty){
        $('#' + slotID).parents('.listed').remove();
      }

      $().streamTopBorder($('.stream .listed'), 1, true);
      $().streamTopBorder($('.stream .listed.do-top-border'), 2, true);

      win.trigger('resize');
    }

    if (slotID == 'gpt-feature-mpu-hpu'){
      window.adsRendered.FEATURE_HPU_MPU = true;
      if (isEmpty){
        $('.single-article .paragraphs .paragraph.htvadv.mpu').hide();
      }
    }

    if (slotID == 'gpt-feature-mobkoi'){
      window.adsRendered.FEATURE_MOBKOI = true;
      if (isEmpty){
        $('.single-article .paragraphs .paragraph.htvadv.mobkoi').hide();
      }
    }

    if (slotID == 'gpt-hpto-top'){
      window.adsRendered.HPTO_TOP = true;
      if (isEmpty){
        closeTakeoverSlots();
        if (win.width() > 1000){
          googletag.cmd.push(function() {// eslint-disable-line
            if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.banner !== 'undefined'){// eslint-disable-line
              googletag.display('gpt-banner');// eslint-disable-line
              googletag.pubads().refresh([primary_adslots.banner]);// eslint-disable-line
            }
          });
        }
      }else{
        $('.page-header .ad').show();
        $('html').addClass('has-rendered-header-advert');
        $('html').removeClass('top-fixed');
        $('body').addClass('has-top-banner');

        HUNGERTVTopBannerHeight = Math.max($('.htvad.header:visible, .htvad.takeover.top:visible').height(), HUNGERTVTopBannerHeight);// eslint-disable-line
        win.trigger('scroll');
        win.trigger('resize');
      }
    }

    if (slotID == 'gpt-hpto-left'){
      window.adsRendered.HPTO_LEFT = true;
    }

    if (slotID == 'gpt-hpto-right'){
      window.adsRendered.HPTO_RIGHT = true;
    }

    if (slotID == 'gpt-banner'){
      window.adsRendered.BANNER = true;

      if (isEmpty){
        closeBannerSlot();
        if (screen.width > 1260){
          googletag.cmd.push(function() {// eslint-disable-line
            if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.inskin !== 'undefined'){// eslint-disable-line
              googletag.display('gpt-inskin');// eslint-disable-line
              googletag.pubads().refresh([primary_adslots.inskin]);// eslint-disable-line
            }
          });
        }
      }else{
        $('.page-header .ad').show();
        $('html').addClass('has-rendered-header-advert');
        $('html').removeClass('top-fixed');
        $('body').addClass('has-top-banner');

        HUNGERTVTopBannerHeight = Math.max($('.htvad.header:visible, .htvad.takeover.top:visible').height(), HUNGERTVTopBannerHeight);// eslint-disable-line
        win.trigger('scroll');
        win.trigger('resize');
      }
    }

    if (slotID == 'gpt-inskin'){
      window.adsRendered.INSKIN = true;
      if (isEmpty){
        closeInSkinSlot();
      }else{
        $('.page-header .ad').show();
        $('html').addClass('has-rendered-header-advert');
        $('html').removeClass('top-fixed');
        $('body').addClass('has-top-banner');

        HUNGERTVTopBannerHeight = Math.max($('.htvad.header:visible, .htvad.takeover.top:visible').height(), HUNGERTVTopBannerHeight);// eslint-disable-line
        win.trigger('scroll');
        win.trigger('resize');
      }
    }

    if (slotID == 'gpt-carousel'){
      window.adsRendered.CAROUSEL = true;
      if (isEmpty){
        showCarouselFallback();
      }else{
        $('#featured .desc .s2 a').hide();
      }
    }

    if (slotID == 'gpt-gallery-sidebar-mpu'){
      window.adsRendered.GALLERY_SIDEBAR_MPU = true;
      if (isEmpty){
        closeGallerySidebarMPU();
      }
    }

    win.trigger('resize');
  });

 /*var onload = function () {
    // a general test whether ads are blocked can be found here
   if (!window.adsRendered.CAROUSEL)
      showCarouselFallback();

    if (!window.adsRendered.FEATURE_HPU_MPU){
      closeFeatureADVParagraph();// eslint-disable-line
    }

    if (!window.adsRendered.GALLERY_SIDEBAR_MPU){
      closeGallerySidebarMPU();
    }

    if (window.adsBlocked){
      closeTakeoverSlots();
      closeInSkinSlot();
      closeGallerySidebarMPU();
      closeFeatureStreamAds();
      $().streamTopBorder($('.stream .listed'), 1, true);
      win.trigger('resize');
    }else{
      HUNGERTVTopBannerHeight = Math.max($('.htvad.header:visible, .htvad.takeover.top:visible').height(), HUNGERTVTopBannerHeight);// eslint-disable-line
    }
}; */
  $(window).load(onload);

})(jQuery, window, document, undefined);
// end old htvad.js

// start old plugins.js
jQuery.fn.exists = function(){return this.length>0;};

window.log = function(){
  log.history = log.history || [];// eslint-disable-line
  log.history.push(arguments);// eslint-disable-line
  arguments.callee = arguments.callee.caller;
//  if(this.console) console.log( Array.prototype.slice.call(arguments) );
};
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});// eslint-disable-line

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(b){function j(){c.setAttribute("content",k);d=!0}function l(a){e=a.accelerationIncludingGravity;f=Math.abs(e.x);g=Math.abs(e.y);h=Math.abs(e.z);(!b.orientation||180===b.orientation)&&(7<f||(6<h&&8>g||8>h&&6<g)&&5<f)?d&&(c.setAttribute("content",m),d=!1):d||j()}var a=navigator.userAgent;if(/iPhone|iPad|iPod/.test(navigator.platform)&&(/OS [1-5]_[0-9_]* like Mac OS X/i.test(a)&&-1<a.indexOf("AppleWebKit"))&&(a=b.document,a.querySelector)){var c=a.querySelector("meta[name=viewport]"),a=c&&// eslint-disable-line
c.getAttribute("content"),m=a+",maximum-scale=1",k=a+",maximum-scale=3",d=!0,f,g,h,e;c&&(b.addEventListener("orientationchange",j,!1),b.addEventListener("devicemotion",l,!1))}})(this);

/*!
 * jQuery imagesLoaded plugin v2.1.0
 * http://github.com/desandro/imagesloaded
 *
 * MIT License. by Paul Irish et al.
 */
(function(c,n){var l="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";c.fn.imagesLoaded=function(f){function m(){var b=c(i),a=c(h);d&&(h.length?d.reject(e,b,a):d.resolve(e));c.isFunction(f)&&f.call(g,e,b,a)}function j(b,a){b.src===l||-1!==c.inArray(b,k)||(k.push(b),a?h.push(b):i.push(b),c.data(b,"imagesLoaded",{isBroken:a,src:b.src}),o&&d.notifyWith(c(b),[a,e,c(i),c(h)]),e.length===k.length&&(setTimeout(m),e.unbind(".imagesLoaded")))}var g=this,d=c.isFunction(c.Deferred)?c.Deferred():
0,o=c.isFunction(d.notify),e=g.find("img").add(g.filter("img")),k=[],i=[],h=[];c.isPlainObject(f)&&c.each(f,function(b,a){if("callback"===b)f=a;else if(d)d[b](a)});e.length?e.bind("load.imagesLoaded error.imagesLoaded",function(b){j(b.target,"error"===b.type)}).each(function(b,a){var d=a.src,e=c.data(a,"imagesLoaded");if(e&&e.src===d)j(a,e.isBroken);else if(a.complete&&a.naturalWidth!==n)j(a,0===a.naturalWidth||0===a.naturalHeight);else if(a.readyState||a.complete)a.src=l,a.src=d}):m();return d?d.promise(g):
g}})(jQuery);

/*!
* jQuery Cycle2; version: 2.1.6 build: 20141007
* http://jquery.malsup.com/cycle2/
* Copyright (c) 2014 M. Alsup; Dual licensed: MIT/GPL
*/
!function(a){"use strict";function b(a){return(a||"").toLowerCase()}var c="2.1.6";a.fn.cycle=function(c){var d;return 0!==this.length||a.isReady?this.each(function(){var d,e,f,g,h=a(this),i=a.fn.cycle.log;if(!h.data("cycle.opts")){(h.data("cycle-log")===!1||c&&c.log===!1||e&&e.log===!1)&&(i=a.noop),i("--c2 init--"),d=h.data();for(var j in d)d.hasOwnProperty(j)&&/^cycle[A-Z]+/.test(j)&&(g=d[j],f=j.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,b),i(f+":",g,"("+typeof g+")"),d[f]=g);e=a.extend({},a.fn.cycle.defaults,d,c||{}),e.timeoutId=0,e.paused=e.paused||!1,e.container=h,e._maxZ=e.maxZ,e.API=a.extend({_container:h},a.fn.cycle.API),e.API.log=i,e.API.trigger=function(a,b){return e.container.trigger(a,b),e.API},h.data("cycle.opts",e),h.data("cycle.API",e.API),e.API.trigger("cycle-bootstrap",[e,e.API]),e.API.addInitialSlides(),e.API.preInitSlideshow(),e.slides.length&&e.API.initSlideshow()}}):(d={s:this.selector,c:this.context},a.fn.cycle.log("requeuing slideshow (dom not ready)"),a(function(){a(d.s,d.c).cycle(c)}),this)},a.fn.cycle.API={opts:function(){return this._container.data("cycle.opts")},addInitialSlides:function(){var b=this.opts(),c=b.slides;b.slideCount=0,b.slides=a(),c=c.jquery?c:b.container.find(c),b.random&&c.sort(function(){return Math.random()-.5}),b.API.add(c)},preInitSlideshow:function(){var b=this.opts();b.API.trigger("cycle-pre-initialize",[b]);var c=a.fn.cycle.transitions[b.fx];c&&a.isFunction(c.preInit)&&c.preInit(b),b._preInitialized=!0},postInitSlideshow:function(){var b=this.opts();b.API.trigger("cycle-post-initialize",[b]);var c=a.fn.cycle.transitions[b.fx];c&&a.isFunction(c.postInit)&&c.postInit(b)},initSlideshow:function(){var b,c=this.opts(),d=c.container;c.API.calcFirstSlide(),"static"==c.container.css("position")&&c.container.css("position","relative"),a(c.slides[c.currSlide]).css({opacity:1,display:"block",visibility:"visible"}),c.API.stackSlides(c.slides[c.currSlide],c.slides[c.nextSlide],!c.reverse),c.pauseOnHover&&(c.pauseOnHover!==!0&&(d=a(c.pauseOnHover)),d.hover(function(){c.API.pause(!0)},function(){c.API.resume(!0)})),c.timeout&&(b=c.API.getSlideOpts(c.currSlide),c.API.queueTransition(b,b.timeout+c.delay)),c._initialized=!0,c.API.updateView(!0),c.API.trigger("cycle-initialized",[c]),c.API.postInitSlideshow()},pause:function(b){var c=this.opts(),d=c.API.getSlideOpts(),e=c.hoverPaused||c.paused;b?c.hoverPaused=!0:c.paused=!0,e||(c.container.addClass("cycle-paused"),c.API.trigger("cycle-paused",[c]).log("cycle-paused"),d.timeout&&(clearTimeout(c.timeoutId),c.timeoutId=0,c._remainingTimeout-=a.now()-c._lastQueue,(c._remainingTimeout<0||isNaN(c._remainingTimeout))&&(c._remainingTimeout=void 0)))},resume:function(a){var b=this.opts(),c=!b.hoverPaused&&!b.paused;a?b.hoverPaused=!1:b.paused=!1,c||(b.container.removeClass("cycle-paused"),0===b.slides.filter(":animated").length&&b.API.queueTransition(b.API.getSlideOpts(),b._remainingTimeout),b.API.trigger("cycle-resumed",[b,b._remainingTimeout]).log("cycle-resumed"))},add:function(b,c){var d,e=this.opts(),f=e.slideCount,g=!1;"string"==a.type(b)&&(b=a.trim(b)),a(b).each(function(){var b,d=a(this);c?e.container.prepend(d):e.container.append(d),e.slideCount++,b=e.API.buildSlideOpts(d),e.slides=c?a(d).add(e.slides):e.slides.add(d),e.API.initSlide(b,d,--e._maxZ),d.data("cycle.opts",b),e.API.trigger("cycle-slide-added",[e,b,d])}),e.API.updateView(!0),g=e._preInitialized&&2>f&&e.slideCount>=1,g&&(e._initialized?e.timeout&&(d=e.slides.length,e.nextSlide=e.reverse?d-1:1,e.timeoutId||e.API.queueTransition(e)):e.API.initSlideshow())},calcFirstSlide:function(){var a,b=this.opts();a=parseInt(b.startingSlide||0,10),(a>=b.slides.length||0>a)&&(a=0),b.currSlide=a,b.reverse?(b.nextSlide=a-1,b.nextSlide<0&&(b.nextSlide=b.slides.length-1)):(b.nextSlide=a+1,b.nextSlide==b.slides.length&&(b.nextSlide=0))},calcNextSlide:function(){var a,b=this.opts();b.reverse?(a=b.nextSlide-1<0,b.nextSlide=a?b.slideCount-1:b.nextSlide-1,b.currSlide=a?0:b.nextSlide+1):(a=b.nextSlide+1==b.slides.length,b.nextSlide=a?0:b.nextSlide+1,b.currSlide=a?b.slides.length-1:b.nextSlide-1)},calcTx:function(b,c){var d,e=b;return e._tempFx?d=a.fn.cycle.transitions[e._tempFx]:c&&e.manualFx&&(d=a.fn.cycle.transitions[e.manualFx]),d||(d=a.fn.cycle.transitions[e.fx]),e._tempFx=null,this.opts()._tempFx=null,d||(d=a.fn.cycle.transitions.fade,e.API.log('Transition "'+e.fx+'" not found.  Using fade.')),d},prepareTx:function(a,b){var c,d,e,f,g,h=this.opts();return h.slideCount<2?void(h.timeoutId=0):(!a||h.busy&&!h.manualTrump||(h.API.stopTransition(),h.busy=!1,clearTimeout(h.timeoutId),h.timeoutId=0),void(h.busy||(0!==h.timeoutId||a)&&(d=h.slides[h.currSlide],e=h.slides[h.nextSlide],f=h.API.getSlideOpts(h.nextSlide),g=h.API.calcTx(f,a),h._tx=g,a&&void 0!==f.manualSpeed&&(f.speed=f.manualSpeed),h.nextSlide!=h.currSlide&&(a||!h.paused&&!h.hoverPaused&&h.timeout)?(h.API.trigger("cycle-before",[f,d,e,b]),g.before&&g.before(f,d,e,b),c=function(){h.busy=!1,h.container.data("cycle.opts")&&(g.after&&g.after(f,d,e,b),h.API.trigger("cycle-after",[f,d,e,b]),h.API.queueTransition(f),h.API.updateView(!0))},h.busy=!0,g.transition?g.transition(f,d,e,b,c):h.API.doTransition(f,d,e,b,c),h.API.calcNextSlide(),h.API.updateView()):h.API.queueTransition(f))))},doTransition:function(b,c,d,e,f){var g=b,h=a(c),i=a(d),j=function(){i.animate(g.animIn||{opacity:1},g.speed,g.easeIn||g.easing,f)};i.css(g.cssBefore||{}),h.animate(g.animOut||{},g.speed,g.easeOut||g.easing,function(){h.css(g.cssAfter||{}),g.sync||j()}),g.sync&&j()},queueTransition:function(b,c){var d=this.opts(),e=void 0!==c?c:b.timeout;return 0===d.nextSlide&&0===--d.loop?(d.API.log("terminating; loop=0"),d.timeout=0,e?setTimeout(function(){d.API.trigger("cycle-finished",[d])},e):d.API.trigger("cycle-finished",[d]),void(d.nextSlide=d.currSlide)):void 0!==d.continueAuto&&(d.continueAuto===!1||a.isFunction(d.continueAuto)&&d.continueAuto()===!1)?(d.API.log("terminating automatic transitions"),d.timeout=0,void(d.timeoutId&&clearTimeout(d.timeoutId))):void(e&&(d._lastQueue=a.now(),void 0===c&&(d._remainingTimeout=b.timeout),d.paused||d.hoverPaused||(d.timeoutId=setTimeout(function(){d.API.prepareTx(!1,!d.reverse)},e))))},stopTransition:function(){var a=this.opts();a.slides.filter(":animated").length&&(a.slides.stop(!1,!0),a.API.trigger("cycle-transition-stopped",[a])),a._tx&&a._tx.stopTransition&&a._tx.stopTransition(a)},advanceSlide:function(a){var b=this.opts();return clearTimeout(b.timeoutId),b.timeoutId=0,b.nextSlide=b.currSlide+a,b.nextSlide<0?b.nextSlide=b.slides.length-1:b.nextSlide>=b.slides.length&&(b.nextSlide=0),b.API.prepareTx(!0,a>=0),!1},buildSlideOpts:function(c){var d,e,f=this.opts(),g=c.data()||{};for(var h in g)g.hasOwnProperty(h)&&/^cycle[A-Z]+/.test(h)&&(d=g[h],e=h.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,b),f.API.log("["+(f.slideCount-1)+"]",e+":",d,"("+typeof d+")"),g[e]=d);g=a.extend({},a.fn.cycle.defaults,f,g),g.slideNum=f.slideCount;try{delete g.API,delete g.slideCount,delete g.currSlide,delete g.nextSlide,delete g.slides}catch(i){}return g},getSlideOpts:function(b){var c=this.opts();void 0===b&&(b=c.currSlide);var d=c.slides[b],e=a(d).data("cycle.opts");return a.extend({},c,e)},initSlide:function(b,c,d){var e=this.opts();c.css(b.slideCss||{}),d>0&&c.css("zIndex",d),isNaN(b.speed)&&(b.speed=a.fx.speeds[b.speed]||a.fx.speeds._default),b.sync||(b.speed=b.speed/2),c.addClass(e.slideClass)},updateView:function(a,b){var c=this.opts();if(c._initialized){var d=c.API.getSlideOpts(),e=c.slides[c.currSlide];!a&&b!==!0&&(c.API.trigger("cycle-update-view-before",[c,d,e]),c.updateView<0)||(c.slideActiveClass&&c.slides.removeClass(c.slideActiveClass).eq(c.currSlide).addClass(c.slideActiveClass),a&&c.hideNonActive&&c.slides.filter(":not(."+c.slideActiveClass+")").css("visibility","hidden"),0===c.updateView&&setTimeout(function(){c.API.trigger("cycle-update-view",[c,d,e,a])},d.speed/(c.sync?2:1)),0!==c.updateView&&c.API.trigger("cycle-update-view",[c,d,e,a]),a&&c.API.trigger("cycle-update-view-after",[c,d,e]))}},getComponent:function(b){var c=this.opts(),d=c[b];return"string"==typeof d?/^\s*[\>|\+|~]/.test(d)?c.container.find(d):a(d):d.jquery?d:a(d)},stackSlides:function(b,c,d){var e=this.opts();b||(b=e.slides[e.currSlide],c=e.slides[e.nextSlide],d=!e.reverse),a(b).css("zIndex",e.maxZ);var f,g=e.maxZ-2,h=e.slideCount;if(d){for(f=e.currSlide+1;h>f;f++)a(e.slides[f]).css("zIndex",g--);for(f=0;f<e.currSlide;f++)a(e.slides[f]).css("zIndex",g--)}else{for(f=e.currSlide-1;f>=0;f--)a(e.slides[f]).css("zIndex",g--);for(f=h-1;f>e.currSlide;f--)a(e.slides[f]).css("zIndex",g--)}a(c).css("zIndex",e.maxZ-1)},getSlideIndex:function(a){return this.opts().slides.index(a)}},a.fn.cycle.log=function(){window.console&&console.log&&console.log("[cycle2] "+Array.prototype.join.call(arguments," "))},a.fn.cycle.version=function(){return"Cycle2: "+c},a.fn.cycle.transitions={custom:{},none:{before:function(a,b,c,d){a.API.stackSlides(c,b,d),a.cssBefore={opacity:1,visibility:"visible",display:"block"}}},fade:{before:function(b,c,d,e){var f=b.API.getSlideOpts(b.nextSlide).slideCss||{};b.API.stackSlides(c,d,e),b.cssBefore=a.extend(f,{opacity:0,visibility:"visible",display:"block"}),b.animIn={opacity:1},b.animOut={opacity:0}}},fadeout:{before:function(b,c,d,e){var f=b.API.getSlideOpts(b.nextSlide).slideCss||{};b.API.stackSlides(c,d,e),b.cssBefore=a.extend(f,{opacity:1,visibility:"visible",display:"block"}),b.animOut={opacity:0}}},// eslint-disable-line
scrollHorz:{before:function(a,b,c,d){a.API.stackSlides(b,c,d);var e=a.container.css("overflow","hidden").width();a.cssBefore={left:d?e:-e,top:0,opacity:1,visibility:"visible",display:"block"},a.cssAfter={zIndex:a._maxZ-2,left:0},a.animIn={left:0},a.animOut={left:d?-e:e}}}},a.fn.cycle.defaults={allowWrap:!0,autoSelector:".cycle-slideshow[data-cycle-auto-init!=false]",delay:0,easing:null,fx:"fade",hideNonActive:!0,loop:0,manualFx:void 0,manualSpeed:void 0,manualTrump:!0,maxZ:100,pauseOnHover:!1,reverse:!1,slideActiveClass:"cycle-slide-active",slideClass:"cycle-slide",slideCss:{position:"absolute",top:0,left:0},slides:"> img",speed:500,startingSlide:0,sync:!0,timeout:4e3,updateView:0},a(document).ready(function(){a(a.fn.cycle.defaults.autoSelector).cycle()})}(jQuery),/*! Cycle2 autoheight plugin; Copyright (c) M.Alsup, 2012; version: 20130913 */
function(a){"use strict";function b(b,d){var e,f,g,h=d.autoHeight;if("container"==h)f=a(d.slides[d.currSlide]).outerHeight(),d.container.height(f);else if(d._autoHeightRatio)d.container.height(d.container.width()/d._autoHeightRatio);else if("calc"===h||"number"==a.type(h)&&h>=0){if(g="calc"===h?c(b,d):h>=d.slides.length?0:h,g==d._sentinelIndex)return;d._sentinelIndex=g,d._sentinel&&d._sentinel.remove(),e=a(d.slides[g].cloneNode(!0)),e.removeAttr("id name rel").find("[id],[name],[rel]").removeAttr("id name rel"),e.css({position:"static",visibility:"hidden",display:"block"}).prependTo(d.container).addClass("cycle-sentinel cycle-slide").removeClass("cycle-slide-active"),e.find("*").css("visibility","hidden"),d._sentinel=e}}function c(b,c){var d=0,e=-1;return c.slides.each(function(b){var c=a(this).height();c>e&&(e=c,d=b)}),d}function d(b,c,d,e){var f=a(e).outerHeight();c.container.animate({height:f},c.autoHeightSpeed,c.autoHeightEasing)}function e(c,f){f._autoHeightOnResize&&(a(window).off("resize orientationchange",f._autoHeightOnResize),f._autoHeightOnResize=null),f.container.off("cycle-slide-added cycle-slide-removed",b),f.container.off("cycle-destroyed",e),f.container.off("cycle-before",d),f._sentinel&&(f._sentinel.remove(),f._sentinel=null)}a.extend(a.fn.cycle.defaults,{autoHeight:0,autoHeightSpeed:250,autoHeightEasing:null}),a(document).on("cycle-initialized",function(c,f){function g(){b(c,f)}var h,i=f.autoHeight,j=a.type(i),k=null;("string"===j||"number"===j)&&(f.container.on("cycle-slide-added cycle-slide-removed",b),f.container.on("cycle-destroyed",e),"container"==i?f.container.on("cycle-before",d):"string"===j&&/\d+\:\d+/.test(i)&&(h=i.match(/(\d+)\:(\d+)/),h=h[1]/h[2],f._autoHeightRatio=h),"number"!==j&&(f._autoHeightOnResize=function(){clearTimeout(k),k=setTimeout(g,50)},a(window).on("resize orientationchange",f._autoHeightOnResize)),setTimeout(g,30))})}(jQuery),/*! caption plugin for Cycle2;  version: 20130306 */// eslint-disable-line
function(a){"use strict";a.extend(a.fn.cycle.defaults,{caption:"> .cycle-caption",captionTemplate:"{{slideNum}} / {{slideCount}}",overlay:"> .cycle-overlay",overlayTemplate:"<div>{{title}}</div><div>{{desc}}</div>",captionModule:"caption"}),a(document).on("cycle-update-view",function(b,c,d,e){if("caption"===c.captionModule){a.each(["caption","overlay"],function(){var a=this,b=d[a+"Template"],f=c.API.getComponent(a);f.length&&b?(f.html(c.API.tmpl(b,d,c,e)),f.show()):f.hide()})}}),a(document).on("cycle-destroyed",function(b,c){var d;a.each(["caption","overlay"],function(){var a=this,b=c[a+"Template"];c[a]&&b&&(d=c.API.getComponent("caption"),d.empty())})})}(jQuery),/*! command plugin for Cycle2;  version: 20140415 */
function(a){"use strict";var b=a.fn.cycle;a.fn.cycle=function(c){var d,e,f,g=a.makeArray(arguments);return"number"==a.type(c)?this.cycle("goto",c):"string"==a.type(c)?this.each(function(){var h;return d=c,f=a(this).data("cycle.opts"),void 0===f?void b.log('slideshow must be initialized before sending commands; "'+d+'" ignored'):(d="goto"==d?"jump":d,e=f.API[d],a.isFunction(e)?(h=a.makeArray(g),h.shift(),e.apply(f.API,h)):void b.log("unknown command: ",d))}):b.apply(this,arguments)},a.extend(a.fn.cycle,b),a.extend(b.API,{next:function(){var a=this.opts();if(!a.busy||a.manualTrump){var b=a.reverse?-1:1;a.allowWrap===!1&&a.currSlide+b>=a.slideCount||(a.API.advanceSlide(b),a.API.trigger("cycle-next",[a]).log("cycle-next"))}},prev:function(){var a=this.opts();if(!a.busy||a.manualTrump){var b=a.reverse?1:-1;a.allowWrap===!1&&a.currSlide+b<0||(a.API.advanceSlide(b),a.API.trigger("cycle-prev",[a]).log("cycle-prev"))}},destroy:function(){this.stop();var b=this.opts(),c=a.isFunction(a._data)?a._data:a.noop;clearTimeout(b.timeoutId),b.timeoutId=0,b.API.stop(),b.API.trigger("cycle-destroyed",[b]).log("cycle-destroyed"),b.container.removeData(),c(b.container[0],"parsedAttrs",!1),b.retainStylesOnDestroy||(b.container.removeAttr("style"),b.slides.removeAttr("style"),b.slides.removeClass(b.slideActiveClass)),b.slides.each(function(){var d=a(this);d.removeData(),d.removeClass(b.slideClass),c(this,"parsedAttrs",!1)})},jump:function(a,b){var c,d=this.opts();if(!d.busy||d.manualTrump){var e=parseInt(a,10);if(isNaN(e)||0>e||e>=d.slides.length)return void d.API.log("goto: invalid slide index: "+e);if(e==d.currSlide)return void d.API.log("goto: skipping, already on slide",e);d.nextSlide=e,clearTimeout(d.timeoutId),d.timeoutId=0,d.API.log("goto: ",e," (zero-index)"),c=d.currSlide<d.nextSlide,d._tempFx=b,d.API.prepareTx(!0,c)}},stop:function(){var b=this.opts(),c=b.container;clearTimeout(b.timeoutId),b.timeoutId=0,b.API.stopTransition(),b.pauseOnHover&&(b.pauseOnHover!==!0&&(c=a(b.pauseOnHover)),c.off("mouseenter mouseleave")),b.API.trigger("cycle-stopped",[b]).log("cycle-stopped")},reinit:function(){var a=this.opts();a.API.destroy(),a.container.cycle()},remove:function(b){for(var c,d,e=this.opts(),f=[],g=1,h=0;h<e.slides.length;h++)c=e.slides[h],h==b?d=c:(f.push(c),a(c).data("cycle.opts").slideNum=g,g++);d&&(e.slides=a(f),e.slideCount--,a(d).remove(),b==e.currSlide?e.API.advanceSlide(1):b<e.currSlide?e.currSlide--:e.currSlide++,e.API.trigger("cycle-slide-removed",[e,b,d]).log("cycle-slide-removed"),e.API.updateView())}}),a(document).on("click.cycle","[data-cycle-cmd]",function(b){b.preventDefault();var c=a(this),d=c.data("cycle-cmd"),e=c.data("cycle-context")||".cycle-slideshow";a(e).cycle(d,c.data("cycle-arg"))})}(jQuery),
function(a){"use strict";function b(b,c,d){var e,f=b.API.getComponent("pager");f.each(function(){var f=a(this);if(c.pagerTemplate){var g=b.API.tmpl(c.pagerTemplate,c,b,d[0]);e=a(g).appendTo(f)}else e=f.children().eq(b.slideCount-1);e.on(b.pagerEvent,function(a){b.pagerEventBubble||a.preventDefault(),b.API.page(f,a.currentTarget)})})}function c(a,b){var c=this.opts();if(!c.busy||c.manualTrump){var d=a.children().index(b),e=d,f=c.currSlide<e;c.currSlide!=e&&(c.nextSlide=e,c._tempFx=c.pagerFx,c.API.prepareTx(!0,f),c.API.trigger("cycle-pager-activated",[c,a,b]))}}a.extend(a.fn.cycle.defaults,{pager:"> .cycle-pager",pagerActiveClass:"cycle-pager-active",pagerEvent:"click.cycle",pagerEventBubble:void 0,pagerTemplate:"<span>&bull;</span>"}),a(document).on("cycle-bootstrap",function(a,c,d){d.buildPagerLink=b}),a(document).on("cycle-slide-added",function(a,b,d,e){b.pager&&(b.API.buildPagerLink(b,d,e),b.API.page=c)}),a(document).on("cycle-slide-removed",function(b,c,d){if(c.pager){var e=c.API.getComponent("pager");e.each(function(){var b=a(this);a(b.children()[d]).remove()})}}),a(document).on("cycle-update-view",function(b,c){var d;c.pager&&(d=c.API.getComponent("pager"),d.each(function(){a(this).children().removeClass(c.pagerActiveClass).eq(c.currSlide).addClass(c.pagerActiveClass)}))}),a(document).on("cycle-destroyed",function(a,b){var c=b.API.getComponent("pager");c&&(c.children().off(b.pagerEvent),b.pagerTemplate&&c.empty())})}(jQuery),/*! prevnext plugin for Cycle2;  version: 20140408 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{next:"> .cycle-next",nextEvent:"click.cycle",disabledClass:"disabled",prev:"> .cycle-prev",prevEvent:"click.cycle",swipe:!1}),a(document).on("cycle-initialized",function(a,b){if(b.API.getComponent("next").on(b.nextEvent,function(a){a.preventDefault(),b.API.next()}),b.API.getComponent("prev").on(b.prevEvent,function(a){a.preventDefault(),b.API.prev()}),b.swipe){var c=b.swipeVert?"swipeUp.cycle":"swipeLeft.cycle swipeleft.cycle",d=b.swipeVert?"swipeDown.cycle":"swipeRight.cycle swiperight.cycle";b.container.on(c,function(){b._tempFx=b.swipeFx,b.API.next()}),b.container.on(d,function(){b._tempFx=b.swipeFx,b.API.prev()})}}),a(document).on("cycle-update-view",function(a,b){if(!b.allowWrap){var c=b.disabledClass,d=b.API.getComponent("next"),e=b.API.getComponent("prev"),f=b._prevBoundry||0,g=void 0!==b._nextBoundry?b._nextBoundry:b.slideCount-1;b.currSlide==g?d.addClass(c).prop("disabled",!0):d.removeClass(c).prop("disabled",!1),b.currSlide===f?e.addClass(c).prop("disabled",!0):e.removeClass(c).prop("disabled",!1)}}),a(document).on("cycle-destroyed",function(a,b){b.API.getComponent("prev").off(b.nextEvent),b.API.getComponent("next").off(b.prevEvent),b.container.off("swipeleft.cycle swiperight.cycle swipeLeft.cycle swipeRight.cycle swipeUp.cycle swipeDown.cycle")})}(jQuery),/*! progressive loader plugin for Cycle2;  version: 20130315 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{tmplRegex:"{{((.)?.*?)}}"}),a.extend(a.fn.cycle.API,{tmpl:function(b,c){var d=new RegExp(c.tmplRegex||a.fn.cycle.defaults.tmplRegex,"g"),e=a.makeArray(arguments);return e.shift(),b.replace(d,function(b,c){var d,f,g,h,i=c.split(".");for(d=0;d<e.length;d++)if(g=e[d]){if(i.length>1)for(h=g,f=0;f<i.length;f++)g=h,h=h[i[f]]||c;else h=g[c];if(a.isFunction(h))return h.apply(g,e);if(void 0!==h&&null!==h&&h!=c)return h}return c})}})}(jQuery);// eslint-disable-line

/* Plugin for Cycle2; Copyright (c) 2012 M. Alsup; v20141007 */
!function(a){"use strict";a.event.special.swipe=a.event.special.swipe||{scrollSupressionThreshold:10,durationThreshold:1e3,horizontalDistanceThreshold:30,verticalDistanceThreshold:75,setup:function(){var b=a(this);b.bind("touchstart",function(c){function d(b){if(g){var c=b.originalEvent.touches?b.originalEvent.touches[0]:b;e={time:(new Date).getTime(),coords:[c.pageX,c.pageY]},Math.abs(g.coords[0]-e.coords[0])>a.event.special.swipe.scrollSupressionThreshold&&b.preventDefault()}}var e,f=c.originalEvent.touches?c.originalEvent.touches[0]:c,g={time:(new Date).getTime(),coords:[f.pageX,f.pageY],origin:a(c.target)};b.bind("touchmove",d).one("touchend",function(){b.unbind("touchmove",d),g&&e&&e.time-g.time<a.event.special.swipe.durationThreshold&&Math.abs(g.coords[0]-e.coords[0])>a.event.special.swipe.horizontalDistanceThreshold&&Math.abs(g.coords[1]-e.coords[1])<a.event.special.swipe.verticalDistanceThreshold&&g.origin.trigger("swipe").trigger(g.coords[0]>e.coords[0]?"swipeleft":"swiperight"),g=e=void 0})})}},a.event.special.swipeleft=a.event.special.swipeleft||{setup:function(){a(this).bind("swipe",a.noop)}},a.event.special.swiperight=a.event.special.swiperight||a.event.special.swipeleft}(jQuery);


// http://ricostacruz.com/jquery.transit/jquery.transit.min.js
//(function(t,e){if(typeof define==="function"&&define.amd){define(["jquery"],e)}else if(typeof exports==="object"){module.exports=e(require("jquery"))}else{e(t.jQuery)}})(this,function(t){t.transit={version:"0.9.12",propertyMap:{marginLeft:"margin",marginRight:"margin",marginBottom:"margin",marginTop:"margin",paddingLeft:"padding",paddingRight:"padding",paddingBottom:"padding",paddingTop:"padding"},enabled:true,useTransitionEnd:false};var e=document.createElement("div");var n={};function i(t){if(t in e.style)return t;var n=["Moz","Webkit","O","ms"];var i=t.charAt(0).toUpperCase()+t.substr(1);for(var r=0;r<n.length;++r){var s=n[r]+i;if(s in e.style){return s}}}function r(){e.style[n.transform]="";e.style[n.transform]="rotateY(90deg)";return e.style[n.transform]!==""}var s=navigator.userAgent.toLowerCase().indexOf("chrome")>-1;n.transition=i("transition");n.transitionDelay=i("transitionDelay");n.transform=i("transform");n.transformOrigin=i("transformOrigin");n.filter=i("Filter");n.transform3d=r();var a={transition:"transitionend",MozTransition:"transitionend",OTransition:"oTransitionEnd",WebkitTransition:"webkitTransitionEnd",msTransition:"MSTransitionEnd"};var o=n.transitionEnd=a[n.transition]||null;for(var u in n){if(n.hasOwnProperty(u)&&typeof t.support[u]==="undefined"){t.support[u]=n[u]}}e=null;t.cssEase={_default:"ease","in":"ease-in",out:"ease-out","in-out":"ease-in-out",snap:"cubic-bezier(0,1,.5,1)",easeInCubic:"cubic-bezier(.550,.055,.675,.190)",easeOutCubic:"cubic-bezier(.215,.61,.355,1)",easeInOutCubic:"cubic-bezier(.645,.045,.355,1)",easeInCirc:"cubic-bezier(.6,.04,.98,.335)",easeOutCirc:"cubic-bezier(.075,.82,.165,1)",easeInOutCirc:"cubic-bezier(.785,.135,.15,.86)",easeInExpo:"cubic-bezier(.95,.05,.795,.035)",easeOutExpo:"cubic-bezier(.19,1,.22,1)",easeInOutExpo:"cubic-bezier(1,0,0,1)",easeInQuad:"cubic-bezier(.55,.085,.68,.53)",easeOutQuad:"cubic-bezier(.25,.46,.45,.94)",easeInOutQuad:"cubic-bezier(.455,.03,.515,.955)",easeInQuart:"cubic-bezier(.895,.03,.685,.22)",easeOutQuart:"cubic-bezier(.165,.84,.44,1)",easeInOutQuart:"cubic-bezier(.77,0,.175,1)",easeInQuint:"cubic-bezier(.755,.05,.855,.06)",easeOutQuint:"cubic-bezier(.23,1,.32,1)",easeInOutQuint:"cubic-bezier(.86,0,.07,1)",easeInSine:"cubic-bezier(.47,0,.745,.715)",easeOutSine:"cubic-bezier(.39,.575,.565,1)",easeInOutSine:"cubic-bezier(.445,.05,.55,.95)",easeInBack:"cubic-bezier(.6,-.28,.735,.045)",easeOutBack:"cubic-bezier(.175, .885,.32,1.275)",easeInOutBack:"cubic-bezier(.68,-.55,.265,1.55)"};t.cssHooks["transit:transform"]={get:function(e){return t(e).data("transform")||new f},set:function(e,i){var r=i;if(!(r instanceof f)){r=new f(r)}if(n.transform==="WebkitTransform"&&!s){e.style[n.transform]=r.toString(true)}else{e.style[n.transform]=r.toString()}t(e).data("transform",r)}};t.cssHooks.transform={set:t.cssHooks["transit:transform"].set};t.cssHooks.filter={get:function(t){return t.style[n.filter]},set:function(t,e){t.style[n.filter]=e}};if(t.fn.jquery<"1.8"){t.cssHooks.transformOrigin={get:function(t){return t.style[n.transformOrigin]},set:function(t,e){t.style[n.transformOrigin]=e}};t.cssHooks.transition={get:function(t){return t.style[n.transition]},set:function(t,e){t.style[n.transition]=e}}}p("scale");p("scaleX");p("scaleY");p("translate");p("rotate");p("rotateX");p("rotateY");p("rotate3d");p("perspective");p("skewX");p("skewY");p("x",true);p("y",true);function f(t){if(typeof t==="string"){this.parse(t)}return this}f.prototype={setFromString:function(t,e){var n=typeof e==="string"?e.split(","):e.constructor===Array?e:[e];n.unshift(t);f.prototype.set.apply(this,n)},set:function(t){var e=Array.prototype.slice.apply(arguments,[1]);if(this.setter[t]){this.setter[t].apply(this,e)}else{this[t]=e.join(",")}},get:function(t){if(this.getter[t]){return this.getter[t].apply(this)}else{return this[t]||0}},setter:{rotate:function(t){this.rotate=b(t,"deg")},rotateX:function(t){this.rotateX=b(t,"deg")},rotateY:function(t){this.rotateY=b(t,"deg")},scale:function(t,e){if(e===undefined){e=t}this.scale=t+","+e},skewX:function(t){this.skewX=b(t,"deg")},skewY:function(t){this.skewY=b(t,"deg")},perspective:function(t){this.perspective=b(t,"px")},x:function(t){this.set("translate",t,null)},y:function(t){this.set("translate",null,t)},translate:function(t,e){if(this._translateX===undefined){this._translateX=0}if(this._translateY===undefined){this._translateY=0}if(t!==null&&t!==undefined){this._translateX=b(t,"px")}if(e!==null&&e!==undefined){this._translateY=b(e,"px")}this.translate=this._translateX+","+this._translateY}},getter:{x:function(){return this._translateX||0},y:function(){return this._translateY||0},scale:function(){var t=(this.scale||"1,1").split(",");if(t[0]){t[0]=parseFloat(t[0])}if(t[1]){t[1]=parseFloat(t[1])}return t[0]===t[1]?t[0]:t},rotate3d:function(){var t=(this.rotate3d||"0,0,0,0deg").split(",");for(var e=0;e<=3;++e){if(t[e]){t[e]=parseFloat(t[e])}}if(t[3]){t[3]=b(t[3],"deg")}return t}},parse:function(t){var e=this;t.replace(/([a-zA-Z0-9]+)\((.*?)\)/g,function(t,n,i){e.setFromString(n,i)})},toString:function(t){var e=[];for(var i in this){if(this.hasOwnProperty(i)){if(!n.transform3d&&(i==="rotateX"||i==="rotateY"||i==="perspective"||i==="transformOrigin")){continue}if(i[0]!=="_"){if(t&&i==="scale"){e.push(i+"3d("+this[i]+",1)")}else if(t&&i==="translate"){e.push(i+"3d("+this[i]+",0)")}else{e.push(i+"("+this[i]+")")}}}}return e.join(" ")}};function c(t,e,n){if(e===true){t.queue(n)}else if(e){t.queue(e,n)}else{t.each(function(){n.call(this)})}}function l(e){var i=[];t.each(e,function(e){e=t.camelCase(e);e=t.transit.propertyMap[e]||t.cssProps[e]||e;e=h(e);if(n[e])e=h(n[e]);if(t.inArray(e,i)===-1){i.push(e)}});return i}function d(e,n,i,r){var s=l(e);if(t.cssEase[i]){i=t.cssEase[i]}var a=""+y(n)+" "+i;if(parseInt(r,10)>0){a+=" "+y(r)}var o=[];t.each(s,function(t,e){o.push(e+" "+a)});return o.join(", ")}t.fn.transition=t.fn.transit=function(e,i,r,s){var a=this;var u=0;var f=true;var l=t.extend(true,{},e);if(typeof i==="function"){s=i;i=undefined}if(typeof i==="object"){r=i.easing;u=i.delay||0;f=typeof i.queue==="undefined"?true:i.queue;s=i.complete;i=i.duration}if(typeof r==="function"){s=r;r=undefined}if(typeof l.easing!=="undefined"){r=l.easing;delete l.easing}if(typeof l.duration!=="undefined"){i=l.duration;delete l.duration}if(typeof l.complete!=="undefined"){s=l.complete;delete l.complete}if(typeof l.queue!=="undefined"){f=l.queue;delete l.queue}if(typeof l.delay!=="undefined"){u=l.delay;delete l.delay}if(typeof i==="undefined"){i=t.fx.speeds._default}if(typeof r==="undefined"){r=t.cssEase._default}i=y(i);var p=d(l,i,r,u);var h=t.transit.enabled&&n.transition;var b=h?parseInt(i,10)+parseInt(u,10):0;if(b===0){var g=function(t){a.css(l);if(s){s.apply(a)}if(t){t()}};c(a,f,g);return a}var m={};var v=function(e){var i=false;var r=function(){if(i){a.unbind(o,r)}if(b>0){a.each(function(){this.style[n.transition]=m[this]||null})}if(typeof s==="function"){s.apply(a)}if(typeof e==="function"){e()}};if(b>0&&o&&t.transit.useTransitionEnd){i=true;a.bind(o,r)}else{window.setTimeout(r,b)}a.each(function(){if(b>0){this.style[n.transition]=p}t(this).css(l)})};var z=function(t){this.offsetWidth;v(t)};c(a,f,z);return this};function p(e,i){if(!i){t.cssNumber[e]=true}t.transit.propertyMap[e]=n.transform;t.cssHooks[e]={get:function(n){var i=t(n).css("transit:transform");return i.get(e)},set:function(n,i){var r=t(n).css("transit:transform");r.setFromString(e,i);t(n).css({"transit:transform":r})}}}function h(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}function b(t,e){if(typeof t==="string"&&!t.match(/^[\-0-9\.]+$/)){return t}else{return""+t+e}}function y(e){var n=e;if(typeof n==="string"&&!n.match(/^[\-0-9\.]+/)){n=t.fx.speeds[n]||t.fx.speeds._default}return b(n,"ms")}t.transit.getTransitionValue=d;return t});// eslint-disable-line

/**
 * author Christopher Blum
 * https://github.com/protonet/jquery.inview
 */
!function(t){function e(){var e,i,n={height:a.innerHeight,width:a.innerWidth};return n.height||(e=r.compatMode,(e||!t.support.boxModel)&&(i="CSS1Compat"===e?f:r.body,n={height:i.clientHeight,width:i.clientWidth})),n}function i(){return{top:a.pageYOffset||f.scrollTop||r.body.scrollTop,left:a.pageXOffset||f.scrollLeft||r.body.scrollLeft}}function n(){var n,l=t(),r=0;if(t.each(d,function(t,e){var i=e.data.selector,n=e.$element;l=l.add(i?n.find(i):n)}),n=l.length)for(o=o||e(),h=h||i();n>r;r++)if(t.contains(f,l[r])){var a,c,p,s=t(l[r]),u={height:s.height(),width:s.width()},g=s.offset(),v=s.data("inview");if(!h||!o)return;g.top+u.height>h.top&&g.top<h.top+o.height&&g.left+u.width>h.left&&g.left<h.left+o.width?(a=h.left>g.left?"right":h.left+o.width<g.left+u.width?"left":"both",c=h.top>g.top?"bottom":h.top+o.height<g.top+u.height?"top":"both",p=a+"-"+c,v&&v===p||s.data("inview",p).trigger("inview",[!0,a,c])):v&&s.data("inview",!1).trigger("inview",[!1])}}var o,h,l,d={},r=document,a=window,f=r.documentElement,c=t.expando;t.event.special.inview={add:function(e){d[e.guid+"-"+this[c]]={data:e,$element:t(this)},l||t.isEmptyObject(d)||(l=setInterval(n,250))},remove:function(e){try{delete d[e.guid+"-"+this[c]]}catch(i){}t.isEmptyObject(d)&&(clearInterval(l),l=null)}},t(a).bind("scroll resize scrollstop",function(){o=h=null}),!f.addEventListener&&f.attachEvent&&f.attachEvent("onfocusin",function(){h=null})}(jQuery);// eslint-disable-line

(function($, w ){
   $.fn.picturefill = function(doNotAddImage) {
    var checkWidthConstraint = function(source){
      var min = source.getAttribute( "data-pmin" );
      var max = source.getAttribute( "data-pmax" );
      var parent_selector = source.getAttribute( "data-pparent" ) || ".ri";
      var flag = true;

      if (min || max){
        var p = $(source).parents(parent_selector);
        if (p.length > 0){
          if(min && p.width() < min)
            flag = false;

          if(max && p.width() > max)
            flag = false;
        }
      }
      return flag;
    };

    return this.each(function() {
    //  doImage = true;// eslint-disable-line
      if (typeof doNotAddImage !== "undefined" && doNotAddImage === true)
     //   doImage = false;// eslint-disable-line

      if( this.getAttribute( "data-picture" ) !== null ){
        var sources = this.getElementsByTagName( "span" ),
          matches = [];
        // See if which sources match
        for( var j = 0, jl = sources.length; j < jl; j++ ){
          var media = sources[ j ].getAttribute( "data-media" );
          // if there's no media specified, OR w.matchMedia is supported
          if((!media || ( w.matchMedia && w.matchMedia(media).matches )) && checkWidthConstraint(sources[j]) ){
            matches.push( sources[ j ] );
          }
        }

        // Find any existing img element in the picture element
        var picImg = this.getElementsByTagName( "img" )[ 0 ];

        if( matches.length ){
          var matchedEl = matches.pop();

          if( !picImg || picImg.parentNode.nodeName === "NOSCRIPT" ){
            picImg = w.document.createElement( "img" );
            picImg.alt = this.getAttribute( "data-alt" );
          }

          if(doImage){// eslint-disable-line
            picImg.src =  matchedEl.getAttribute( "data-src" );// eslint-disable-line
            matchedEl.appendChild( picImg );
          }

          if( matchedEl.getAttribute( "data-resizeparent" ) !== null ){
            var parent_selector = matchedEl.getAttribute( "data-pparent" ) || ".ri";
            var p = $(matchedEl).parents(parent_selector);
            if (p.length > 0){
              p = p.first();
              pw = p.data('width') || 100;// eslint-disable-line
              ph = p.data('height') || 100;// eslint-disable-line
              p.css('height', Math.max(100, Math.floor(p.width() * (ph/pw))));// eslint-disable-line
            }
          }

          if( this.getAttribute( "data-center" ) !== null ){
            $(picImg).imagesLoaded(function () {
              var img = $(this);
              var l = Math.max(((img.parent().width()-img.width())/2), 0);
              img.css('left', l);
            });
          }
        }
        else if( picImg ){
          picImg.parentNode.removeChild( picImg );
        }
      }
    });
  };

  var picturefill = function() {
    $('.ri > span').picturefill();
  };

  var picturefillDebounced = function() {
    clearTimeout(this.id);
    this.id = setTimeout(picturefill, 300);
  };

  $(w).on('resize orientationchange', picturefillDebounced);
  $(w).ready(picturefill);

}(jQuery,  this));


// end old plugins.js

// start old stream.js
/*!
 * Masonry PACKAGED v3.1.5
 * Cascading grid layout library
 * http://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */
//!function(a){function b(){}function c(a){function c(b){b.prototype.option||(b.prototype.option=function(b){a.isPlainObject(b)&&(this.options=a.extend(!0,this.options,b))})}function e(b,c){a.fn[b]=function(e){if("string"==typeof e){for(var g=d.call(arguments,1),h=0,i=this.length;i>h;h++){var j=this[h],k=a.data(j,b);if(k)if(a.isFunction(k[e])&&"_"!==e.charAt(0)){var l=k[e].apply(k,g);if(void 0!==l)return l}else f("no such method '"+e+"' for "+b+" instance");else f("cannot call methods on "+b+" prior to initialization; attempted to call '"+e+"'")}return this}return this.each(function(){var d=a.data(this,b);d?(d.option(e),d._init()):(d=new c(this,e),a.data(this,b,d))})}}if(a){var f="undefined"==typeof console?b:function(a){console.error(a)};return a.bridget=function(a,b){c(b),e(a,b)},a.bridget}}var d=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],c):c(a.jQuery)}(window),function(a){function b(b){var c=a.event;return c.target=c.target||c.srcElement||b,c}var c=document.documentElement,d=function(){};c.addEventListener?d=function(a,b,c){a.addEventListener(b,c,!1)}:c.attachEvent&&(d=function(a,c,d){a[c+d]=d.handleEvent?function(){var c=b(a);d.handleEvent.call(d,c)}:function(){var c=b(a);d.call(a,c)},a.attachEvent("on"+c,a[c+d])});var e=function(){};c.removeEventListener?e=function(a,b,c){a.removeEventListener(b,c,!1)}:c.detachEvent&&(e=function(a,b,c){a.detachEvent("on"+b,a[b+c]);try{delete a[b+c]}catch(d){a[b+c]=void 0}});var f={bind:d,unbind:e};"function"==typeof define&&define.amd?define("eventie/eventie",f):"object"==typeof exports?module.exports=f:a.eventie=f}(this),function(a){function b(a){"function"==typeof a&&(b.isReady?a():f.push(a))}function c(a){var c="readystatechange"===a.type&&"complete"!==e.readyState;if(!b.isReady&&!c){b.isReady=!0;for(var d=0,g=f.length;g>d;d++){var h=f[d];h()}}}function d(d){return d.bind(e,"DOMContentLoaded",c),d.bind(e,"readystatechange",c),d.bind(a,"load",c),b}var e=a.document,f=[];b.isReady=!1,"function"==typeof define&&define.amd?(b.isReady="function"==typeof requirejs,define("doc-ready/doc-ready",["eventie/eventie"],d)):a.docReady=d(a.eventie)}(this),function(){function a(){}function b(a,b){for(var c=a.length;c--;)if(a[c].listener===b)return c;return-1}function c(a){return function(){return this[a].apply(this,arguments)}}var d=a.prototype,e=this,f=e.EventEmitter;d.getListeners=function(a){var b,c,d=this._getEvents();if(a instanceof RegExp){b={};for(c in d)d.hasOwnProperty(c)&&a.test(c)&&(b[c]=d[c])}else b=d[a]||(d[a]=[]);return b},d.flattenListeners=function(a){var b,c=[];for(b=0;b<a.length;b+=1)c.push(a[b].listener);return c},d.getListenersAsObject=function(a){var b,c=this.getListeners(a);return c instanceof Array&&(b={},b[a]=c),b||c},d.addListener=function(a,c){var d,e=this.getListenersAsObject(a),f="object"==typeof c;for(d in e)e.hasOwnProperty(d)&&-1===b(e[d],c)&&e[d].push(f?c:{listener:c,once:!1});return this},d.on=c("addListener"),d.addOnceListener=function(a,b){return this.addListener(a,{listener:b,once:!0})},d.once=c("addOnceListener"),d.defineEvent=function(a){return this.getListeners(a),this},d.defineEvents=function(a){for(var b=0;b<a.length;b+=1)this.defineEvent(a[b]);return this},d.removeListener=function(a,c){var d,e,f=this.getListenersAsObject(a);for(e in f)f.hasOwnProperty(e)&&(d=b(f[e],c),-1!==d&&f[e].splice(d,1));return this},d.off=c("removeListener"),d.addListeners=function(a,b){return this.manipulateListeners(!1,a,b)},d.removeListeners=function(a,b){return this.manipulateListeners(!0,a,b)},d.manipulateListeners=function(a,b,c){var d,e,f=a?this.removeListener:this.addListener,g=a?this.removeListeners:this.addListeners;if("object"!=typeof b||b instanceof RegExp)for(d=c.length;d--;)f.call(this,b,c[d]);else for(d in b)b.hasOwnProperty(d)&&(e=b[d])&&("function"==typeof e?f.call(this,d,e):g.call(this,d,e));return this},d.removeEvent=function(a){var b,c=typeof a,d=this._getEvents();if("string"===c)delete d[a];else if(a instanceof RegExp)for(b in d)d.hasOwnProperty(b)&&a.test(b)&&delete d[b];else delete this._events;return this},d.removeAllListeners=c("removeEvent"),d.emitEvent=function(a,b){var c,d,e,f,g=this.getListenersAsObject(a);for(e in g)if(g.hasOwnProperty(e))for(d=g[e].length;d--;)c=g[e][d],c.once===!0&&this.removeListener(a,c.listener),f=c.listener.apply(this,b||[]),f===this._getOnceReturnValue()&&this.removeListener(a,c.listener);return this},d.trigger=c("emitEvent"),d.emit=function(a){var b=Array.prototype.slice.call(arguments,1);return this.emitEvent(a,b)},d.setOnceReturnValue=function(a){return this._onceReturnValue=a,this},d._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},d._getEvents=function(){return this._events||(this._events={})},a.noConflict=function(){return e.EventEmitter=f,a},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return a}):"object"==typeof module&&module.exports?module.exports=a:this.EventEmitter=a}.call(this),function(a){function b(a){if(a){if("string"==typeof d[a])return a;a=a.charAt(0).toUpperCase()+a.slice(1);for(var b,e=0,f=c.length;f>e;e++)if(b=c[e]+a,"string"==typeof d[b])return b}}var c="Webkit Moz ms Ms O".split(" "),d=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return b}):"object"==typeof exports?module.exports=b:a.getStyleProperty=b}(window),function(a){function b(a){var b=parseFloat(a),c=-1===a.indexOf("%")&&!isNaN(b);return c&&b}function c(){for(var a={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},b=0,c=g.length;c>b;b++){var d=g[b];a[d]=0}return a}function d(a){function d(a){if("string"==typeof a&&(a=document.querySelector(a)),a&&"object"==typeof a&&a.nodeType){var d=f(a);if("none"===d.display)return c();var e={};e.width=a.offsetWidth,e.height=a.offsetHeight;for(var k=e.isBorderBox=!(!j||!d[j]||"border-box"!==d[j]),l=0,m=g.length;m>l;l++){var n=g[l],o=d[n];o=h(a,o);var p=parseFloat(o);e[n]=isNaN(p)?0:p}var q=e.paddingLeft+e.paddingRight,r=e.paddingTop+e.paddingBottom,s=e.marginLeft+e.marginRight,t=e.marginTop+e.marginBottom,u=e.borderLeftWidth+e.borderRightWidth,v=e.borderTopWidth+e.borderBottomWidth,w=k&&i,x=b(d.width);x!==!1&&(e.width=x+(w?0:q+u));var y=b(d.height);return y!==!1&&(e.height=y+(w?0:r+v)),e.innerWidth=e.width-(q+u),e.innerHeight=e.height-(r+v),e.outerWidth=e.width+s,e.outerHeight=e.height+t,e}}function h(a,b){if(e||-1===b.indexOf("%"))return b;var c=a.style,d=c.left,f=a.runtimeStyle,g=f&&f.left;return g&&(f.left=a.currentStyle.left),c.left=b,b=c.pixelLeft,c.left=d,g&&(f.left=g),b}var i,j=a("boxSizing");return function(){if(j){var a=document.createElement("div");a.style.width="200px",a.style.padding="1px 2px 3px 4px",a.style.borderStyle="solid",a.style.borderWidth="1px 2px 3px 4px",a.style[j]="border-box";var c=document.body||document.documentElement;c.appendChild(a);var d=f(a);i=200===b(d.width),c.removeChild(a)}}(),d}var e=a.getComputedStyle,f=e?function(a){return e(a,null)}:function(a){return a.currentStyle},g=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],d):"object"==typeof exports?module.exports=d(require("get-style-property")):a.getSize=d(a.getStyleProperty)}(window),function(a,b){function c(a,b){return a[h](b)}function d(a){if(!a.parentNode){var b=document.createDocumentFragment();b.appendChild(a)}}function e(a,b){d(a);for(var c=a.parentNode.querySelectorAll(b),e=0,f=c.length;f>e;e++)if(c[e]===a)return!0;return!1}function f(a,b){return d(a),c(a,b)}var g,h=function(){if(b.matchesSelector)return"matchesSelector";for(var a=["webkit","moz","ms","o"],c=0,d=a.length;d>c;c++){var e=a[c],f=e+"MatchesSelector";if(b[f])return f}}();if(h){var i=document.createElement("div"),j=c(i,"div");g=j?c:f}else g=e;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return g}):window.matchesSelector=g}(this,Element.prototype),function(a){function b(a,b){for(var c in b)a[c]=b[c];return a}function c(a){for(var b in a)return!1;return b=null,!0}function d(a){return a.replace(/([A-Z])/g,function(a){return"-"+a.toLowerCase()})}function e(a,e,f){function h(a,b){a&&(this.element=a,this.layout=b,this.position={x:0,y:0},this._create())}var i=f("transition"),j=f("transform"),k=i&&j,l=!!f("perspective"),m={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"}[i],n=["transform","transition","transitionDuration","transitionProperty"],o=function(){for(var a={},b=0,c=n.length;c>b;b++){var d=n[b],e=f(d);e&&e!==d&&(a[d]=e)}return a}();b(h.prototype,a.prototype),h.prototype._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},h.prototype.handleEvent=function(a){var b="on"+a.type;this[b]&&this[b](a)},h.prototype.getSize=function(){this.size=e(this.element)},h.prototype.css=function(a){var b=this.element.style;for(var c in a){var d=o[c]||c;b[d]=a[c]}},h.prototype.getPosition=function(){var a=g(this.element),b=this.layout.options,c=b.isOriginLeft,d=b.isOriginTop,e=parseInt(a[c?"left":"right"],10),f=parseInt(a[d?"top":"bottom"],10);e=isNaN(e)?0:e,f=isNaN(f)?0:f;var h=this.layout.size;e-=c?h.paddingLeft:h.paddingRight,f-=d?h.paddingTop:h.paddingBottom,this.position.x=e,this.position.y=f},h.prototype.layoutPosition=function(){var a=this.layout.size,b=this.layout.options,c={};b.isOriginLeft?(c.left=this.position.x+a.paddingLeft+"px",c.right=""):(c.right=this.position.x+a.paddingRight+"px",c.left=""),b.isOriginTop?(c.top=this.position.y+a.paddingTop+"px",c.bottom=""):(c.bottom=this.position.y+a.paddingBottom+"px",c.top=""),this.css(c),
//this.emitEvent("layout",[this])};var p=l?function(a,b){return"translate3d("+a+"px, "+b+"px, 0)"}:function(a,b){return"translate("+a+"px, "+b+"px)"};h.prototype._transitionTo=function(a,b){this.getPosition();var c=this.position.x,d=this.position.y,e=parseInt(a,10),f=parseInt(b,10),g=e===this.position.x&&f===this.position.y;if(this.setPosition(a,b),g&&!this.isTransitioning)return void this.layoutPosition();var h=a-c,i=b-d,j={},k=this.layout.options;h=k.isOriginLeft?h:-h,i=k.isOriginTop?i:-i,j.transform=p(h,i),this.transition({to:j,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},h.prototype.goTo=function(a,b){this.setPosition(a,b),this.layoutPosition()},h.prototype.moveTo=k?h.prototype._transitionTo:h.prototype.goTo,h.prototype.setPosition=function(a,b){this.position.x=parseInt(a,10),this.position.y=parseInt(b,10)},h.prototype._nonTransition=function(a){this.css(a.to),a.isCleaning&&this._removeStyles(a.to);for(var b in a.onTransitionEnd)a.onTransitionEnd[b].call(this)},h.prototype._transition=function(a){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(a);var b=this._transn;for(var c in a.onTransitionEnd)b.onEnd[c]=a.onTransitionEnd[c];for(c in a.to)b.ingProperties[c]=!0,a.isCleaning&&(b.clean[c]=!0);if(a.from){this.css(a.from);var d=this.element.offsetHeight;d=null}this.enableTransition(a.to),this.css(a.to),this.isTransitioning=!0};var q=j&&d(j)+",opacity";h.prototype.enableTransition=function(){this.isTransitioning||(this.css({transitionProperty:q,transitionDuration:this.layout.options.transitionDuration}),this.element.addEventListener(m,this,!1))},h.prototype.transition=h.prototype[i?"_transition":"_nonTransition"],h.prototype.onwebkitTransitionEnd=function(a){this.ontransitionend(a)},h.prototype.onotransitionend=function(a){this.ontransitionend(a)};var r={"-webkit-transform":"transform","-moz-transform":"transform","-o-transform":"transform"};h.prototype.ontransitionend=function(a){if(a.target===this.element){var b=this._transn,d=r[a.propertyName]||a.propertyName;if(delete b.ingProperties[d],c(b.ingProperties)&&this.disableTransition(),d in b.clean&&(this.element.style[a.propertyName]="",delete b.clean[d]),d in b.onEnd){var e=b.onEnd[d];e.call(this),delete b.onEnd[d]}this.emitEvent("transitionEnd",[this])}},h.prototype.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(m,this,!1),this.isTransitioning=!1},h.prototype._removeStyles=function(a){var b={};for(var c in a)b[c]="";this.css(b)};var s={transitionProperty:"",transitionDuration:""};return h.prototype.removeTransitionStyles=function(){this.css(s)},h.prototype.removeElem=function(){this.element.parentNode.removeChild(this.element),this.emitEvent("remove",[this])},h.prototype.remove=function(){if(!i||!parseFloat(this.layout.options.transitionDuration))return void this.removeElem();var a=this;this.on("transitionEnd",function(){return a.removeElem(),!0}),this.hide()},h.prototype.reveal=function(){delete this.isHidden,this.css({display:""});var a=this.layout.options;this.transition({from:a.hiddenStyle,to:a.visibleStyle,isCleaning:!0})},h.prototype.hide=function(){this.isHidden=!0,this.css({display:""});var a=this.layout.options;this.transition({from:a.visibleStyle,to:a.hiddenStyle,isCleaning:!0,onTransitionEnd:{opacity:function(){this.isHidden&&this.css({display:"none"})}}})},h.prototype.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},h}var f=a.getComputedStyle,g=f?function(a){return f(a,null)}:function(a){return a.currentStyle};"function"==typeof define&&define.amd?define("outlayer/item",["eventEmitter/EventEmitter","get-size/get-size","get-style-property/get-style-property"],e):(a.Outlayer={},a.Outlayer.Item=e(a.EventEmitter,a.getSize,a.getStyleProperty))}(window),function(a){function b(a,b){for(var c in b)a[c]=b[c];return a}function c(a){return"[object Array]"===l.call(a)}function d(a){var b=[];if(c(a))b=a;else if(a&&"number"==typeof a.length)for(var d=0,e=a.length;e>d;d++)b.push(a[d]);else b.push(a);return b}function e(a,b){var c=n(b,a);-1!==c&&b.splice(c,1)}function f(a){return a.replace(/(.)([A-Z])/g,function(a,b,c){return b+"-"+c}).toLowerCase()}function g(c,g,l,n,o,p){function q(a,c){if("string"==typeof a&&(a=h.querySelector(a)),!a||!m(a))return void(i&&i.error("Bad "+this.constructor.namespace+" element: "+a));this.element=a,this.options=b({},this.constructor.defaults),this.option(c);var d=++r;this.element.outlayerGUID=d,s[d]=this,this._create(),this.options.isInitLayout&&this.layout()}var r=0,s={};return q.namespace="outlayer",q.Item=p,q.defaults={containerStyle:{position:"relative"},isInitLayout:!0,isOriginLeft:!0,isOriginTop:!0,isResizeBound:!0,isResizingContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}},b(q.prototype,l.prototype),q.prototype.option=function(a){b(this.options,a)},q.prototype._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),b(this.element.style,this.options.containerStyle),this.options.isResizeBound&&this.bindResize()},q.prototype.reloadItems=function(){this.items=this._itemize(this.element.children)},q.prototype._itemize=function(a){for(var b=this._filterFindItemElements(a),c=this.constructor.Item,d=[],e=0,f=b.length;f>e;e++){var g=b[e],h=new c(g,this);d.push(h)}return d},q.prototype._filterFindItemElements=function(a){a=d(a);for(var b=this.options.itemSelector,c=[],e=0,f=a.length;f>e;e++){var g=a[e];if(m(g))if(b){o(g,b)&&c.push(g);for(var h=g.querySelectorAll(b),i=0,j=h.length;j>i;i++)c.push(h[i])}else c.push(g)}return c},q.prototype.getItemElements=function(){for(var a=[],b=0,c=this.items.length;c>b;b++)a.push(this.items[b].element);return a},q.prototype.layout=function(){this._resetLayout(),this._manageStamps();var a=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;this.layoutItems(this.items,a),this._isLayoutInited=!0},q.prototype._init=q.prototype.layout,q.prototype._resetLayout=function(){this.getSize()},q.prototype.getSize=function(){this.size=n(this.element)},q.prototype._getMeasurement=function(a,b){var c,d=this.options[a];d?("string"==typeof d?c=this.element.querySelector(d):m(d)&&(c=d),this[a]=c?n(c)[b]:d):this[a]=0},q.prototype.layoutItems=function(a,b){a=this._getItemsForLayout(a),this._layoutItems(a,b),this._postLayout()},q.prototype._getItemsForLayout=function(a){for(var b=[],c=0,d=a.length;d>c;c++){var e=a[c];e.isIgnored||b.push(e)}return b},q.prototype._layoutItems=function(a,b){function c(){d.emitEvent("layoutComplete",[d,a])}var d=this;if(!a||!a.length)return void c();this._itemsOn(a,"layout",c);for(var e=[],f=0,g=a.length;g>f;f++){var h=a[f],i=this._getItemLayoutPosition(h);i.item=h,i.isInstant=b||h.isLayoutInstant,e.push(i)}this._processLayoutQueue(e)},q.prototype._getItemLayoutPosition=function(){return{x:0,y:0}},q.prototype._processLayoutQueue=function(a){for(var b=0,c=a.length;c>b;b++){var d=a[b];this._positionItem(d.item,d.x,d.y,d.isInstant)}},q.prototype._positionItem=function(a,b,c,d){d?a.goTo(b,c):a.moveTo(b,c)},q.prototype._postLayout=function(){this.resizeContainer()},q.prototype.resizeContainer=function(){if(this.options.isResizingContainer){var a=this._getContainerSize();a&&(this._setContainerMeasure(a.width,!0),this._setContainerMeasure(a.height,!1))}},q.prototype._getContainerSize=k,q.prototype._setContainerMeasure=function(a,b){if(void 0!==a){var c=this.size;c.isBorderBox&&(a+=b?c.paddingLeft+c.paddingRight+c.borderLeftWidth+c.borderRightWidth:c.paddingBottom+c.paddingTop+c.borderTopWidth+c.borderBottomWidth),a=Math.max(a,0),this.element.style[b?"width":"height"]=a+"px"}},q.prototype._itemsOn=function(a,b,c){function d(){return e++,e===f&&c.call(g),!0}for(var e=0,f=a.length,g=this,h=0,i=a.length;i>h;h++){var j=a[h];j.on(b,d)}},q.prototype.ignore=function(a){var b=this.getItem(a);b&&(b.isIgnored=!0)},q.prototype.unignore=function(a){var b=this.getItem(a);b&&delete b.isIgnored},q.prototype.stamp=function(a){if(a=this._find(a)){this.stamps=this.stamps.concat(a);for(var b=0,c=a.length;c>b;b++){var d=a[b];this.ignore(d)}}},q.prototype.unstamp=function(a){if(a=this._find(a))for(var b=0,c=a.length;c>b;b++){var d=a[b];e(d,this.stamps),this.unignore(d)}},q.prototype._find=function(a){return a?("string"==typeof a&&(a=this.element.querySelectorAll(a)),a=d(a)):void 0},q.prototype._manageStamps=function(){if(this.stamps&&this.stamps.length){this._getBoundingRect();for(var a=0,b=this.stamps.length;b>a;a++){var c=this.stamps[a];this._manageStamp(c)}}},q.prototype._getBoundingRect=function(){var a=this.element.getBoundingClientRect(),b=this.size;this._boundingRect={left:a.left+b.paddingLeft+b.borderLeftWidth,top:a.top+b.paddingTop+b.borderTopWidth,right:a.right-(b.paddingRight+b.borderRightWidth),bottom:a.bottom-(b.paddingBottom+b.borderBottomWidth)}},q.prototype._manageStamp=k,q.prototype._getElementOffset=function(a){var b=a.getBoundingClientRect(),c=this._boundingRect,d=n(a),e={left:b.left-c.left-d.marginLeft,top:b.top-c.top-d.marginTop,right:c.right-b.right-d.marginRight,bottom:c.bottom-b.bottom-d.marginBottom};return e},q.prototype.handleEvent=function(a){var b="on"+a.type;this[b]&&this[b](a)},q.prototype.bindResize=function(){this.isResizeBound||(c.bind(a,"resize",this),this.isResizeBound=!0)},q.prototype.unbindResize=function(){this.isResizeBound&&c.unbind(a,"resize",this),this.isResizeBound=!1},q.prototype.onresize=function(){function a(){b.resize(),delete b.resizeTimeout}this.resizeTimeout&&clearTimeout(this.resizeTimeout);var b=this;this.resizeTimeout=setTimeout(a,100)},q.prototype.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},q.prototype.needsResizeLayout=function(){var a=n(this.element),b=this.size&&a;return b&&a.innerWidth!==this.size.innerWidth},q.prototype.addItems=function(a){var b=this._itemize(a);return b.length&&(this.items=this.items.concat(b)),b},// eslint-disable-line
//q.prototype.appended=function(a){var b=this.addItems(a);b.length&&(this.layoutItems(b,!0),this.reveal(b))},q.prototype.prepended=function(a){var b=this._itemize(a);if(b.length){var c=this.items.slice(0);this.items=b.concat(c),this._resetLayout(),this._manageStamps(),this.layoutItems(b,!0),this.reveal(b),this.layoutItems(c)}},q.prototype.reveal=function(a){var b=a&&a.length;if(b)for(var c=0;b>c;c++){var d=a[c];d.reveal()}},q.prototype.hide=function(a){var b=a&&a.length;if(b)for(var c=0;b>c;c++){var d=a[c];d.hide()}},q.prototype.getItem=function(a){for(var b=0,c=this.items.length;c>b;b++){var d=this.items[b];if(d.element===a)return d}},q.prototype.getItems=function(a){if(a&&a.length){for(var b=[],c=0,d=a.length;d>c;c++){var e=a[c],f=this.getItem(e);f&&b.push(f)}return b}},q.prototype.remove=function(a){a=d(a);var b=this.getItems(a);if(b&&b.length){this._itemsOn(b,"remove",function(){this.emitEvent("removeComplete",[this,b])});for(var c=0,f=b.length;f>c;c++){var g=b[c];g.remove(),e(g,this.items)}}},q.prototype.destroy=function(){var a=this.element.style;a.height="",a.position="",a.width="";for(var b=0,c=this.items.length;c>b;b++){var d=this.items[b];d.destroy()}this.unbindResize(),delete this.element.outlayerGUID,j&&j.removeData(this.element,this.constructor.namespace)},q.data=function(a){var b=a&&a.outlayerGUID;return b&&s[b]},q.create=function(a,c){function d(){q.apply(this,arguments)}return Object.create?d.prototype=Object.create(q.prototype):b(d.prototype,q.prototype),d.prototype.constructor=d,d.defaults=b({},q.defaults),b(d.defaults,c),d.prototype.settings={},d.namespace=a,d.data=q.data,d.Item=function(){p.apply(this,arguments)},d.Item.prototype=new p,g(function(){for(var b=f(a),c=h.querySelectorAll(".js-"+b),e="data-"+b+"-options",g=0,k=c.length;k>g;g++){var l,m=c[g],n=m.getAttribute(e);try{l=n&&JSON.parse(n)}catch(o){i&&i.error("Error parsing "+e+" on "+m.nodeName.toLowerCase()+(m.id?"#"+m.id:"")+": "+o);continue}var p=new d(m,l);j&&j.data(m,a,p)}}),j&&j.bridget&&j.bridget(a,d),d},q.Item=p,q}var h=a.document,i=a.console,j=a.jQuery,k=function(){},l=Object.prototype.toString,m="object"==typeof HTMLElement?function(a){return a instanceof HTMLElement}:function(a){return a&&"object"==typeof a&&1===a.nodeType&&"string"==typeof a.nodeName},n=Array.prototype.indexOf?function(a,b){return a.indexOf(b)}:function(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return c;return-1};"function"==typeof define&&define.amd?define("outlayer/outlayer",["eventie/eventie","doc-ready/doc-ready","eventEmitter/EventEmitter","get-size/get-size","matches-selector/matches-selector","./item"],g):a.Outlayer=g(a.eventie,a.docReady,a.EventEmitter,a.getSize,a.matchesSelector,a.Outlayer.Item)}(window),function(a){function b(a,b){var d=a.create("masonry");return d.prototype._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns();var a=this.cols;for(this.colYs=[];a--;)this.colYs.push(0);this.maxY=0},d.prototype.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var a=this.items[0],c=a&&a.element;this.columnWidth=c&&b(c).outerWidth||this.containerWidth}this.columnWidth+=this.gutter,this.cols=Math.floor((this.containerWidth+this.gutter)/this.columnWidth),this.cols=Math.max(this.cols,1)},d.prototype.getContainerWidth=function(){var a=this.options.isFitWidth?this.element.parentNode:this.element,c=b(a);this.containerWidth=c&&c.innerWidth},d.prototype._getItemLayoutPosition=function(a){a.getSize();var b=a.size.outerWidth%this.columnWidth,d=b&&1>b?"round":"ceil",e=Math[d](a.size.outerWidth/this.columnWidth);e=Math.min(e,this.cols);for(var f=this._getColGroup(e),g=Math.min.apply(Math,f),h=c(f,g),i={x:this.columnWidth*h,y:g},j=g+a.size.outerHeight,k=this.cols+1-f.length,l=0;k>l;l++)this.colYs[h+l]=j;return i},d.prototype._getColGroup=function(a){if(2>a)return this.colYs;for(var b=[],c=this.cols+1-a,d=0;c>d;d++){var e=this.colYs.slice(d,d+a);b[d]=Math.max.apply(Math,e)}return b},d.prototype._manageStamp=function(a){var c=b(a),d=this._getElementOffset(a),e=this.options.isOriginLeft?d.left:d.right,f=e+c.outerWidth,g=Math.floor(e/this.columnWidth);g=Math.max(0,g);var h=Math.floor(f/this.columnWidth);h-=f%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var i=(this.options.isOriginTop?d.top:d.bottom)+c.outerHeight,j=g;h>=j;j++)this.colYs[j]=Math.max(i,this.colYs[j])},d.prototype._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var a={height:this.maxY};return this.options.isFitWidth&&(a.width=this._getContainerFitWidth()),a},d.prototype._getContainerFitWidth=function(){for(var a=0,b=this.cols;--b&&0===this.colYs[b];)a++;return(this.cols-a)*this.columnWidth-this.gutter},d.prototype.needsResizeLayout=function(){var a=this.containerWidth;return this.getContainerWidth(),a!==this.containerWidth},d}var c=Array.prototype.indexOf?function(a,b){return a.indexOf(b)}:function(a,b){for(var c=0,d=a.length;d>c;c++){var e=a[c];if(e===b)return c}return-1};"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size"],b):a.Masonry=b(a.Outlayer,a.getSize)}(window);

/*  SWFObject v2.2 <http://code.google.com/p/swfobject/>
  is released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
*/
//var swfobject=function(){var D="undefined",r="object",S="Shockwave Flash",W="ShockwaveFlash.ShockwaveFlash",q="application/x-shockwave-flash",R="SWFObjectExprInst",x="onreadystatechange",O=window,j=document,t=navigator,T=false,U=[h],o=[],N=[],I=[],l,Q,E,B,J=false,a=false,n,G,m=true,M=function(){var aa=typeof j.getElementById!=D&&typeof j.getElementsByTagName!=D&&typeof j.createElement!=D,ah=t.userAgent.toLowerCase(),Y=t.platform.toLowerCase(),ae=Y?/win/.test(Y):/win/.test(ah),ac=Y?/mac/.test(Y):/mac/.test(ah),af=/webkit/.test(ah)?parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,X=!+"\v1",ag=[0,0,0],ab=null;if(typeof t.plugins!=D&&typeof t.plugins[S]==r){ab=t.plugins[S].description;if(ab&&!(typeof t.mimeTypes!=D&&t.mimeTypes[q]&&!t.mimeTypes[q].enabledPlugin)){T=true;X=false;ab=ab.replace(/^.*\s+(\S+\s+\S+$)/,"$1");ag[0]=parseInt(ab.replace(/^(.*)\..*$/,"$1"),10);ag[1]=parseInt(ab.replace(/^.*\.(.*)\s.*$/,"$1"),10);ag[2]=/[a-zA-Z]/.test(ab)?parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}}else{if(typeof O.ActiveXObject!=D){try{var ad=new ActiveXObject(W);if(ad){ab=ad.GetVariable("$version");if(ab){X=true;ab=ab.split(" ")[1].split(",");ag=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}}catch(Z){}}}return{w3:aa,pv:ag,wk:af,ie:X,win:ae,mac:ac}}(),k=function(){if(!M.w3){return}if((typeof j.readyState!=D&&j.readyState=="complete")||(typeof j.readyState==D&&(j.getElementsByTagName("body")[0]||j.body))){f()}if(!J){if(typeof j.addEventListener!=D){j.addEventListener("DOMContentLoaded",f,false)}if(M.ie&&M.win){j.attachEvent(x,function(){if(j.readyState=="complete"){j.detachEvent(x,arguments.callee);f()}});if(O==top){(function(){if(J){return}try{j.documentElement.doScroll("left")}catch(X){setTimeout(arguments.callee,0);return}f()})()}}if(M.wk){(function(){if(J){return}if(!/loaded|complete/.test(j.readyState)){setTimeout(arguments.callee,0);return}f()})()}s(f)}}();function f(){if(J){return}try{var Z=j.getElementsByTagName("body")[0].appendChild(C("span"));Z.parentNode.removeChild(Z)}catch(aa){return}J=true;var X=U.length;for(var Y=0;Y<X;Y++){U[Y]()}}function K(X){if(J){X()}else{U[U.length]=X}}function s(Y){if(typeof O.addEventListener!=D){O.addEventListener("load",Y,false)}else{if(typeof j.addEventListener!=D){j.addEventListener("load",Y,false)}else{if(typeof O.attachEvent!=D){i(O,"onload",Y)}else{if(typeof O.onload=="function"){var X=O.onload;O.onload=function(){X();Y()}}else{O.onload=Y}}}}}function h(){if(T){V()}else{H()}}function V(){var X=j.getElementsByTagName("body")[0];var aa=C(r);aa.setAttribute("type",q);var Z=X.appendChild(aa);if(Z){var Y=0;(function(){if(typeof Z.GetVariable!=D){var ab=Z.GetVariable("$version");if(ab){ab=ab.split(" ")[1].split(",");M.pv=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}else{if(Y<10){Y++;setTimeout(arguments.callee,10);return}}X.removeChild(aa);Z=null;H()})()}else{H()}}function H(){var ag=o.length;if(ag>0){for(var af=0;af<ag;af++){var Y=o[af].id;var ab=o[af].callbackFn;var aa={success:false,id:Y};if(M.pv[0]>0){var ae=c(Y);if(ae){if(F(o[af].swfVersion)&&!(M.wk&&M.wk<312)){w(Y,true);if(ab){aa.success=true;aa.ref=z(Y);ab(aa)}}else{if(o[af].expressInstall&&A()){var ai={};ai.data=o[af].expressInstall;ai.width=ae.getAttribute("width")||"0";ai.height=ae.getAttribute("height")||"0";if(ae.getAttribute("class")){ai.styleclass=ae.getAttribute("class")}if(ae.getAttribute("align")){ai.align=ae.getAttribute("align")}var ah={};var X=ae.getElementsByTagName("param");var ac=X.length;for(var ad=0;ad<ac;ad++){if(X[ad].getAttribute("name").toLowerCase()!="movie"){ah[X[ad].getAttribute("name")]=X[ad].getAttribute("value")}}P(ai,ah,Y,ab)}else{p(ae);if(ab){ab(aa)}}}}}else{w(Y,true);if(ab){var Z=z(Y);if(Z&&typeof Z.SetVariable!=D){aa.success=true;aa.ref=Z}ab(aa)}}}}}function z(aa){var X=null;var Y=c(aa);if(Y&&Y.nodeName=="OBJECT"){if(typeof Y.SetVariable!=D){X=Y}else{var Z=Y.getElementsByTagName(r)[0];if(Z){X=Z}}}return X}function A(){return !a&&F("6.0.65")&&(M.win||M.mac)&&!(M.wk&&M.wk<312)}function P(aa,ab,X,Z){a=true;E=Z||null;B={success:false,id:X};var ae=c(X);if(ae){if(ae.nodeName=="OBJECT"){l=g(ae);Q=null}else{l=ae;Q=X}aa.id=R;if(typeof aa.width==D||(!/%$/.test(aa.width)&&parseInt(aa.width,10)<310)){aa.width="310"}if(typeof aa.height==D||(!/%$/.test(aa.height)&&parseInt(aa.height,10)<137)){aa.height="137"}j.title=j.title.slice(0,47)+" - Flash Player Installation";var ad=M.ie&&M.win?"ActiveX":"PlugIn",ac="MMredirectURL="+O.location.toString().replace(/&/g,"%26")+"&MMplayerType="+ad+"&MMdoctitle="+j.title;if(typeof ab.flashvars!=D){ab.flashvars+="&"+ac}else{ab.flashvars=ac}if(M.ie&&M.win&&ae.readyState!=4){var Y=C("div");X+="SWFObjectNew";Y.setAttribute("id",X);ae.parentNode.insertBefore(Y,ae);ae.style.display="none";(function(){if(ae.readyState==4){ae.parentNode.removeChild(ae)}else{setTimeout(arguments.callee,10)}})()}u(aa,ab,X)}}function p(Y){if(M.ie&&M.win&&Y.readyState!=4){var X=C("div");Y.parentNode.insertBefore(X,Y);X.parentNode.replaceChild(g(Y),X);Y.style.display="none";(function(){if(Y.readyState==4){Y.parentNode.removeChild(Y)}else{setTimeout(arguments.callee,10)}})()}else{Y.parentNode.replaceChild(g(Y),Y)}}function g(ab){var aa=C("div");if(M.win&&M.ie){aa.innerHTML=ab.innerHTML}else{var Y=ab.getElementsByTagName(r)[0];if(Y){var ad=Y.childNodes;if(ad){var X=ad.length;for(var Z=0;Z<X;Z++){if(!(ad[Z].nodeType==1&&ad[Z].nodeName=="PARAM")&&!(ad[Z].nodeType==8)){aa.appendChild(ad[Z].cloneNode(true))}}}}}return aa}function u(ai,ag,Y){var X,aa=c(Y);if(M.wk&&M.wk<312){return X}if(aa){if(typeof ai.id==D){ai.id=Y}if(M.ie&&M.win){var ah="";for(var ae in ai){if(ai[ae]!=Object.prototype[ae]){if(ae.toLowerCase()=="data"){ag.movie=ai[ae]}else{if(ae.toLowerCase()=="styleclass"){ah+=' class="'+ai[ae]+'"'}else{if(ae.toLowerCase()!="classid"){ah+=" "+ae+'="'+ai[ae]+'"'}}}}}var af="";for(var ad in ag){if(ag[ad]!=Object.prototype[ad]){af+='<param name="'+ad+'" value="'+ag[ad]+'" />'}}aa.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+ah+">"+af+"</object>";N[N.length]=ai.id;X=c(ai.id)}else{var Z=C(r);Z.setAttribute("type",q);for(var ac in ai){if(ai[ac]!=Object.prototype[ac]){if(ac.toLowerCase()=="styleclass"){Z.setAttribute("class",ai[ac])}else{if(ac.toLowerCase()!="classid"){Z.setAttribute(ac,ai[ac])}}}}for(var ab in ag){if(ag[ab]!=Object.prototype[ab]&&ab.toLowerCase()!="movie"){e(Z,ab,ag[ab])}}aa.parentNode.replaceChild(Z,aa);X=Z}}return X}function e(Z,X,Y){var aa=C("param");aa.setAttribute("name",X);aa.setAttribute("value",Y);Z.appendChild(aa)}function y(Y){var X=c(Y);if(X&&X.nodeName=="OBJECT"){if(M.ie&&M.win){X.style.display="none";(function(){if(X.readyState==4){b(Y)}else{setTimeout(arguments.callee,10)}})()}else{X.parentNode.removeChild(X)}}}function b(Z){var Y=c(Z);if(Y){for(var X in Y){if(typeof Y[X]=="function"){Y[X]=null}}Y.parentNode.removeChild(Y)}}function c(Z){var X=null;try{X=j.getElementById(Z)}catch(Y){}return X}function C(X){return j.createElement(X)}function i(Z,X,Y){Z.attachEvent(X,Y);I[I.length]=[Z,X,Y]}function F(Z){var Y=M.pv,X=Z.split(".");X[0]=parseInt(X[0],10);X[1]=parseInt(X[1],10)||0;X[2]=parseInt(X[2],10)||0;return(Y[0]>X[0]||(Y[0]==X[0]&&Y[1]>X[1])||(Y[0]==X[0]&&Y[1]==X[1]&&Y[2]>=X[2]))?true:false}function v(ac,Y,ad,ab){if(M.ie&&M.mac){return}var aa=j.getElementsByTagName("head")[0];if(!aa){return}var X=(ad&&typeof ad=="string")?ad:"screen";if(ab){n=null;G=null}if(!n||G!=X){var Z=C("style");Z.setAttribute("type","text/css");Z.setAttribute("media",X);n=aa.appendChild(Z);if(M.ie&&M.win&&typeof j.styleSheets!=D&&j.styleSheets.length>0){n=j.styleSheets[j.styleSheets.length-1]}G=X}if(M.ie&&M.win){if(n&&typeof n.addRule==r){n.addRule(ac,Y)}}else{if(n&&typeof j.createTextNode!=D){n.appendChild(j.createTextNode(ac+" {"+Y+"}"))}}}function w(Z,X){if(!m){return}var Y=X?"visible":"hidden";if(J&&c(Z)){c(Z).style.visibility=Y}else{v("#"+Z,"visibility:"+Y)}}function L(Y){var Z=/[\\\"<>\.;]/;var X=Z.exec(Y)!=null;return X&&typeof encodeURIComponent!=D?encodeURIComponent(Y):Y}var d=function(){if(M.ie&&M.win){window.attachEvent("onunload",function(){var ac=I.length;for(var ab=0;ab<ac;ab++){I[ab][0].detachEvent(I[ab][1],I[ab][2])}var Z=N.length;for(var aa=0;aa<Z;aa++){y(N[aa])}for(var Y in M){M[Y]=null}M=null;for(var X in swfobject){swfobject[X]=null}swfobject=null})}}();return{registerObject:function(ab,X,aa,Z){if(M.w3&&ab&&X){var Y={};Y.id=ab;Y.swfVersion=X;Y.expressInstall=aa;Y.callbackFn=Z;o[o.length]=Y;w(ab,false)}else{if(Z){Z({success:false,id:ab})}}},getObjectById:function(X){if(M.w3){return z(X)}},embedSWF:function(ab,ah,ae,ag,Y,aa,Z,ad,af,ac){var X={success:false,id:ah};if(M.w3&&!(M.wk&&M.wk<312)&&ab&&ah&&ae&&ag&&Y){w(ah,false);K(function(){ae+="";ag+="";var aj={};if(af&&typeof af===r){for(var al in af){aj[al]=af[al]}}aj.data=ab;aj.width=ae;aj.height=ag;var am={};if(ad&&typeof ad===r){for(var ak in ad){am[ak]=ad[ak]}}if(Z&&typeof Z===r){for(var ai in Z){if(typeof am.flashvars!=D){am.flashvars+="&"+ai+"="+Z[ai]}else{am.flashvars=ai+"="+Z[ai]}}}if(F(Y)){var an=u(aj,am,ah);if(aj.id==ah){w(ah,true)}X.success=true;X.ref=an}else{if(aa&&A()){aj.data=aa;P(aj,am,ah,ac);return}else{w(ah,true)}}if(ac){ac(X)}})}else{if(ac){ac(X)}}},switchOffAutoHideShow:function(){m=false},ua:M,getFlashPlayerVersion:function(){return{major:M.pv[0],minor:M.pv[1],release:M.pv[2]}},hasFlashPlayerVersion:F,createSWF:function(Z,Y,X){if(M.w3){return u(Z,Y,X)}else{return undefined}},showExpressInstall:function(Z,aa,X,Y){if(M.w3&&A()){P(Z,aa,X,Y)}},removeSWF:function(X){if(M.w3){y(X)}},createCSS:function(aa,Z,Y,X){if(M.w3){v(aa,Z,Y,X)}},addDomLoadEvent:K,addLoadEvent:s,getQueryParamValue:function(aa){var Z=j.location.search||j.location.hash;if(Z){if(/\?/.test(Z)){Z=Z.split("?")[1]}if(aa==null){return L(Z)}var Y=Z.split("&");for(var X=0;X<Y.length;X++){if(Y[X].substring(0,Y[X].indexOf("="))==aa){return L(Y[X].substring((Y[X].indexOf("=")+1)))}}}return""},// eslint-disable-line
//expressInstallCallback:function(){if(a){var X=c(R);if(X&&l){X.parentNode.replaceChild(l,X);if(Q){w(Q,true);if(M.ie&&M.win){l.style.display="block"}}if(E){E(B)}}a=false}}}}();

// taken out default image to reduce size
// modified code to work with jQuery 1.10.
// changed $.event.handle to $.event.dispatch
(function(o,i,k){i.infinitescroll=function z(D,F,E){this.element=i(E);if(!this._create(D,F)){this.failed=true}};i.infinitescroll.defaults={loading:{finished:k,finishedMsg:"<em>Congratulations, you've reached the end of the internet.</em>",img:"/wp-content/themes/hungertv2/img/x.gif",msg:null,msgText:"<em>Loading the next set of posts...</em>",selector:null,speed:"fast",start:k},state:{isDuringAjax:false,isInvalidPage:false,isDestroyed:false,isDone:false,isPaused:false,currPage:1},debug:false,behavior:k,binder:i(o),nextSelector:"div.navigation a:first",navSelector:"div.navigation",contentSelector:null,extraScrollPx:150,itemSelector:"div.post",animate:false,pathParse:k,dataType:"html",appendCallback:true,bufferPx:40,errorCallback:function(){},infid:0,pixelsFromNavToBottom:k,path:k,prefill:false};i.infinitescroll.prototype={_binding:function g(F){var D=this,E=D.options;E.v="2.0b2.120520";if(!!E.behavior&&this["_binding_"+E.behavior]!==k){this["_binding_"+E.behavior].call(this);return}if(F!=="bind"&&F!=="unbind"){this._debug("Binding value  "+F+" not valid");return false}if(F==="unbind"){(this.options.binder).unbind("smartscroll.infscr."+D.options.infid)}else{(this.options.binder)[F]("smartscroll.infscr."+D.options.infid,function(){D.scroll()})}this._debug("Binding",F)},_create:function t(F,J){var G=i.extend(true,{},i.infinitescroll.defaults,F);this.options=G;var I=i(o);var D=this;if(!D._validate(F)){return false}var H=i(G.nextSelector).attr("href");if(!H){this._debug("Navigation selector not found");return false}G.path=G.path||this._determinepath(H);G.contentSelector=G.contentSelector||this.element;G.loading.selector=G.loading.selector||G.contentSelector;G.loading.msg=G.loading.msg||i('<div id="infscr-loading"><img alt="Loading..." src="'+G.loading.img+'" /><div>'+G.loading.msgText+"</div></div>");(new Image()).src=G.loading.img;if(G.pixelsFromNavToBottom===k){G.pixelsFromNavToBottom=i(document).height()-i(G.navSelector).offset().top}var E=this;G.loading.start=G.loading.start||function(){i(G.navSelector).hide();G.loading.msg.appendTo(G.loading.selector).show(G.loading.speed,i.proxy(function(){this.beginAjax(G)},E))};G.loading.finished=G.loading.finished||function(){G.loading.msg.fadeOut(G.loading.speed)};G.callback=function(K,M,L){if(!!G.behavior&&K["_callback_"+G.behavior]!==k){K["_callback_"+G.behavior].call(i(G.contentSelector)[0],M,L)}if(J){J.call(i(G.contentSelector)[0],M,G,L)}if(G.prefill){I.bind("resize.infinite-scroll",K._prefill)}};if(F.debug){if(Function.prototype.bind&&(typeof console==="object"||typeof console==="function")&&typeof console.log==="object"){["log","info","warn","error","assert","dir","clear","profile","profileEnd"].forEach(function(K){console[K]=this.call(console[K],console)},Function.prototype.bind)}}this._setup();if(G.prefill){this._prefill()}return true},_prefill:function n(){var D=this;var G=i(document);var F=i(o);function E(){return(G.height()<=F.height())}this._prefill=function(){if(E()){D.scroll()}F.bind("resize.infinite-scroll",function(){if(E()){F.unbind("resize.infinite-scroll");D.scroll()}})};this._prefill()},_debug:function q(){if(true!==this.options.debug){return}if(typeof console!=="undefined"&&typeof console.log==="function"){if((Array.prototype.slice.call(arguments)).length===1&&typeof Array.prototype.slice.call(arguments)[0]==="string"){console.log((Array.prototype.slice.call(arguments)).toString())}else{console.log(Array.prototype.slice.call(arguments))}}else{if(!Function.prototype.bind&&typeof console!=="undefined"&&typeof console.log==="object"){Function.prototype.call.call(console.log,console,Array.prototype.slice.call(arguments))}}},_determinepath:function A(E){var D=this.options;if(!!D.behavior&&this["_determinepath_"+D.behavior]!==k){return this["_determinepath_"+D.behavior].call(this,E)}if(!!D.pathParse){this._debug("pathParse manual");return D.pathParse(E,this.options.state.currPage+1)}else{if(E.match(/^(.*?)\b2\b(.*?$)/)){E=E.match(/^(.*?)\b2\b(.*?$)/).slice(1)}else{if(E.match(/^(.*?)2(.*?$)/)){if(E.match(/^(.*?page=)2(\/.*|$)/)){E=E.match(/^(.*?page=)2(\/.*|$)/).slice(1);return E}E=E.match(/^(.*?)2(.*?$)/).slice(1)}else{if(E.match(/^(.*?page=)1(\/.*|$)/)){E=E.match(/^(.*?page=)1(\/.*|$)/).slice(1);return E}else{this._debug("Couldn't parse next");D.state.isInvalidPage=true}}}}this._debug("determinePath",E);return E},_error:function v(E){var D=this.options;if(!!D.behavior&&this["_error_"+D.behavior]!==k){this["_error_"+D.behavior].call(this,E);return}if(E!=="destroy"&&E!=="end"){E="unknown"}this._debug("Error",E);if(E==="end"){this._showdonemsg()}D.state.isDone=true;D.state.currPage=1;D.state.isPaused=false;this._binding("unbind")},_loadcallback:function c(H,G,E){var D=this.options,J=this.options.callback,L=(D.state.isDone)?"done":(!D.appendCallback)?"no-append":"append",K;if(!!D.behavior&&this["_loadcallback_"+D.behavior]!==k){this["_loadcallback_"+D.behavior].call(this,H,G);return}switch(L){case"done":this._showdonemsg();return false;case"no-append":if(D.dataType==="html"){G="<div>"+G+"</div>";G=i(G).find(D.itemSelector)}break;case"append":var F=H.children();if(F.length===0){return this._error("end")}K=document.createDocumentFragment();while(H[0].firstChild){K.appendChild(H[0].firstChild)}this._debug("contentSelector",i(D.contentSelector)[0]);i(D.contentSelector)[0].appendChild(K);G=F.get();break}D.loading.finished.call(i(D.contentSelector)[0],D);if(D.animate){var I=i(o).scrollTop()+i("#infscr-loading").height()+D.extraScrollPx+"px";i("html,body").animate({scrollTop:I},800,function(){D.state.isDuringAjax=false})}if(!D.animate){D.state.isDuringAjax=false}J(this,G,E);if(D.prefill){this._prefill()}},_nearbottom:function u(){var E=this.options,D=0+i(document).height()-(E.binder.scrollTop())-i(o).height();if(!!E.behavior&&this["_nearbottom_"+E.behavior]!==k){return this["_nearbottom_"+E.behavior].call(this)}this._debug("math:",D,E.pixelsFromNavToBottom);return(D-E.bufferPx<E.pixelsFromNavToBottom)},_pausing:function l(E){var D=this.options;if(!!D.behavior&&this["_pausing_"+D.behavior]!==k){this["_pausing_"+D.behavior].call(this,E);return}if(E!=="pause"&&E!=="resume"&&E!==null){this._debug("Invalid argument. Toggling pause value instead")}E=(E&&(E==="pause"||E==="resume"))?E:"toggle";switch(E){case"pause":D.state.isPaused=true;break;case"resume":D.state.isPaused=false;break;case"toggle":D.state.isPaused=!D.state.isPaused;break}this._debug("Paused",D.state.isPaused);return false},_setup:function r(){var D=this.options;if(!!D.behavior&&this["_setup_"+D.behavior]!==k){this["_setup_"+D.behavior].call(this);return}this._binding("bind");return false},_showdonemsg:function a(){var D=this.options;if(!!D.behavior&&this["_showdonemsg_"+D.behavior]!==k){this["_showdonemsg_"+D.behavior].call(this);return}D.loading.msg.find("img").hide().parent().find("div").html(D.loading.finishedMsg).animate({opacity:1},2000,function(){i(this).parent().fadeOut(D.loading.speed)});D.errorCallback.call(i(D.contentSelector)[0],"done")},_validate:function w(E){for(var D in E){if(D.indexOf&&D.indexOf("Selector")>-1&&i(E[D]).length===0){this._debug("Your "+D+" found no elements.");return false}}return true},bind:function p(){this._binding("bind")},destroy:function C(){this.options.state.isDestroyed=true;return this._error("destroy")},pause:function e(){this._pausing("pause")},resume:function h(){this._pausing("resume")},beginAjax:function B(G){var E=this,I=G.path,F,D,K,J;G.state.currPage++;F=i(G.contentSelector).is("table")?i("<tbody/>"):i("<div/>");D=(typeof I==="function")?I(G.state.currPage):I.join(G.state.currPage);E._debug("heading into ajax",D);K=(G.dataType==="html"||G.dataType==="json")?G.dataType:"html+callback";if(G.appendCallback&&G.dataType==="html"){K+="+callback"}switch(K){case"html+callback":E._debug("Using HTML via .load() method");F.load(D+" "+G.itemSelector,k,function H(L){E._loadcallback(F,L,D)});break;case"html":E._debug("Using "+(K.toUpperCase())+" via $.ajax() method");i.ajax({url:D,dataType:G.dataType,complete:function H(L,M){J=(typeof(L.isResolved)!=="undefined")?(L.isResolved()):(M==="success"||M==="notmodified");if(J){E._loadcallback(F,L.responseText,D)}else{E._error("end")}}});break;case"json":E._debug("Using "+(K.toUpperCase())+" via $.ajax() method");i.ajax({dataType:"json",type:"GET",url:D,success:function(N,O,M){J=(typeof(M.isResolved)!=="undefined")?(M.isResolved()):(O==="success"||O==="notmodified");if(G.appendCallback){if(G.template!==k){var L=G.template(N);F.append(L);if(J){E._loadcallback(F,L)}else{E._error("end")}}else{E._debug("template must be defined.");E._error("end")}}else{if(J){E._loadcallback(F,N,D)}else{E._error("end")}}},error:function(){E._debug("JSON ajax request failed.");E._error("end")}});break}},retrieve:function b(F){F=F||null;var D=this,E=D.options;if(!!E.behavior&&this["retrieve_"+E.behavior]!==k){this["retrieve_"+E.behavior].call(this,F);return}if(E.state.isDestroyed){this._debug("Instance is destroyed");return false}E.state.isDuringAjax=true;E.loading.start.call(i(E.contentSelector)[0],E)},scroll:function f(){var D=this.options,E=D.state;if(!!D.behavior&&this["scroll_"+D.behavior]!==k){this["scroll_"+D.behavior].call(this);return}if(E.isDuringAjax||E.isInvalidPage||E.isDone||E.isDestroyed||E.isPaused){return}if(!this._nearbottom()){return}this.retrieve()},toggle:function y(){this._pausing()},unbind:function m(){this._binding("unbind")},update:function j(D){if(i.isPlainObject(D)){this.options=i.extend(true,this.options,D)}}};i.fn.infinitescroll=function d(F,G){var E=typeof F;switch(E){case"string":var D=Array.prototype.slice.call(arguments,1);this.each(function(){var H=i.data(this,"infinitescroll");if(!H){return false}if(!i.isFunction(H[F])||F.charAt(0)==="_"){return false}H[F].apply(H,D)});break;case"object":this.each(function(){var H=i.data(this,"infinitescroll");if(H){H.update(F)}else{H=new i.infinitescroll(F,G,this);// eslint-disable-line
  if(!H.failed){i.data(this,"infinitescroll",H)}}});break}return this};var x=i.event,s;x.special.smartscroll={setup:function(){i(this).bind("scroll",x.special.smartscroll.handler)},teardown:function(){i(this).unbind("scroll",x.special.smartscroll.handler)},handler:function(G,D){var F=this,E=arguments;G.type="smartscroll";if(s){clearTimeout(s)}s=setTimeout(function(){// eslint-disable-line
i.event.dispatch.apply(F,E)},D==="execAsap"?0:100)}};i.fn.smartscroll=function(D){return D?this.bind("smartscroll",D):this.trigger("smartscroll",["execAsap"])}})(window,jQuery);

/*
Merged mailinglist-feed.js and stream.js to reduce the number of HTTP requests by one.
 */
(function ($) {
  var initReady = function () {
    if ($('body').hasClass('category') || $('body').hasClass('search'))
      return;

    var form;
    if ($('.home .stream .listed, .stream .listed').exists()) {
      var cookie_counter = readCookie('mailing-feed');
      var cookie_subscribed = readCookie('mailing-subscribed');
      if (!cookie_counter) {
        cookie_counter = 0;
        createCookie('mailing-feed',1,1);
      } else {
        eraseCookie('mailing-feed');
        createCookie('mailing-feed',++cookie_counter, 1);
      }

      //if (cookie_counter % 3 === 0 && !cookie_subscribed) {
      if (!cookie_subscribed) {
        form = getForm();
        var article = $('<article class="listed subscribe"><div class="wrapper"><h3>Join Our Mailinglist</h3><div id="mailinglistform"></div></div></article>');
        form.appendTo(article.find('#mailinglistform'));

        $('.stream .listed:nth-child(2)').before(article);

        $(window).trigger('resize');

        setInterval(function () {$('#mailingForm .submit').toggleClass('blink');},500);
        initForm();
      }
    }
    if ($('#mailinglistform.subscribe').exists()) {
      form = getForm();
      form.appendTo($('#mailinglistform'));
      initForm();
    }
  };

  function initForm() {
    var required = ["#firstname", "#lastname"];
    var emails = ["#email"];

    $('#mailingForm').submit(function(event){
      event.preventDefault();

      var hasError = false;

      $("#mailingForm :input").blur();

      for (i=0;i<required.length;i++) {// eslint-disable-line
        var input = $('#mailingForm '+required[i]);// eslint-disable-line
        if (input.val() == "") {// eslint-disable-line
          input.addClass("error");
          hasError = true;
        } else {
          input.removeClass("error");
        }
      }

      for (i=0;i<emails.length;i++) {// eslint-disable-line
        var input = $('#mailingForm '+emails[i]);// eslint-disable-line
        if (input.val() == "" || !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(input.val())) {// eslint-disable-line
          input.addClass("error");// eslint-disable-line
          hasError = true;
        }
      }

      if (!hasError){
        $.ajax({
          type: 'POST',
          url: '/pages/newsletter-subscribe/',
          data: $(this).serialize(),
          dataType: "html",
          success: function(data) {
            var c = $(data).filter('#content');
            $('#mailinglistform').html(c.html());
            if (data.indexOf('Error') === -1) {
              var date = new Date();
              date.setTime(date.getTime()+(1*24*60*60*1000));
              expires = "; expires="+date.toGMTString();// eslint-disable-line
              document.cookie = "mailing-subscribed=1; " + expires + " path=/";// eslint-disable-line
            }
          },
        });
      }
      return false;
    });
    $("#mailingForm :input").focus(function(){
      if ($(this).hasClass("error") ) {
        $(this).removeClass("error");
      }
    });
  }

  function getForm() {
    return $('<form action="/pages/newsletter-subscribe/" method="POST" accept-charset="utf-8" id="mailingForm" class="userpostform">' +
             '  <input type="hidden" name="source" value="HungerTV" id="source">' +
             '  <input type="hidden" name="timestamp" value="<?php echo time(); ?>" id="timestamp">' +
             '  <table border="0" cellspacing="0" cellpadding="0">' +
             '    <tr><td><label for="firstname">First Name *</label></td><td class="in"><input class="required" type="name" name="firstname" value="" id="firstname"></td></tr>' +
             '    <tr><td><label for="lastname">Last Name *</label></td><td class="in"> <input class="required" type="name" name="lastname" value="" id="lastname"></td></tr>' +
             '    <tr><td><label for="email">Email *</label></td><td class="in"> <input class="required email" type="text" name="email" value="" id="email"></td></tr>' +
             '    <tr><td><label for="occup">Occupation</label></td><td class="in"> <input type="text" name="occup" value="" id="occup"></td></tr>' +
             '    <tr><td><label for="country">Region&nbsp;&nbsp;</label></td><td class="in"> <div id="countrywrapper">' +
             '    <select name="country" id="country" style="width: auto;">' +
             '      <option value="">Select</option>'+ '        <option value="UK">United Kingdom</option>' +
             '      <option value="US">United States</option>' +
             '      <option value="Other">Other</option>' +
             '    </select></div></td></tr>' +
             '    <tr><td><label for="organisation">Organisation&nbsp;&nbsp;</label></td><td class="in"> <input type="text" name="organisation" value="" id="organisation"></td></tr>' +
             '  </table>' +
             '  <input class="submit" type="submit" value="Subscribe" name="subscribe" id="submit"><br>' +
             '  <span class="required">* Required fields</span>' +
             '</form>');
  }

  function createCookie(name,value,days) {
    var expires =  "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      expires = "; expires="+date.toGMTString();
    }
    else expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
  }

  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }

  function eraseCookie(name) {
    createCookie(name,"",-1);
  }

  $(document).ready(initReady);

})(jQuery);

(function($, undefined) {// eslint-disable-line
  var featureInsertCounter = 0;
  var featureInserts = null;
  var isIPhone = false;
  var isIPad = false;
  var isTouch = false;
  var infiniteSelector = ".stream .listing";
  var gutter_width = 16;// eslint-disable-line
  var current_page = 1;
  var isCategory = false;
  var isArticle = false;// eslint-disable-line
  var columns = 1;

  $.extend($.infinitescroll.prototype, {
     _nearbottom_vvu: function infscr_nearbottom_local() {
        var opts = this.options, instance = this, w = $(window);
        return (w.height() + w.scrollTop() > instance.element.offset().top + instance.element.height() - opts.bufferPx);
     },
  });

  var monitorInview = function(){
    $('.listed.article:not(.done-inview),.listed.image:not(.done-inview)').addClass('done-inview').on('inview', function(event, isInView, visiblePartX, visiblePartY) {// eslint-disable-line
      if (isInView) {
        var element = $(this);
        element.addClass('do-img');
        $('.listed.do-img').unbind('inview');
        element.find('.si > span').picturefill();
        element.find('img').hide();
        element.imagesLoaded(function(){
          element.find('img').fadeIn(500);
        });
      }
    });
  };

  var onresizeDeferred = function(doNow){
    if (typeof doNow !== "undefined"){
      onresizeAction();
    }else{
      clearTimeout(this.id);
      this.id = setTimeout(onresizeAction, 300);
    }
  };

  var onresizeAction = function(){
    var w = $(window).width();
    var h = $(window).height();// eslint-disable-line

    if ($(window).width() < 720){
      $(infiniteSelector).infinitescroll('pause');
    }else{
      $(infiniteSelector).infinitescroll('resume');
    }

    $('.do-img .si > span').picturefill();

    if (isCategory && w < 1000 && !$('.inline.listed.bloginfo').exists()){
      var info = $('#blogger-info').clone().show();
      info.addClass('inline listed bloginfo').removeClass('fixedToRight');
      info.appendTo(infiniteSelector);
    }

    $('.stream .listed.has-cycle ul').each(function(){
      var max = 0;
      $(this).find('li').each(function(){
        max = Math.max(max, $(this).height());
      });
      $(this).height(max);
    });

    if (!isCategory &&
      w >= 480){
      var gs = $('.stream .grid-sizer');
      if (gs.exists()){
        var cw = $('.stream .crop').width();
        columns = 1;
        sw = cw;// eslint-disable-line

        if (w > 780){
          $('.c1, .c2, .c3').addClass('no-border');
          $('.c3.two-column').removeClass('no-border');

          if ($('.c1.p1, .c2.p1').hasClass('two-column'))
            $('.c3.p1').removeClass('no-border');

          if ($('.c1.p2, .c2.p2').hasClass('two-column'))
            $('.c3.p2').removeClass('no-border');


          $(infiniteSelector).removeClass('one-column').removeClass('two-column').addClass('three-column');
          columns = 3;
          sw = (cw)/3;// eslint-disable-line
        }else if (w >= 480){
          $('.c1, .c2').addClass('no-border');
          $('.c2.two-column, .c3').removeClass('no-border');

          if ($('.c1.p1').hasClass('two-column'))
            $('.c2.p1').removeClass('no-border');

          if ($('.c1.p2').hasClass('two-column'))
            $('.c2.p2').removeClass('no-border');

          $(infiniteSelector).removeClass('one-column').addClass('two-column').removeClass('three-column');
          columns = 2;
          sw = (cw)/2;// eslint-disable-line
        }else{
          $('.c1').addClass('no-border');
          $('.c2, .c3').removeClass('no-border');
          $(infiniteSelector).addClass('one-column').removeClass('two-column').removeClass('three-column');
        }
        sw = Math.floor(sw);// eslint-disable-line

        gs.css('width', sw);// eslint-disable-line

        $('.stream .listing .listed').css('width', sw);// eslint-disable-line

        if (sw < 300){// eslint-disable-line
          $('.stream .listing .listed.mpu').addClass('two-column');
        }else{
          $('.stream .listing .listed.mpu').removeClass('two-column');
        }

        if (columns == 3){
          $('.stream .listing .listed.two-column').css('width', sw * 2);// eslint-disable-line

          $('.c1, .c2, .c3').addClass('no-border');
          $('.c3.two-column').removeClass('no-border');

          if ($('.c1.p1, .c2.p1').hasClass('two-column'))
            $('.c3.p1').removeClass('no-border');

          if ($('.c1.p2, .c2.p2').hasClass('two-column'))
            $('.c3.p2').removeClass('no-border');

        }else if (columns == 2){
          $('.stream .listing .listed.two-column').css('width', '100%');

          $('.c1, .c2').addClass('no-border');
          $('.c2.two-column, .c3').removeClass('no-border');

          if ($('.c1.p1').hasClass('two-column'))
            $('.c2.p1').removeClass('no-border');

          if ($('.c1.p2').hasClass('two-column'))
            $('.c2.p2').removeClass('no-border');
        }else{
          $('.stream .listing .listed.two-column').css('width', '100%');

          $('.c1').addClass('no-border');
          $('.c2, .c3').removeClass('no-border');
        }
      }
  /*    if (typeof $(infiniteSelector).data('masonry') !== "function"){
        $(infiniteSelector).masonry({
          gutter: 0,
          debug: true,
          itemSelector: '.stream .listing .listed',
          transitionDuration: 0,
          "columnWidth": ".grid-sizer",
        });
      }*/

      if (w >= 1000){
        $('.listed.insert img:not(.done)').each(function (){
          $(this).addClass('done').attr('src', $(this).data('src'));
        });
      }
    }else{
      if (typeof $(infiniteSelector).data('masonry') !== "undefined")
        $(infiniteSelector).masonry('destroy');
      $('.stream .listing .listed').css('width', '100%');
    }
  };
  $(window).on('resize orientationchange', onresizeDeferred);

  $(document).ready(function () {
    var deviceAgent = navigator.userAgent.toLowerCase();
    isIPhone = deviceAgent.match(/(iphone|ipod)/);
    isIPad = deviceAgent.match(/(ipad)/);
    isTouch = ('ontouchstart' in document.documentElement) || (isIPad !== null) || (isIPhone !== null);

    /* BLOG
    isCategory = $('body.category').exists();
    if (isCategory) {
      $('.post.listed .content-wrapper iframe').addClass('wrapped').wrap('<div class="video-iframe"/>');
    }else{
    */
      $().streamSlideshows();
    /* BLOG } */

    isArticle = $('body.single-article').exists();
    if (isTouch && $(window).width() < 720) {
      $('.listed.hide-on-mobile').detach().remove();
    }

    featureInserts = $('.insert');

    $().streamTopBorder($('.stream .listed'));

    onresizeAction();

    $(infiniteSelector).infinitescroll({
        debug: false,
        loading:{
          img: "",
          msgText:"<p>loading more content</p>",
          finishedMsg:"<p>no further content</p>",
          speed: 0,
          start: function(opts) {
            $(opts.navSelector).hide();
            opts.loading.msg.hide().appendTo(opts.loading.selector).fadeIn(250);
            $(infiniteSelector).data('infinitescroll').beginAjax(opts);
          },
          finished: function(opts){
            opts.loading.msg.fadeOut(250);
          },
        },
        state:{currPage:"1"},
        behavior:"vvu",
        nextSelector:"#post-nav a:first",
        navSelector:"#post-nav",
        contentSelector: infiniteSelector,
        itemSelector: infiniteSelector + " .listed",
        animate: true,
        extraScrollPx: 100,
        bufferPx: 100,
        pathParse: function(path,nextPage){// eslint-disable-line
          if (HungerTV.url.indexOf('?') > -1) {// eslint-disable-line
            var url = HungerTV.url.split('?');// eslint-disable-line
            return [url[0] + "page/","/?" + encodeURI(url[1].replace(',','%2C'))];// eslint-disable-line
          } else {
            return [HungerTV.url + "page/","/"];// eslint-disable-line
          }
        },
        errorCallback:function(){
          $('#more-nav').remove();
          $(infiniteSelector).infinitescroll('pause');
        },
      },
      function(newElements,data){// eslint-disable-line
        $(infiniteSelector).infinitescroll('pause');
        $().infinitePageLoaded(newElements);
      }
    );

    $('#post-nav').hide();
    if (!$('#post-nav .nav-previous a').exists()){
      $('#more-nav').remove();
    }else{
      $('#more-nav a').on('click', function(event) {
        event.preventDefault();
        $(infiniteSelector).infinitescroll('retrieve');
        return false;
      });
    }

    if (isTouch && $(window).width() < 720) {
      $('.si > span').picturefill(true);
      monitorInview();
    }else{
      $('.si > span').picturefill();
    }

    onresizeAction();
  });

  $.fn.infinitePageLoaded = function (newElements) {
    var w = $(window).width();
    newElements = $(newElements);

    if (isTouch && $(window).width() < 720) {
      newElements.filter('.hide-on-mobile').detach().remove();
    }

    current_page++;

    // as section taxonomy is used for post type other than article
    // paginating can give empty content back
    // test here if it did and stop infinite scroll
    if (!$(newElements).not('.htvad, .most_viewed, .has-cycle').exists()){
      $(newElements).remove();
      return;
    }

    var insert;
    if (!$('body').hasClass('search') && w >= 1000) {
      if (featureInserts.exists()) {
        featureInsertCounter++;
        if (featureInsertCounter >= featureInserts.length)
          featureInsertCounter = 0;

        insert = featureInserts.eq(featureInsertCounter).clone();
        insert.addClass('insert listed').appendTo($(infiniteSelector));

        insert.find('img').each(function (){

          $(this).hide().addClass('done').attr('src', $(this).data('src'));
        });
        insert.find('img').imagesLoaded(function(){
          $(this).fadeIn(500);
        });
        $(infiniteSelector).masonry( 'appended', insert);
      }
    }

    if(w >= 480){
      $(infiniteSelector).masonry( 'appended', newElements);
    }

    if (window.googletag && !window.adsBlocked) {
      if (current_page == 2)
        newElements.addClass('do-top-border');

      if (current_page > 2)
        newElements.addClass('no-top-border');

      newElements.find('.dfp').each(function(){
        var slotElement = $(this);
        var newSlotID = $(this).data('raw-id') + '-' + current_page;
        slotElement.html('');

        slotElement.attr('id', newSlotID);

        var sizes = []
        switch ($(this).data('raw-id')){
          case 'gpt-feature-stream-mpu-1':
            sizes = [[300,250]];
            break;

          case 'gpt-feature-stream-mpu-2':
            sizes = [[300,600]];
            break;
        }

        googletag.cmd.push(function() {// eslint-disable-line
          var slot = googletag.defineSlot('/64193083/' + slotElement.data('slot-id'),// eslint-disable-line
                                          sizes, newSlotID).addService(googletag.pubads());// eslint-disable-line

           googletag.display(newSlotID);// eslint-disable-line
           googletag.pubads().refresh([slot]);// eslint-disable-line

           $(window).trigger('resize');
        });
      });
    }else{
      $('.stream .listed.htvad').remove();
    }

    $().streamTopBorder(newElements, current_page, true);


    if (isTouch && $(window).width() < 720) {
      $('.si > span').picturefill(true);
      monitorInview();
    }else{
      $('.si > span').picturefill();
    }

    if(w >=720){
      $(infiniteSelector).infinitescroll('resume');
    }
    $('#more-nav').addClass('loaded');

    $().streamSlideshows();

    if (typeof _gaq !== 'undefined') {
      _gaq.push(['_trackPageview', window.location.pathname + 'page/' + current_page]);// eslint-disable-line
    }

    if (typeof ga !== "undefined"){
      ga('send', 'pageview', {// eslint-disable-line
        'page': window.location.pathname + 'page/' + current_page,
        'title': document.title,
      });
    }

    if (typeof pSUPERFLY !== "undefined"){
      pSUPERFLY.virtualPage(window.location.pathname + 'page/' + current_page, document.title);// eslint-disable-line
    }

    if (isTouch) {
      $(document).height($('#page').height());
    }
  };

  $.fn.streamSlideshows = function(elements){// eslint-disable-line
    if ($(window).width() < 720){
      $('.stream .listing .has-cycle:not(.trending)').detach().remove();
    }
    $('.has-cycle .cycle-slideshow:not(.init)').imagesLoaded(function (){
      onresizeAction();
    });
    $('.has-cycle .cycle-slideshow:not(.init)').addClass('init').cycle();
    $('.cycle-slideshow-delayed-500, .cycle-slideshow-delayed-1000').cycle().cycle('pause');
    setTimeout(function(){
      $('.cycle-slideshow-delayed-500').cycle('resume');
      onresizeAction();
    }, 500);

    setTimeout(function(){
      $('.cycle-slideshow-delayed-1000').cycle('resume');
      onresizeAction();
    }, 1000);
  };

  var uniqueValues = function(input){// eslint-disable-line
    var output = [];
    for (var i = 0; i < input.length; i++){
      if ((jQuery.inArray(input[i], output)) == -1){
        output.push(input[i]);
      }
    }
    return output;
  };
})(jQuery);




// end old stream.js

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
