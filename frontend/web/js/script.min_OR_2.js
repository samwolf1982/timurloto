function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}! function(e, t) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
        if (!e.document) throw new Error("jQuery requires a window with a document");
        return t(e)
    } : t(e)
}("undefined" != typeof window ? window : this, function(e, t) {
    function n(e) {
        var t = !!e && "length" in e && e.length,
            n = re.type(e);
        return "function" !== n && !re.isWindow(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }

    function i(e, t, n) {
        if (re.isFunction(t)) return re.grep(e, function(e, i) {
            return !!t.call(e, i, e) !== n
        });
        if (t.nodeType) return re.grep(e, function(e) {
            return e === t !== n
        });
        if ("string" == typeof t) {
            if (me.test(t)) return re.filter(t, e, n);
            t = re.filter(t, e)
        }
        return re.grep(e, function(e) {
            return J.call(t, e) > -1 !== n
        })
    }

    function o(e, t) {
        for (;
            (e = e[t]) && 1 !== e.nodeType;);
        return e
    }

    function r(e) {
        var t = {};
        return re.each(e.match(we) || [], function(e, n) {
            t[n] = !0
        }), t
    }

    function s() {
        G.removeEventListener("DOMContentLoaded", s), e.removeEventListener("load", s), re.ready()
    }

    function a() {
        this.expando = re.expando + a.uid++
    }

    function l(e, t, n) {
        var i;
        if (void 0 === n && 1 === e.nodeType)
            if (i = "data-" + t.replace(Ee, "-$&").toLowerCase(), "string" == typeof(n = e.getAttribute(i))) {
                try {
                    n = "true" === n || "false" !== n && ("null" === n ? null : +n + "" === n ? +n : ke.test(n) ? re.parseJSON(n) : n)
                } catch (e) {}
                Ce.set(e, t, n)
            } else n = void 0;
        return n
    }

    function c(e, t, n, i) {
        var o, r = 1,
            s = 20,
            a = i ? function() {
                return i.cur()
            } : function() {
                return re.css(e, t, "")
            },
            l = a(),
            c = n && n[3] || (re.cssNumber[t] ? "" : "px"),
            u = (re.cssNumber[t] || "px" !== c && +l) && De.exec(re.css(e, t));
        if (u && u[3] !== c) {
            c = c || u[3], n = n || [], u = +l || 1;
            do {
                r = r || ".5", u /= r, re.style(e, t, u + c)
            } while (r !== (r = a() / l) && 1 !== r && --s)
        }
        return n && (u = +u || +l || 0, o = n[1] ? u + (n[1] + 1) * n[2] : +n[2], i && (i.unit = c, i.start = u, i.end = o)), o
    }

    function u(e, t) {
        var n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [];
        return void 0 === t || t && re.nodeName(e, t) ? re.merge([e], n) : n
    }

    function d(e, t) {
        for (var n = 0, i = e.length; i > n; n++) Se.set(e[n], "globalEval", !t || Se.get(t[n], "globalEval"))
    }

    function h(e, t, n, i, o) {
        for (var r, s, a, l, c, h, p = t.createDocumentFragment(), f = [], m = 0, g = e.length; g > m; m++)
            if ((r = e[m]) || 0 === r)
                if ("object" === re.type(r)) re.merge(f, r.nodeType ? [r] : r);
                else if (Pe.test(r)) {
                    for (s = s || p.appendChild(t.createElement("div")), a = (Le.exec(r) || ["", ""])[1].toLowerCase(), l = Me[a] || Me._default, s.innerHTML = l[1] + re.htmlPrefilter(r) + l[2], h = l[0]; h--;) s = s.lastChild;
                    re.merge(f, s.childNodes), s = p.firstChild, s.textContent = ""
                } else f.push(t.createTextNode(r));
        for (p.textContent = "", m = 0; r = f[m++];)
            if (i && re.inArray(r, i) > -1) o && o.push(r);
            else if (c = re.contains(r.ownerDocument, r), s = u(p.appendChild(r), "script"), c && d(s), n)
                for (h = 0; r = s[h++];) Ne.test(r.type || "") && n.push(r);
        return p
    }

    function p() {
        return !0
    }

    function f() {
        return !1
    }

    function m() {
        try {
            return G.activeElement
        } catch (e) {}
    }

    function g(e, t, n, i, o, r) {
        var s, a;
        if ("object" == typeof t) {
            "string" != typeof n && (i = i || n, n = void 0);
            for (a in t) g(e, a, n, i, t[a], r);
            return e
        }
        if (null == i && null == o ? (o = n, i = n = void 0) : null == o && ("string" == typeof n ? (o = i, i = void 0) : (o = i, i = n, n = void 0)), !1 === o) o = f;
        else if (!o) return e;
        return 1 === r && (s = o, o = function(e) {
            return re().off(e), s.apply(this, arguments)
        }, o.guid = s.guid || (s.guid = re.guid++)), e.each(function() {
            re.event.add(this, t, o, i, n)
        })
    }

    function v(e, t) {
        return re.nodeName(e, "table") && re.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }

    function y(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
    }

    function b(e) {
        var t = ze.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function w(e, t) {
        var n, i, o, r, s, a, l, c;
        if (1 === t.nodeType) {
            if (Se.hasData(e) && (r = Se.access(e), s = Se.set(t, r), c = r.events)) {
                delete s.handle, s.events = {};
                for (o in c)
                    for (n = 0, i = c[o].length; i > n; n++) re.event.add(t, o, c[o][n])
            }
            Ce.hasData(e) && (a = Ce.access(e), l = re.extend({}, a), Ce.set(t, l))
        }
    }

    function _(e, t) {
        var n = t.nodeName.toLowerCase();
        "input" === n && $e.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
    }

    function x(e, t, n, i) {
        t = Q.apply([], t);
        var o, r, s, a, l, c, d = 0,
            p = e.length,
            f = p - 1,
            m = t[0],
            g = re.isFunction(m);
        if (g || p > 1 && "string" == typeof m && !ie.checkClone && We.test(m)) return e.each(function(o) {
            var r = e.eq(o);
            g && (t[0] = m.call(this, o, r.html())), x(r, t, n, i)
        });
        if (p && (o = h(t, e[0].ownerDocument, !1, e, i), r = o.firstChild, 1 === o.childNodes.length && (o = r), r || i)) {
            for (s = re.map(u(o, "script"), y), a = s.length; p > d; d++) l = o, d !== f && (l = re.clone(l, !0, !0), a && re.merge(s, u(l, "script"))), n.call(e[d], l, d);
            if (a)
                for (c = s[s.length - 1].ownerDocument, re.map(s, b), d = 0; a > d; d++) l = s[d], Ne.test(l.type || "") && !Se.access(l, "globalEval") && re.contains(c, l) && (l.src ? re._evalUrl && re._evalUrl(l.src) : re.globalEval(l.textContent.replace(Ye, "")))
        }
        return e
    }

    function T(e, t, n) {
        for (var i, o = t ? re.filter(t, e) : e, r = 0; null != (i = o[r]); r++) n || 1 !== i.nodeType || re.cleanData(u(i)), i.parentNode && (n && re.contains(i.ownerDocument, i) && d(u(i, "script")), i.parentNode.removeChild(i));
        return e
    }

    function S(e, t) {
        var n = re(t.createElement(e)).appendTo(t.body),
            i = re.css(n[0], "display");
        return n.detach(), i
    }

    function C(e) {
        var t = G,
            n = Xe[e];
        return n || (n = S(e, t), "none" !== n && n || (Be = (Be || re("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement), t = Be[0].contentDocument, t.write(), t.close(), n = S(e, t), Be.detach()), Xe[e] = n), n
    }

    function k(e, t, n) {
        var i, o, r, s, a = e.style;
        return n = n || Ge(e), s = n ? n.getPropertyValue(t) || n[t] : void 0, "" !== s && void 0 !== s || re.contains(e.ownerDocument, e) || (s = re.style(e, t)), n && !ie.pixelMarginRight() && Ve.test(s) && Ue.test(t) && (i = a.width, o = a.minWidth, r = a.maxWidth, a.minWidth = a.maxWidth = a.width = s, s = n.width, a.width = i, a.minWidth = o, a.maxWidth = r), void 0 !== s ? s + "" : s
    }

    function E(e, t) {
        return {
            get: function() {
                return e() ? void delete this.get : (this.get = t).apply(this, arguments)
            }
        }
    }

    function A(e) {
        if (e in nt) return e;
        for (var t = e[0].toUpperCase() + e.slice(1), n = tt.length; n--;)
            if ((e = tt[n] + t) in nt) return e
    }

    function D(e, t, n) {
        var i = De.exec(t);
        return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t
    }

    function O(e, t, n, i, o) {
        for (var r = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, s = 0; 4 > r; r += 2) "margin" === n && (s += re.css(e, n + Oe[r], !0, o)), i ? ("content" === n && (s -= re.css(e, "padding" + Oe[r], !0, o)), "margin" !== n && (s -= re.css(e, "border" + Oe[r] + "Width", !0, o))) : (s += re.css(e, "padding" + Oe[r], !0, o), "padding" !== n && (s += re.css(e, "border" + Oe[r] + "Width", !0, o)));
        return s
    }

    function I(e, t, n) {
        var i = !0,
            o = "width" === t ? e.offsetWidth : e.offsetHeight,
            r = Ge(e),
            s = "border-box" === re.css(e, "boxSizing", !1, r);
        if (0 >= o || null == o) {
            if (o = k(e, t, r), (0 > o || null == o) && (o = e.style[t]), Ve.test(o)) return o;
            i = s && (ie.boxSizingReliable() || o === e.style[t]), o = parseFloat(o) || 0
        }
        return o + O(e, t, n || (s ? "border" : "content"), i, r) + "px"
    }

    function $(e, t) {
        for (var n, i, o, r = [], s = 0, a = e.length; a > s; s++) i = e[s], i.style && (r[s] = Se.get(i, "olddisplay"), n = i.style.display, t ? (r[s] || "none" !== n || (i.style.display = ""), "" === i.style.display && Ie(i) && (r[s] = Se.access(i, "olddisplay", C(i.nodeName)))) : (o = Ie(i), "none" === n && o || Se.set(i, "olddisplay", o ? n : re.css(i, "display"))));
        for (s = 0; a > s; s++) i = e[s], i.style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? r[s] || "" : "none"));
        return e
    }

    function L(e, t, n, i, o) {
        return new L.prototype.init(e, t, n, i, o)
    }

    function N() {
        return e.setTimeout(function() {
            it = void 0
        }), it = re.now()
    }

    function M(e, t) {
        var n, i = 0,
            o = {
                height: e
            };
        for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = Oe[i], o["margin" + n] = o["padding" + n] = e;
        return t && (o.opacity = o.width = e), o
    }

    function P(e, t, n) {
        for (var i, o = (F.tweeners[t] || []).concat(F.tweeners["*"]), r = 0, s = o.length; s > r; r++)
            if (i = o[r].call(n, t, e)) return i
    }

    function j(e, t, n) {
        var i, o, r, s, a, l, c, u = this,
            d = {},
            h = e.style,
            p = e.nodeType && Ie(e),
            f = Se.get(e, "fxshow");
        n.queue || (a = re._queueHooks(e, "fx"), null == a.unqueued && (a.unqueued = 0, l = a.empty.fire, a.empty.fire = function() {
            a.unqueued || l()
        }), a.unqueued++, u.always(function() {
            u.always(function() {
                a.unqueued--, re.queue(e, "fx").length || a.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [h.overflow, h.overflowX, h.overflowY], c = re.css(e, "display"), "inline" === ("none" === c ? Se.get(e, "olddisplay") || C(e.nodeName) : c) && "none" === re.css(e, "float") && (h.display = "inline-block")), n.overflow && (h.overflow = "hidden", u.always(function() {
            h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
        }));
        for (i in t)
            if (o = t[i], rt.exec(o)) {
                if (delete t[i], r = r || "toggle" === o, o === (p ? "hide" : "show")) {
                    if ("show" !== o || !f || void 0 === f[i]) continue;
                    p = !0
                }
                d[i] = f && f[i] || re.style(e, i)
            } else c = void 0;
        if (re.isEmptyObject(d)) "inline" === ("none" === c ? C(e.nodeName) : c) && (h.display = c);
        else {
            f ? "hidden" in f && (p = f.hidden) : f = Se.access(e, "fxshow", {}), r && (f.hidden = !p), p ? re(e).show() : u.done(function() {
                re(e).hide()
            }), u.done(function() {
                var t;
                Se.remove(e, "fxshow");
                for (t in d) re.style(e, t, d[t])
            });
            for (i in d) s = P(p ? f[i] : 0, i, u), i in f || (f[i] = s.start, p && (s.end = s.start, s.start = "width" === i || "height" === i ? 1 : 0))
        }
    }

    function H(e, t) {
        var n, i, o, r, s;
        for (n in e)
            if (i = re.camelCase(n), o = t[i], r = e[n], re.isArray(r) && (o = r[1], r = e[n] = r[0]), n !== i && (e[i] = r, delete e[n]), (s = re.cssHooks[i]) && "expand" in s) {
                r = s.expand(r), delete e[i];
                for (n in r) n in e || (e[n] = r[n], t[n] = o)
            } else t[i] = o
    }

    function F(e, t, n) {
        var i, o, r = 0,
            s = F.prefilters.length,
            a = re.Deferred().always(function() {
                delete l.elem
            }),
            l = function() {
                if (o) return !1;
                for (var t = it || N(), n = Math.max(0, c.startTime + c.duration - t), i = n / c.duration || 0, r = 1 - i, s = 0, l = c.tweens.length; l > s; s++) c.tweens[s].run(r);
                return a.notifyWith(e, [c, r, n]), 1 > r && l ? n : (a.resolveWith(e, [c]), !1)
            },
            c = a.promise({
                elem: e,
                props: re.extend({}, t),
                opts: re.extend(!0, {
                    specialEasing: {},
                    easing: re.easing._default
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: it || N(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var i = re.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
                    return c.tweens.push(i), i
                },
                stop: function(t) {
                    var n = 0,
                        i = t ? c.tweens.length : 0;
                    if (o) return this;
                    for (o = !0; i > n; n++) c.tweens[n].run(1);
                    return t ? (a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c, t])) : a.rejectWith(e, [c, t]), this
                }
            }),
            u = c.props;
        for (H(u, c.opts.specialEasing); s > r; r++)
            if (i = F.prefilters[r].call(c, e, u, c.opts)) return re.isFunction(i.stop) && (re._queueHooks(c.elem, c.opts.queue).stop = re.proxy(i.stop, i)), i;
        return re.map(u, P, c), re.isFunction(c.opts.start) && c.opts.start.call(e, c), re.fx.timer(re.extend(l, {
            elem: e,
            anim: c,
            queue: c.opts.queue
        })), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always)
    }

    function R(e) {
        return e.getAttribute && e.getAttribute("class") || ""
    }

    function q(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var i, o = 0,
                r = t.toLowerCase().match(we) || [];
            if (re.isFunction(n))
                for (; i = r[o++];) "+" === i[0] ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
        }
    }

    function W(e, t, n, i) {
        function o(a) {
            var l;
            return r[a] = !0, re.each(e[a] || [], function(e, a) {
                var c = a(t, n, i);
                return "string" != typeof c || s || r[c] ? s ? !(l = c) : void 0 : (t.dataTypes.unshift(c), o(c), !1)
            }), l
        }
        var r = {},
            s = e === Ct;
        return o(t.dataTypes[0]) || !r["*"] && o("*")
    }

    function z(e, t) {
        var n, i, o = re.ajaxSettings.flatOptions || {};
        for (n in t) void 0 !== t[n] && ((o[n] ? e : i || (i = {}))[n] = t[n]);
        return i && re.extend(!0, e, i), e
    }

    function Y(e, t, n) {
        for (var i, o, r, s, a = e.contents, l = e.dataTypes;
             "*" === l[0];) l.shift(), void 0 === i && (i = e.mimeType || t.getResponseHeader("Content-Type"));
        if (i)
            for (o in a)
                if (a[o] && a[o].test(i)) {
                    l.unshift(o);
                    break
                }
        if (l[0] in n) r = l[0];
        else {
            for (o in n) {
                if (!l[0] || e.converters[o + " " + l[0]]) {
                    r = o;
                    break
                }
                s || (s = o)
            }
            r = r || s
        }
        return r ? (r !== l[0] && l.unshift(r), n[r]) : void 0
    }

    function B(e, t, n, i) {
        var o, r, s, a, l, c = {},
            u = e.dataTypes.slice();
        if (u[1])
            for (s in e.converters) c[s.toLowerCase()] = e.converters[s];
        for (r = u.shift(); r;)
            if (e.responseFields[r] && (n[e.responseFields[r]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = r, r = u.shift())
                if ("*" === r) r = l;
                else if ("*" !== l && l !== r) {
                    if (!(s = c[l + " " + r] || c["* " + r]))
                        for (o in c)
                            if (a = o.split(" "), a[1] === r && (s = c[l + " " + a[0]] || c["* " + a[0]])) {
                                !0 === s ? s = c[o] : !0 !== c[o] && (r = a[0], u.unshift(a[1]));
                                break
                            }
                    if (!0 !== s)
                        if (s && e.throws) t = s(t);
                        else try {
                            t = s(t)
                        } catch (e) {
                            return {
                                state: "parsererror",
                                error: s ? e : "No conversion from " + l + " to " + r
                            }
                        }
                }
        return {
            state: "success",
            data: t
        }
    }

    function X(e, t, n, i) {
        var o;
        if (re.isArray(t)) re.each(t, function(t, o) {
            n || Dt.test(e) ? i(e, o) : X(e + "[" + ("object" == typeof o && null != o ? t : "") + "]", o, n, i)
        });
        else if (n || "object" !== re.type(t)) i(e, t);
        else
            for (o in t) X(e + "[" + o + "]", t[o], n, i)
    }

    function U(e) {
        return re.isWindow(e) ? e : 9 === e.nodeType && e.defaultView
    }
    var V = [],
        G = e.document,
        K = V.slice,
        Q = V.concat,
        Z = V.push,
        J = V.indexOf,
        ee = {},
        te = ee.toString,
        ne = ee.hasOwnProperty,
        ie = {},
        oe = "2.2.4",
        re = function(e, t) {
            return new re.fn.init(e, t)
        },
        se = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        ae = /^-ms-/,
        le = /-([\da-z])/gi,
        ce = function(e, t) {
            return t.toUpperCase()
        };
    re.fn = re.prototype = {
        jquery: oe,
        constructor: re,
        selector: "",
        length: 0,
        toArray: function() {
            return K.call(this)
        },
        get: function(e) {
            return null != e ? 0 > e ? this[e + this.length] : this[e] : K.call(this)
        },
        pushStack: function(e) {
            var t = re.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t
        },
        each: function(e) {
            return re.each(this, e)
        },
        map: function(e) {
            return this.pushStack(re.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        slice: function() {
            return this.pushStack(K.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length,
                n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor()
        },
        push: Z,
        sort: V.sort,
        splice: V.splice
    }, re.extend = re.fn.extend = function() {
        var e, t, n, i, o, r, s = arguments[0] || {},
            a = 1,
            l = arguments.length,
            c = !1;
        for ("boolean" == typeof s && (c = s, s = arguments[a] || {}, a++), "object" == typeof s || re.isFunction(s) || (s = {}), a === l && (s = this, a--); l > a; a++)
            if (null != (e = arguments[a]))
                for (t in e) n = s[t], i = e[t], s !== i && (c && i && (re.isPlainObject(i) || (o = re.isArray(i))) ? (o ? (o = !1, r = n && re.isArray(n) ? n : []) : r = n && re.isPlainObject(n) ? n : {}, s[t] = re.extend(c, r, i)) : void 0 !== i && (s[t] = i));
        return s
    }, re.extend({
        expando: "jQuery" + (oe + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(e) {
            throw new Error(e)
        },
        noop: function() {},
        isFunction: function(e) {
            return "function" === re.type(e)
        },
        isArray: Array.isArray,
        isWindow: function(e) {
            return null != e && e === e.window
        },
        isNumeric: function(e) {
            var t = e && e.toString();
            return !re.isArray(e) && t - parseFloat(t) + 1 >= 0
        },
        isPlainObject: function(e) {
            var t;
            if ("object" !== re.type(e) || e.nodeType || re.isWindow(e)) return !1;
            if (e.constructor && !ne.call(e, "constructor") && !ne.call(e.constructor.prototype || {}, "isPrototypeOf")) return !1;
            for (t in e);
            return void 0 === t || ne.call(e, t)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) return !1;
            return !0
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? ee[te.call(e)] || "object" : typeof e
        },
        globalEval: function(e) {
            var t, n = eval;
            (e = re.trim(e)) && (1 === e.indexOf("use strict") ? (t = G.createElement("script"), t.text = e, G.head.appendChild(t).parentNode.removeChild(t)) : n(e))
        },
        camelCase: function(e) {
            return e.replace(ae, "ms-").replace(le, ce)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, t) {
            var i, o = 0;
            if (n(e))
                for (i = e.length; i > o && !1 !== t.call(e[o], o, e[o]); o++);
            else
                for (o in e)
                    if (!1 === t.call(e[o], o, e[o])) break; return e
        },
        trim: function(e) {
            return null == e ? "" : (e + "").replace(se, "")
        },
        makeArray: function(e, t) {
            var i = t || [];
            return null != e && (n(Object(e)) ? re.merge(i, "string" == typeof e ? [e] : e) : Z.call(i, e)), i
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : J.call(t, e, n)
        },
        merge: function(e, t) {
            for (var n = +t.length, i = 0, o = e.length; n > i; i++) e[o++] = t[i];
            return e.length = o, e
        },
        grep: function(e, t, n) {
            for (var i = [], o = 0, r = e.length, s = !n; r > o; o++) !t(e[o], o) !== s && i.push(e[o]);
            return i
        },
        map: function(e, t, i) {
            var o, r, s = 0,
                a = [];
            if (n(e))
                for (o = e.length; o > s; s++) null != (r = t(e[s], s, i)) && a.push(r);
            else
                for (s in e) null != (r = t(e[s], s, i)) && a.push(r);
            return Q.apply([], a)
        },
        guid: 1,
        proxy: function(e, t) {
            var n, i, o;
            return "string" == typeof t && (n = e[t], t = e, e = n), re.isFunction(e) ? (i = K.call(arguments, 2), o = function() {
                return e.apply(t || this, i.concat(K.call(arguments)))
            }, o.guid = e.guid = e.guid || re.guid++, o) : void 0
        },
        now: Date.now,
        support: ie
    }), "function" == typeof Symbol && (re.fn[Symbol.iterator] = V[Symbol.iterator]), re.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(e, t) {
        ee["[object " + t + "]"] = t.toLowerCase()
    });
    var ue = function(e) {
        function t(e, t, n, i) {
            var o, r, s, a, c, d, h, p, f = t && t.ownerDocument,
                m = t ? t.nodeType : 9;
            if (n = n || [], "string" != typeof e || !e || 1 !== m && 9 !== m && 11 !== m) return n;
            if (!i && ((t ? t.ownerDocument || t : H) !== O && D(t), t = t || O, $)) {
                if (11 !== m && (d = me.exec(e)))
                    if (o = d[1]) {
                        if (9 === m) {
                            if (!(s = t.getElementById(o))) return n;
                            if (s.id === o) return n.push(s), n
                        } else if (f && (s = f.getElementById(o)) && P(t, s) && s.id === o) return n.push(s), n
                    } else {
                        if (d[2]) return K.apply(n, t.getElementsByTagName(e)), n;
                        if ((o = d[3]) && b.getElementsByClassName && t.getElementsByClassName) return K.apply(n, t.getElementsByClassName(o)), n
                    }
                if (b.qsa && !z[e + " "] && (!L || !L.test(e))) {
                    if (1 !== m) f = t, p = e;
                    else if ("object" !== t.nodeName.toLowerCase()) {
                        for ((a = t.getAttribute("id")) ? a = a.replace(ve, "\\$&") : t.setAttribute("id", a = j), h = T(e), r = h.length, c = ue.test(a) ? "#" + a : "[id='" + a + "']"; r--;) h[r] = c + " " + u(h[r]);
                        p = h.join(","), f = ge.test(e) && l(t.parentNode) || t
                    }
                    if (p) try {
                        return K.apply(n, f.querySelectorAll(p)), n
                    } catch (e) {} finally {
                        a === j && t.removeAttribute("id")
                    }
                }
            }
            return C(e.replace(re, "$1"), t, n, i)
        }

        function n() {
            function e(n, i) {
                return t.push(n + " ") > w.cacheLength && delete e[t.shift()], e[n + " "] = i
            }
            var t = [];
            return e
        }

        function i(e) {
            return e[j] = !0, e
        }

        function o(e) {
            var t = O.createElement("div");
            try {
                return !!e(t)
            } catch (e) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t), t = null
            }
        }

        function r(e, t) {
            for (var n = e.split("|"), i = n.length; i--;) w.attrHandle[n[i]] = t
        }

        function s(e, t) {
            var n = t && e,
                i = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || B) - (~e.sourceIndex || B);
            if (i) return i;
            if (n)
                for (; n = n.nextSibling;)
                    if (n === t) return -1;
            return e ? 1 : -1
        }

        function a(e) {
            return i(function(t) {
                return t = +t, i(function(n, i) {
                    for (var o, r = e([], n.length, t), s = r.length; s--;) n[o = r[s]] && (n[o] = !(i[o] = n[o]))
                })
            })
        }

        function l(e) {
            return e && void 0 !== e.getElementsByTagName && e
        }

        function c() {}

        function u(e) {
            for (var t = 0, n = e.length, i = ""; n > t; t++) i += e[t].value;
            return i
        }

        function d(e, t, n) {
            var i = t.dir,
                o = n && "parentNode" === i,
                r = R++;
            return t.first ? function(t, n, r) {
                for (; t = t[i];)
                    if (1 === t.nodeType || o) return e(t, n, r)
            } : function(t, n, s) {
                var a, l, c, u = [F, r];
                if (s) {
                    for (; t = t[i];)
                        if ((1 === t.nodeType || o) && e(t, n, s)) return !0
                } else
                    for (; t = t[i];)
                        if (1 === t.nodeType || o) {
                            if (c = t[j] || (t[j] = {}), l = c[t.uniqueID] || (c[t.uniqueID] = {}), (a = l[i]) && a[0] === F && a[1] === r) return u[2] = a[2];
                            if (l[i] = u, u[2] = e(t, n, s)) return !0
                        }
            }
        }

        function h(e) {
            return e.length > 1 ? function(t, n, i) {
                for (var o = e.length; o--;)
                    if (!e[o](t, n, i)) return !1;
                return !0
            } : e[0]
        }

        function p(e, n, i) {
            for (var o = 0, r = n.length; r > o; o++) t(e, n[o], i);
            return i
        }

        function f(e, t, n, i, o) {
            for (var r, s = [], a = 0, l = e.length, c = null != t; l > a; a++)(r = e[a]) && (n && !n(r, i, o) || (s.push(r), c && t.push(a)));
            return s
        }

        function m(e, t, n, o, r, s) {
            return o && !o[j] && (o = m(o)), r && !r[j] && (r = m(r, s)), i(function(i, s, a, l) {
                var c, u, d, h = [],
                    m = [],
                    g = s.length,
                    v = i || p(t || "*", a.nodeType ? [a] : a, []),
                    y = !e || !i && t ? v : f(v, h, e, a, l),
                    b = n ? r || (i ? e : g || o) ? [] : s : y;
                if (n && n(y, b, a, l), o)
                    for (c = f(b, m), o(c, [], a, l), u = c.length; u--;)(d = c[u]) && (b[m[u]] = !(y[m[u]] = d));
                if (i) {
                    if (r || e) {
                        if (r) {
                            for (c = [], u = b.length; u--;)(d = b[u]) && c.push(y[u] = d);
                            r(null, b = [], c, l)
                        }
                        for (u = b.length; u--;)(d = b[u]) && (c = r ? Z(i, d) : h[u]) > -1 && (i[c] = !(s[c] = d))
                    }
                } else b = f(b === s ? b.splice(g, b.length) : b), r ? r(null, s, b, l) : K.apply(s, b)
            })
        }

        function g(e) {
            for (var t, n, i, o = e.length, r = w.relative[e[0].type], s = r || w.relative[" "], a = r ? 1 : 0, l = d(function(e) {
                return e === t
            }, s, !0), c = d(function(e) {
                return Z(t, e) > -1
            }, s, !0), p = [function(e, n, i) {
                var o = !r && (i || n !== k) || ((t = n).nodeType ? l(e, n, i) : c(e, n, i));
                return t = null, o
            }]; o > a; a++)
                if (n = w.relative[e[a].type]) p = [d(h(p), n)];
                else {
                    if (n = w.filter[e[a].type].apply(null, e[a].matches), n[j]) {
                        for (i = ++a; o > i && !w.relative[e[i].type]; i++);
                        return m(a > 1 && h(p), a > 1 && u(e.slice(0, a - 1).concat({
                            value: " " === e[a - 2].type ? "*" : ""
                        })).replace(re, "$1"), n, i > a && g(e.slice(a, i)), o > i && g(e = e.slice(i)), o > i && u(e))
                    }
                    p.push(n)
                }
            return h(p)
        }

        function v(e, n) {
            var o = n.length > 0,
                r = e.length > 0,
                s = function(i, s, a, l, c) {
                    var u, d, h, p = 0,
                        m = "0",
                        g = i && [],
                        v = [],
                        y = k,
                        b = i || r && w.find.TAG("*", c),
                        _ = F += null == y ? 1 : Math.random() || .1,
                        x = b.length;
                    for (c && (k = s === O || s || c); m !== x && null != (u = b[m]); m++) {
                        if (r && u) {
                            for (d = 0, s || u.ownerDocument === O || (D(u), a = !$); h = e[d++];)
                                if (h(u, s || O, a)) {
                                    l.push(u);
                                    break
                                }
                            c && (F = _)
                        }
                        o && ((u = !h && u) && p--, i && g.push(u))
                    }
                    if (p += m, o && m !== p) {
                        for (d = 0; h = n[d++];) h(g, v, s, a);
                        if (i) {
                            if (p > 0)
                                for (; m--;) g[m] || v[m] || (v[m] = V.call(l));
                            v = f(v)
                        }
                        K.apply(l, v), c && !i && v.length > 0 && p + n.length > 1 && t.uniqueSort(l)
                    }
                    return c && (F = _, k = y), g
                };
            return o ? i(s) : s
        }
        var y, b, w, _, x, T, S, C, k, E, A, D, O, I, $, L, N, M, P, j = "sizzle" + 1 * new Date,
            H = e.document,
            F = 0,
            R = 0,
            q = n(),
            W = n(),
            z = n(),
            Y = function(e, t) {
                return e === t && (A = !0), 0
            },
            B = 1 << 31,
            X = {}.hasOwnProperty,
            U = [],
            V = U.pop,
            G = U.push,
            K = U.push,
            Q = U.slice,
            Z = function(e, t) {
                for (var n = 0, i = e.length; i > n; n++)
                    if (e[n] === t) return n;
                return -1
            },
            J = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            ee = "[\\x20\\t\\r\\n\\f]",
            te = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            ne = "\\[" + ee + "*(" + te + ")(?:" + ee + "*([*^$|!~]?=)" + ee + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + te + "))|)" + ee + "*\\]",
            ie = ":(" + te + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + ne + ")*)|.*)\\)|)",
            oe = new RegExp(ee + "+", "g"),
            re = new RegExp("^" + ee + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ee + "+$", "g"),
            se = new RegExp("^" + ee + "*," + ee + "*"),
            ae = new RegExp("^" + ee + "*([>+~]|" + ee + ")" + ee + "*"),
            le = new RegExp("=" + ee + "*([^\\]'\"]*?)" + ee + "*\\]", "g"),
            ce = new RegExp(ie),
            ue = new RegExp("^" + te + "$"),
            de = {
                ID: new RegExp("^#(" + te + ")"),
                CLASS: new RegExp("^\\.(" + te + ")"),
                TAG: new RegExp("^(" + te + "|[*])"),
                ATTR: new RegExp("^" + ne),
                PSEUDO: new RegExp("^" + ie),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + ee + "*(even|odd|(([+-]|)(\\d*)n|)" + ee + "*(?:([+-]|)" + ee + "*(\\d+)|))" + ee + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + J + ")$", "i"),
                needsContext: new RegExp("^" + ee + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + ee + "*((?:-\\d)?\\d*)" + ee + "*\\)|)(?=[^-]|$)", "i")
            },
            he = /^(?:input|select|textarea|button)$/i,
            pe = /^h\d$/i,
            fe = /^[^{]+\{\s*\[native \w/,
            me = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            ge = /[+~]/,
            ve = /'|\\/g,
            ye = new RegExp("\\\\([\\da-f]{1,6}" + ee + "?|(" + ee + ")|.)", "ig"),
            be = function(e, t, n) {
                var i = "0x" + t - 65536;
                return i !== i || n ? t : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
            },
            we = function() {
                D()
            };
        try {
            K.apply(U = Q.call(H.childNodes), H.childNodes), U[H.childNodes.length].nodeType
        } catch (e) {
            K = {
                apply: U.length ? function(e, t) {
                    G.apply(e, Q.call(t))
                } : function(e, t) {
                    for (var n = e.length, i = 0; e[n++] = t[i++];);
                    e.length = n - 1
                }
            }
        }
        b = t.support = {}, x = t.isXML = function(e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return !!t && "HTML" !== t.nodeName
        }, D = t.setDocument = function(e) {
            var t, n, i = e ? e.ownerDocument || e : H;
            return i !== O && 9 === i.nodeType && i.documentElement ? (O = i, I = O.documentElement, $ = !x(O), (n = O.defaultView) && n.top !== n && (n.addEventListener ? n.addEventListener("unload", we, !1) : n.attachEvent && n.attachEvent("onunload", we)), b.attributes = o(function(e) {
                return e.className = "i", !e.getAttribute("className")
            }), b.getElementsByTagName = o(function(e) {
                return e.appendChild(O.createComment("")), !e.getElementsByTagName("*").length
            }), b.getElementsByClassName = fe.test(O.getElementsByClassName), b.getById = o(function(e) {
                return I.appendChild(e).id = j, !O.getElementsByName || !O.getElementsByName(j).length
            }), b.getById ? (w.find.ID = function(e, t) {
                if (void 0 !== t.getElementById && $) {
                    var n = t.getElementById(e);
                    return n ? [n] : []
                }
            }, w.filter.ID = function(e) {
                var t = e.replace(ye, be);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }) : (delete w.find.ID, w.filter.ID = function(e) {
                var t = e.replace(ye, be);
                return function(e) {
                    var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }), w.find.TAG = b.getElementsByTagName ? function(e, t) {
                return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : b.qsa ? t.querySelectorAll(e) : void 0
            } : function(e, t) {
                var n, i = [],
                    o = 0,
                    r = t.getElementsByTagName(e);
                if ("*" === e) {
                    for (; n = r[o++];) 1 === n.nodeType && i.push(n);
                    return i
                }
                return r
            }, w.find.CLASS = b.getElementsByClassName && function(e, t) {
                return void 0 !== t.getElementsByClassName && $ ? t.getElementsByClassName(e) : void 0
            }, N = [], L = [], (b.qsa = fe.test(O.querySelectorAll)) && (o(function(e) {
                I.appendChild(e).innerHTML = "<a id='" + j + "'></a><select id='" + j + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && L.push("[*^$]=" + ee + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || L.push("\\[" + ee + "*(?:value|" + J + ")"), e.querySelectorAll("[id~=" + j + "-]").length || L.push("~="), e.querySelectorAll(":checked").length || L.push(":checked"), e.querySelectorAll("a#" + j + "+*").length || L.push(".#.+[+~]")
            }), o(function(e) {
                var t = O.createElement("input");
                t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && L.push("name" + ee + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || L.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), L.push(",.*:")
            })), (b.matchesSelector = fe.test(M = I.matches || I.webkitMatchesSelector || I.mozMatchesSelector || I.oMatchesSelector || I.msMatchesSelector)) && o(function(e) {
                b.disconnectedMatch = M.call(e, "div"), M.call(e, "[s!='']:x"), N.push("!=", ie)
            }), L = L.length && new RegExp(L.join("|")), N = N.length && new RegExp(N.join("|")), t = fe.test(I.compareDocumentPosition), P = t || fe.test(I.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e,
                    i = t && t.parentNode;
                return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
            } : function(e, t) {
                if (t)
                    for (; t = t.parentNode;)
                        if (t === e) return !0;
                return !1
            }, Y = t ? function(e, t) {
                if (e === t) return A = !0, 0;
                var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return n || (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1, 1 & n || !b.sortDetached && t.compareDocumentPosition(e) === n ? e === O || e.ownerDocument === H && P(H, e) ? -1 : t === O || t.ownerDocument === H && P(H, t) ? 1 : E ? Z(E, e) - Z(E, t) : 0 : 4 & n ? -1 : 1)
            } : function(e, t) {
                if (e === t) return A = !0, 0;
                var n, i = 0,
                    o = e.parentNode,
                    r = t.parentNode,
                    a = [e],
                    l = [t];
                if (!o || !r) return e === O ? -1 : t === O ? 1 : o ? -1 : r ? 1 : E ? Z(E, e) - Z(E, t) : 0;
                if (o === r) return s(e, t);
                for (n = e; n = n.parentNode;) a.unshift(n);
                for (n = t; n = n.parentNode;) l.unshift(n);
                for (; a[i] === l[i];) i++;
                return i ? s(a[i], l[i]) : a[i] === H ? -1 : l[i] === H ? 1 : 0
            }, O) : O
        }, t.matches = function(e, n) {
            return t(e, null, null, n)
        }, t.matchesSelector = function(e, n) {
            if ((e.ownerDocument || e) !== O && D(e), n = n.replace(le, "='$1']"), b.matchesSelector && $ && !z[n + " "] && (!N || !N.test(n)) && (!L || !L.test(n))) try {
                var i = M.call(e, n);
                if (i || b.disconnectedMatch || e.document && 11 !== e.document.nodeType) return i
            } catch (e) {}
            return t(n, O, null, [e]).length > 0
        }, t.contains = function(e, t) {
            return (e.ownerDocument || e) !== O && D(e), P(e, t)
        }, t.attr = function(e, t) {
            (e.ownerDocument || e) !== O && D(e);
            var n = w.attrHandle[t.toLowerCase()],
                i = n && X.call(w.attrHandle, t.toLowerCase()) ? n(e, t, !$) : void 0;
            return void 0 !== i ? i : b.attributes || !$ ? e.getAttribute(t) : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }, t.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }, t.uniqueSort = function(e) {
            var t, n = [],
                i = 0,
                o = 0;
            if (A = !b.detectDuplicates, E = !b.sortStable && e.slice(0), e.sort(Y), A) {
                for (; t = e[o++];) t === e[o] && (i = n.push(o));
                for (; i--;) e.splice(n[i], 1)
            }
            return E = null, e
        }, _ = t.getText = function(e) {
            var t, n = "",
                i = 0,
                o = e.nodeType;
            if (o) {
                if (1 === o || 9 === o || 11 === o) {
                    if ("string" == typeof e.textContent) return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling) n += _(e)
                } else if (3 === o || 4 === o) return e.nodeValue
            } else
                for (; t = e[i++];) n += _(t);
            return n
        }, w = t.selectors = {
            cacheLength: 50,
            createPseudo: i,
            match: de,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(e) {
                    return e[1] = e[1].replace(ye, be), e[3] = (e[3] || e[4] || e[5] || "").replace(ye, be), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                },
                CHILD: function(e) {
                    return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || t.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && t.error(e[0]), e
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return de.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && ce.test(n) && (t = T(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(ye, be).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    } : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = q[e + " "];
                    return t || (t = new RegExp("(^|" + ee + ")" + e + "(" + ee + "|$)")) && q(e, function(e) {
                        return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                    })
                },
                ATTR: function(e, n, i) {
                    return function(o) {
                        var r = t.attr(o, e);
                        return null == r ? "!=" === n : !n || (r += "", "=" === n ? r === i : "!=" === n ? r !== i : "^=" === n ? i && 0 === r.indexOf(i) : "*=" === n ? i && r.indexOf(i) > -1 : "$=" === n ? i && r.slice(-i.length) === i : "~=" === n ? (" " + r.replace(oe, " ") + " ").indexOf(i) > -1 : "|=" === n && (r === i || r.slice(0, i.length + 1) === i + "-"))
                    }
                },
                CHILD: function(e, t, n, i, o) {
                    var r = "nth" !== e.slice(0, 3),
                        s = "last" !== e.slice(-4),
                        a = "of-type" === t;
                    return 1 === i && 0 === o ? function(e) {
                        return !!e.parentNode
                    } : function(t, n, l) {
                        var c, u, d, h, p, f, m = r !== s ? "nextSibling" : "previousSibling",
                            g = t.parentNode,
                            v = a && t.nodeName.toLowerCase(),
                            y = !l && !a,
                            b = !1;
                        if (g) {
                            if (r) {
                                for (; m;) {
                                    for (h = t; h = h[m];)
                                        if (a ? h.nodeName.toLowerCase() === v : 1 === h.nodeType) return !1;
                                    f = m = "only" === e && !f && "nextSibling"
                                }
                                return !0
                            }
                            if (f = [s ? g.firstChild : g.lastChild], s && y) {
                                for (h = g, d = h[j] || (h[j] = {}), u = d[h.uniqueID] || (d[h.uniqueID] = {}), c = u[e] || [], p = c[0] === F && c[1], b = p && c[2], h = p && g.childNodes[p]; h = ++p && h && h[m] || (b = p = 0) || f.pop();)
                                    if (1 === h.nodeType && ++b && h === t) {
                                        u[e] = [F, p, b];
                                        break
                                    }
                            } else if (y && (h = t, d = h[j] || (h[j] = {}), u = d[h.uniqueID] || (d[h.uniqueID] = {}), c = u[e] || [], p = c[0] === F && c[1], b = p), !1 === b)
                                for (;
                                    (h = ++p && h && h[m] || (b = p = 0) || f.pop()) && ((a ? h.nodeName.toLowerCase() !== v : 1 !== h.nodeType) || !++b || (y && (d = h[j] || (h[j] = {}), u = d[h.uniqueID] || (d[h.uniqueID] = {}), u[e] = [F, b]), h !== t)););
                            return (b -= o) === i || b % i == 0 && b / i >= 0
                        }
                    }
                },
                PSEUDO: function(e, n) {
                    var o, r = w.pseudos[e] || w.setFilters[e.toLowerCase()] || t.error("unsupported pseudo: " + e);
                    return r[j] ? r(n) : r.length > 1 ? (o = [e, e, "", n], w.setFilters.hasOwnProperty(e.toLowerCase()) ? i(function(e, t) {
                        for (var i, o = r(e, n), s = o.length; s--;) i = Z(e, o[s]), e[i] = !(t[i] = o[s])
                    }) : function(e) {
                        return r(e, 0, o)
                    }) : r
                }
            },
            pseudos: {
                not: i(function(e) {
                    var t = [],
                        n = [],
                        o = S(e.replace(re, "$1"));
                    return o[j] ? i(function(e, t, n, i) {
                        for (var r, s = o(e, null, i, []), a = e.length; a--;)(r = s[a]) && (e[a] = !(t[a] = r))
                    }) : function(e, i, r) {
                        return t[0] = e, o(t, null, r, n), t[0] = null, !n.pop()
                    }
                }),
                has: i(function(e) {
                    return function(n) {
                        return t(e, n).length > 0
                    }
                }),
                contains: i(function(e) {
                    return e = e.replace(ye, be),
                        function(t) {
                            return (t.textContent || t.innerText || _(t)).indexOf(e) > -1
                        }
                }),
                lang: i(function(e) {
                    return ue.test(e || "") || t.error("unsupported lang: " + e), e = e.replace(ye, be).toLowerCase(),
                        function(t) {
                            var n;
                            do {
                                if (n = $ ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                            } while ((t = t.parentNode) && 1 === t.nodeType);
                            return !1
                        }
                }),
                target: function(t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id
                },
                root: function(e) {
                    return e === I
                },
                focus: function(e) {
                    return e === O.activeElement && (!O.hasFocus || O.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: function(e) {
                    return !1 === e.disabled
                },
                disabled: function(e) {
                    return !0 === e.disabled
                },
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6) return !1;
                    return !0
                },
                parent: function(e) {
                    return !w.pseudos.empty(e)
                },
                header: function(e) {
                    return pe.test(e.nodeName)
                },
                input: function(e) {
                    return he.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: a(function() {
                    return [0]
                }),
                last: a(function(e, t) {
                    return [t - 1]
                }),
                eq: a(function(e, t, n) {
                    return [0 > n ? n + t : n]
                }),
                even: a(function(e, t) {
                    for (var n = 0; t > n; n += 2) e.push(n);
                    return e
                }),
                odd: a(function(e, t) {
                    for (var n = 1; t > n; n += 2) e.push(n);
                    return e
                }),
                lt: a(function(e, t, n) {
                    for (var i = 0 > n ? n + t : n; --i >= 0;) e.push(i);
                    return e
                }),
                gt: a(function(e, t, n) {
                    for (var i = 0 > n ? n + t : n; ++i < t;) e.push(i);
                    return e
                })
            }
        },
            w.pseudos.nth = w.pseudos.eq;
        for (y in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        }) w.pseudos[y] = function(e) {
            return function(t) {
                return "input" === t.nodeName.toLowerCase() && t.type === e
            }
        }(y);
        for (y in {
            submit: !0,
            reset: !0
        }) w.pseudos[y] = function(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }(y);
        return c.prototype = w.filters = w.pseudos, w.setFilters = new c, T = t.tokenize = function(e, n) {
            var i, o, r, s, a, l, c, u = W[e + " "];
            if (u) return n ? 0 : u.slice(0);
            for (a = e, l = [], c = w.preFilter; a;) {
                i && !(o = se.exec(a)) || (o && (a = a.slice(o[0].length) || a), l.push(r = [])), i = !1, (o = ae.exec(a)) && (i = o.shift(), r.push({
                    value: i,
                    type: o[0].replace(re, " ")
                }), a = a.slice(i.length));
                for (s in w.filter) !(o = de[s].exec(a)) || c[s] && !(o = c[s](o)) || (i = o.shift(), r.push({
                    value: i,
                    type: s,
                    matches: o
                }), a = a.slice(i.length));
                if (!i) break
            }
            return n ? a.length : a ? t.error(e) : W(e, l).slice(0)
        }, S = t.compile = function(e, t) {
            var n, i = [],
                o = [],
                r = z[e + " "];
            if (!r) {
                for (t || (t = T(e)), n = t.length; n--;) r = g(t[n]), r[j] ? i.push(r) : o.push(r);
                r = z(e, v(o, i)), r.selector = e
            }
            return r
        }, C = t.select = function(e, t, n, i) {
            var o, r, s, a, c, d = "function" == typeof e && e,
                h = !i && T(e = d.selector || e);
            if (n = n || [], 1 === h.length) {
                if (r = h[0] = h[0].slice(0), r.length > 2 && "ID" === (s = r[0]).type && b.getById && 9 === t.nodeType && $ && w.relative[r[1].type]) {
                    if (!(t = (w.find.ID(s.matches[0].replace(ye, be), t) || [])[0])) return n;
                    d && (t = t.parentNode), e = e.slice(r.shift().value.length)
                }
                for (o = de.needsContext.test(e) ? 0 : r.length; o-- && (s = r[o], !w.relative[a = s.type]);)
                    if ((c = w.find[a]) && (i = c(s.matches[0].replace(ye, be), ge.test(r[0].type) && l(t.parentNode) || t))) {
                        if (r.splice(o, 1), !(e = i.length && u(r))) return K.apply(n, i), n;
                        break
                    }
            }
            return (d || S(e, h))(i, t, !$, n, !t || ge.test(e) && l(t.parentNode) || t), n
        }, b.sortStable = j.split("").sort(Y).join("") === j, b.detectDuplicates = !!A, D(), b.sortDetached = o(function(e) {
            return 1 & e.compareDocumentPosition(O.createElement("div"))
        }), o(function(e) {
            return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
        }) || r("type|href|height|width", function(e, t, n) {
            return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }), b.attributes && o(function(e) {
            return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
        }) || r("value", function(e, t, n) {
            return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
        }), o(function(e) {
            return null == e.getAttribute("disabled")
        }) || r(J, function(e, t, n) {
            var i;
            return n ? void 0 : !0 === e[t] ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }), t
    }(e);
    re.find = ue, re.expr = ue.selectors, re.expr[":"] = re.expr.pseudos, re.uniqueSort = re.unique = ue.uniqueSort, re.text = ue.getText, re.isXMLDoc = ue.isXML, re.contains = ue.contains;
    var de = function(e, t, n) {
            for (var i = [], o = void 0 !== n;
                 (e = e[t]) && 9 !== e.nodeType;)
                if (1 === e.nodeType) {
                    if (o && re(e).is(n)) break;
                    i.push(e)
                }
            return i
        },
        he = function(e, t) {
            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n
        },
        pe = re.expr.match.needsContext,
        fe = /^<([\w-]+)\s*\/?>(?:<\/\1>|)$/,
        me = /^.[^:#\[\.,]*$/;
    re.filter = function(e, t, n) {
        var i = t[0];
        return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? re.find.matchesSelector(i, e) ? [i] : [] : re.find.matches(e, re.grep(t, function(e) {
            return 1 === e.nodeType
        }))
    }, re.fn.extend({
        find: function(e) {
            var t, n = this.length,
                i = [],
                o = this;
            if ("string" != typeof e) return this.pushStack(re(e).filter(function() {
                for (t = 0; n > t; t++)
                    if (re.contains(o[t], this)) return !0
            }));
            for (t = 0; n > t; t++) re.find(e, o[t], i);
            return i = this.pushStack(n > 1 ? re.unique(i) : i), i.selector = this.selector ? this.selector + " " + e : e, i
        },
        filter: function(e) {
            return this.pushStack(i(this, e || [], !1))
        },
        not: function(e) {
            return this.pushStack(i(this, e || [], !0))
        },
        is: function(e) {
            return !!i(this, "string" == typeof e && pe.test(e) ? re(e) : e || [], !1).length
        }
    });
    var ge, ve = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/;
    (re.fn.init = function(e, t, n) {
        var i, o;
        if (!e) return this;
        if (n = n || ge, "string" == typeof e) {
            if (!(i = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : ve.exec(e)) || !i[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
            if (i[1]) {
                if (t = t instanceof re ? t[0] : t, re.merge(this, re.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : G, !0)), fe.test(i[1]) && re.isPlainObject(t))
                    for (i in t) re.isFunction(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
                return this
            }
            return o = G.getElementById(i[2]), o && o.parentNode && (this.length = 1, this[0] = o), this.context = G, this.selector = e, this
        }
        return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : re.isFunction(e) ? void 0 !== n.ready ? n.ready(e) : e(re) : (void 0 !== e.selector && (this.selector = e.selector, this.context = e.context), re.makeArray(e, this))
    }).prototype = re.fn, ge = re(G);
    var ye = /^(?:parents|prev(?:Until|All))/,
        be = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    re.fn.extend({
        has: function(e) {
            var t = re(e, this),
                n = t.length;
            return this.filter(function() {
                for (var e = 0; n > e; e++)
                    if (re.contains(this, t[e])) return !0
            })
        },
        closest: function(e, t) {
            for (var n, i = 0, o = this.length, r = [], s = pe.test(e) || "string" != typeof e ? re(e, t || this.context) : 0; o > i; i++)
                for (n = this[i]; n && n !== t; n = n.parentNode)
                    if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && re.find.matchesSelector(n, e))) {
                        r.push(n);
                        break
                    }
            return this.pushStack(r.length > 1 ? re.uniqueSort(r) : r)
        },
        index: function(e) {
            return e ? "string" == typeof e ? J.call(re(e), this[0]) : J.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            return this.pushStack(re.uniqueSort(re.merge(this.get(), re(e, t))))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }), re.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return de(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return de(e, "parentNode", n)
        },
        next: function(e) {
            return o(e, "nextSibling")
        },
        prev: function(e) {
            return o(e, "previousSibling")
        },
        nextAll: function(e) {
            return de(e, "nextSibling")
        },
        prevAll: function(e) {
            return de(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return de(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return de(e, "previousSibling", n)
        },
        siblings: function(e) {
            return he((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return he(e.firstChild)
        },
        contents: function(e) {
            return e.contentDocument || re.merge([], e.childNodes)
        }
    }, function(e, t) {
        re.fn[e] = function(n, i) {
            var o = re.map(this, t, n);
            return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (o = re.filter(i, o)), this.length > 1 && (be[e] || re.uniqueSort(o), ye.test(e) && o.reverse()), this.pushStack(o)
        }
    });
    var we = /\S+/g;
    re.Callbacks = function(e) {
        e = "string" == typeof e ? r(e) : re.extend({}, e);
        var t, n, i, o, s = [],
            a = [],
            l = -1,
            c = function() {
                for (o = e.once, i = t = !0; a.length; l = -1)
                    for (n = a.shift(); ++l < s.length;) !1 === s[l].apply(n[0], n[1]) && e.stopOnFalse && (l = s.length, n = !1);
                e.memory || (n = !1), t = !1, o && (s = n ? [] : "")
            },
            u = {
                add: function() {
                    return s && (n && !t && (l = s.length - 1, a.push(n)), function t(n) {
                        re.each(n, function(n, i) {
                            re.isFunction(i) ? e.unique && u.has(i) || s.push(i) : i && i.length && "string" !== re.type(i) && t(i)
                        })
                    }(arguments), n && !t && c()), this
                },
                remove: function() {
                    return re.each(arguments, function(e, t) {
                        for (var n;
                             (n = re.inArray(t, s, n)) > -1;) s.splice(n, 1), l >= n && l--
                    }), this
                },
                has: function(e) {
                    return e ? re.inArray(e, s) > -1 : s.length > 0
                },
                empty: function() {
                    return s && (s = []), this
                },
                disable: function() {
                    return o = a = [], s = n = "", this
                },
                disabled: function() {
                    return !s
                },
                lock: function() {
                    return o = a = [], n || (s = n = ""), this
                },
                locked: function() {
                    return !!o
                },
                fireWith: function(e, n) {
                    return o || (n = n || [], n = [e, n.slice ? n.slice() : n], a.push(n), t || c()), this
                },
                fire: function() {
                    return u.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!i
                }
            };
        return u
    }, re.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", re.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", re.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", re.Callbacks("memory")]
                ],
                n = "pending",
                i = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return o.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return re.Deferred(function(n) {
                            re.each(t, function(t, r) {
                                var s = re.isFunction(e[t]) && e[t];
                                o[r[1]](function() {
                                    var e = s && s.apply(this, arguments);
                                    e && re.isFunction(e.promise) ? e.promise().progress(n.notify).done(n.resolve).fail(n.reject) : n[r[0] + "With"](this === i ? n.promise() : this, s ? [e] : arguments)
                                })
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? re.extend(e, i) : i
                    }
                },
                o = {};
            return i.pipe = i.then, re.each(t, function(e, r) {
                var s = r[2],
                    a = r[3];
                i[r[1]] = s.add, a && s.add(function() {
                    n = a
                }, t[1 ^ e][2].disable, t[2][2].lock), o[r[0]] = function() {
                    return o[r[0] + "With"](this === o ? i : this, arguments), this
                }, o[r[0] + "With"] = s.fireWith
            }), i.promise(o), e && e.call(o, o), o
        },
        when: function(e) {
            var t, n, i, o = 0,
                r = K.call(arguments),
                s = r.length,
                a = 1 !== s || e && re.isFunction(e.promise) ? s : 0,
                l = 1 === a ? e : re.Deferred(),
                c = function(e, n, i) {
                    return function(o) {
                        n[e] = this, i[e] = arguments.length > 1 ? K.call(arguments) : o, i === t ? l.notifyWith(n, i) : --a || l.resolveWith(n, i)
                    }
                };
            if (s > 1)
                for (t = new Array(s), n = new Array(s), i = new Array(s); s > o; o++) r[o] && re.isFunction(r[o].promise) ? r[o].promise().progress(c(o, n, t)).done(c(o, i, r)).fail(l.reject) : --a;
            return a || l.resolveWith(i, r), l.promise()
        }
    });
    var _e;
    re.fn.ready = function(e) {
        return re.ready.promise().done(e), this
    }, re.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? re.readyWait++ : re.ready(!0)
        },
        ready: function(e) {
            (!0 === e ? --re.readyWait : re.isReady) || (re.isReady = !0, !0 !== e && --re.readyWait > 0 || (_e.resolveWith(G, [re]), re.fn.triggerHandler && (re(G).triggerHandler("ready"), re(G).off("ready"))))
        }
    }), re.ready.promise = function(t) {
        return _e || (_e = re.Deferred(), "complete" === G.readyState || "loading" !== G.readyState && !G.documentElement.doScroll ? e.setTimeout(re.ready) : (G.addEventListener("DOMContentLoaded", s), e.addEventListener("load", s))), _e.promise(t)
    }, re.ready.promise();
    var xe = function(e, t, n, i, o, r, s) {
            var a = 0,
                l = e.length,
                c = null == n;
            if ("object" === re.type(n)) {
                o = !0;
                for (a in n) xe(e, t, a, n[a], !0, r, s)
            } else if (void 0 !== i && (o = !0, re.isFunction(i) || (s = !0), c && (s ? (t.call(e, i), t = null) : (c = t, t = function(e, t, n) {
                    return c.call(re(e), n)
                })), t))
                for (; l > a; a++) t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)));
            return o ? e : c ? t.call(e) : l ? t(e[0], n) : r
        },
        Te = function(e) {
            return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
        };
    a.uid = 1, a.prototype = {
        register: function(e, t) {
            var n = t || {};
            return e.nodeType ? e[this.expando] = n : Object.defineProperty(e, this.expando, {
                value: n,
                writable: !0,
                configurable: !0
            }), e[this.expando]
        },
        cache: function(e) {
            if (!Te(e)) return {};
            var t = e[this.expando];
            return t || (t = {}, Te(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                value: t,
                configurable: !0
            }))), t
        },
        set: function(e, t, n) {
            var i, o = this.cache(e);
            if ("string" == typeof t) o[t] = n;
            else
                for (i in t) o[i] = t[i];
            return o
        },
        get: function(e, t) {
            return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][t]
        },
        access: function(e, t, n) {
            var i;
            return void 0 === t || t && "string" == typeof t && void 0 === n ? (i = this.get(e, t), void 0 !== i ? i : this.get(e, re.camelCase(t))) : (this.set(e, t, n), void 0 !== n ? n : t)
        },
        remove: function(e, t) {
            var n, i, o, r = e[this.expando];
            if (void 0 !== r) {
                if (void 0 === t) this.register(e);
                else {
                    re.isArray(t) ? i = t.concat(t.map(re.camelCase)) : (o = re.camelCase(t), t in r ? i = [t, o] : (i = o, i = i in r ? [i] : i.match(we) || [])), n = i.length;
                    for (; n--;) delete r[i[n]]
                }(void 0 === t || re.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
            }
        },
        hasData: function(e) {
            var t = e[this.expando];
            return void 0 !== t && !re.isEmptyObject(t)
        }
    };
    var Se = new a,
        Ce = new a,
        ke = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Ee = /[A-Z]/g;
    re.extend({
        hasData: function(e) {
            return Ce.hasData(e) || Se.hasData(e)
        },
        data: function(e, t, n) {
            return Ce.access(e, t, n)
        },
        removeData: function(e, t) {
            Ce.remove(e, t)
        },
        _data: function(e, t, n) {
            return Se.access(e, t, n)
        },
        _removeData: function(e, t) {
            Se.remove(e, t)
        }
    }), re.fn.extend({
        data: function(e, t) {
            var n, i, o, r = this[0],
                s = r && r.attributes;
            if (void 0 === e) {
                if (this.length && (o = Ce.get(r), 1 === r.nodeType && !Se.get(r, "hasDataAttrs"))) {
                    for (n = s.length; n--;) s[n] && (i = s[n].name, 0 === i.indexOf("data-") && (i = re.camelCase(i.slice(5)), l(r, i, o[i])));
                    Se.set(r, "hasDataAttrs", !0)
                }
                return o
            }
            return "object" == typeof e ? this.each(function() {
                Ce.set(this, e)
            }) : xe(this, function(t) {
                var n, i;
                if (r && void 0 === t) {
                    if (void 0 !== (n = Ce.get(r, e) || Ce.get(r, e.replace(Ee, "-$&").toLowerCase()))) return n;
                    if (i = re.camelCase(e), void 0 !== (n = Ce.get(r, i))) return n;
                    if (void 0 !== (n = l(r, i, void 0))) return n
                } else i = re.camelCase(e), this.each(function() {
                    var n = Ce.get(this, i);
                    Ce.set(this, i, t), e.indexOf("-") > -1 && void 0 !== n && Ce.set(this, e, t)
                })
            }, null, t, arguments.length > 1, null, !0)
        },
        removeData: function(e) {
            return this.each(function() {
                Ce.remove(this, e)
            })
        }
    }), re.extend({
        queue: function(e, t, n) {
            var i;
            return e ? (t = (t || "fx") + "queue", i = Se.get(e, t), n && (!i || re.isArray(n) ? i = Se.access(e, t, re.makeArray(n)) : i.push(n)), i || []) : void 0
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = re.queue(e, t),
                i = n.length,
                o = n.shift(),
                r = re._queueHooks(e, t),
                s = function() {
                    re.dequeue(e, t)
                };
            "inprogress" === o && (o = n.shift(), i--), o && ("fx" === t && n.unshift("inprogress"), delete r.stop, o.call(e, s, r)), !i && r && r.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return Se.get(e, n) || Se.access(e, n, {
                empty: re.Callbacks("once memory").add(function() {
                    Se.remove(e, [t + "queue", n])
                })
            })
        }
    }), re.fn.extend({
        queue: function(e, t) {
            var n = 2;
            return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? re.queue(this[0], e) : void 0 === t ? this : this.each(function() {
                var n = re.queue(this, e, t);
                re._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && re.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                re.dequeue(this, e)
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, t) {
            var n, i = 1,
                o = re.Deferred(),
                r = this,
                s = this.length,
                a = function() {
                    --i || o.resolveWith(r, [r])
                };
            for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; s--;)(n = Se.get(r[s], e + "queueHooks")) && n.empty && (i++, n.empty.add(a));
            return a(), o.promise(t)
        }
    });
    var Ae = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        De = new RegExp("^(?:([+-])=|)(" + Ae + ")([a-z%]*)$", "i"),
        Oe = ["Top", "Right", "Bottom", "Left"],
        Ie = function(e, t) {
            return e = t || e, "none" === re.css(e, "display") || !re.contains(e.ownerDocument, e)
        },
        $e = /^(?:checkbox|radio)$/i,
        Le = /<([\w:-]+)/,
        Ne = /^$|\/(?:java|ecma)script/i,
        Me = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""]
        };
    Me.optgroup = Me.option, Me.tbody = Me.tfoot = Me.colgroup = Me.caption = Me.thead, Me.th = Me.td;
    var Pe = /<|&#?\w+;/;
    ! function() {
        var e = G.createDocumentFragment(),
            t = e.appendChild(G.createElement("div")),
            n = G.createElement("input");
        n.setAttribute("type", "radio"), n.setAttribute("checked", "checked"), n.setAttribute("name", "t"), t.appendChild(n), ie.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked, t.innerHTML = "<textarea>x</textarea>", ie.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue
    }();
    var je = /^key/,
        He = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        Fe = /^([^.]*)(?:\.(.+)|)/;
    re.event = {
        global: {},
        add: function(e, t, n, i, o) {
            var r, s, a, l, c, u, d, h, p, f, m, g = Se.get(e);
            if (g)
                for (n.handler && (r = n, n = r.handler, o = r.selector), n.guid || (n.guid = re.guid++), (l = g.events) || (l = g.events = {}), (s = g.handle) || (s = g.handle = function(t) {
                    return void 0 !== re && re.event.triggered !== t.type ? re.event.dispatch.apply(e, arguments) : void 0
                }), t = (t || "").match(we) || [""], c = t.length; c--;) a = Fe.exec(t[c]) || [], p = m = a[1], f = (a[2] || "").split(".").sort(), p && (d = re.event.special[p] || {}, p = (o ? d.delegateType : d.bindType) || p, d = re.event.special[p] || {}, u = re.extend({
                    type: p,
                    origType: m,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: o,
                    needsContext: o && re.expr.match.needsContext.test(o),
                    namespace: f.join(".")
                }, r), (h = l[p]) || (h = l[p] = [], h.delegateCount = 0, d.setup && !1 !== d.setup.call(e, i, f, s) || e.addEventListener && e.addEventListener(p, s)), d.add && (d.add.call(e, u), u.handler.guid || (u.handler.guid = n.guid)), o ? h.splice(h.delegateCount++, 0, u) : h.push(u), re.event.global[p] = !0)
        },
        remove: function(e, t, n, i, o) {
            var r, s, a, l, c, u, d, h, p, f, m, g = Se.hasData(e) && Se.get(e);
            if (g && (l = g.events)) {
                for (t = (t || "").match(we) || [""], c = t.length; c--;)
                    if (a = Fe.exec(t[c]) || [], p = m = a[1], f = (a[2] || "").split(".").sort(), p) {
                        for (d = re.event.special[p] || {}, p = (i ? d.delegateType : d.bindType) || p, h = l[p] || [], a = a[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = r = h.length; r--;) u = h[r], !o && m !== u.origType || n && n.guid !== u.guid || a && !a.test(u.namespace) || i && i !== u.selector && ("**" !== i || !u.selector) || (h.splice(r, 1), u.selector && h.delegateCount--, d.remove && d.remove.call(e, u));
                        s && !h.length && (d.teardown && !1 !== d.teardown.call(e, f, g.handle) || re.removeEvent(e, p, g.handle), delete l[p])
                    } else
                        for (p in l) re.event.remove(e, p + t[c], n, i, !0);
                re.isEmptyObject(l) && Se.remove(e, "handle events")
            }
        },
        dispatch: function(e) {
            e = re.event.fix(e);
            var t, n, i, o, r, s = [],
                a = K.call(arguments),
                l = (Se.get(this, "events") || {})[e.type] || [],
                c = re.event.special[e.type] || {};
            if (a[0] = e, e.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, e)) {
                for (s = re.event.handlers.call(this, e, l), t = 0;
                     (o = s[t++]) && !e.isPropagationStopped();)
                    for (e.currentTarget = o.elem, n = 0;
                         (r = o.handlers[n++]) && !e.isImmediatePropagationStopped();) e.rnamespace && !e.rnamespace.test(r.namespace) || (e.handleObj = r, e.data = r.data, void 0 !== (i = ((re.event.special[r.origType] || {}).handle || r.handler).apply(o.elem, a)) && !1 === (e.result = i) && (e.preventDefault(), e.stopPropagation()));
                return c.postDispatch && c.postDispatch.call(this, e), e.result
            }
        },
        handlers: function(e, t) {
            var n, i, o, r, s = [],
                a = t.delegateCount,
                l = e.target;
            if (a && l.nodeType && ("click" !== e.type || isNaN(e.button) || e.button < 1))
                for (; l !== this; l = l.parentNode || this)
                    if (1 === l.nodeType && (!0 !== l.disabled || "click" !== e.type)) {
                        for (i = [], n = 0; a > n; n++) r = t[n], o = r.selector + " ", void 0 === i[o] && (i[o] = r.needsContext ? re(o, this).index(l) > -1 : re.find(o, this, null, [l]).length), i[o] && i.push(r);
                        i.length && s.push({
                            elem: l,
                            handlers: i
                        })
                    }
            return a < t.length && s.push({
                elem: this,
                handlers: t.slice(a)
            }), s
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget detail eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, t) {
                var n, i, o, r = t.button;
                return null == e.pageX && null != t.clientX && (n = e.target.ownerDocument || G, i = n.documentElement, o = n.body, e.pageX = t.clientX + (i && i.scrollLeft || o && o.scrollLeft || 0) - (i && i.clientLeft || o && o.clientLeft || 0), e.pageY = t.clientY + (i && i.scrollTop || o && o.scrollTop || 0) - (i && i.clientTop || o && o.clientTop || 0)), e.which || void 0 === r || (e.which = 1 & r ? 1 : 2 & r ? 3 : 4 & r ? 2 : 0), e
            }
        },
        fix: function(e) {
            if (e[re.expando]) return e;
            var t, n, i, o = e.type,
                r = e,
                s = this.fixHooks[o];
            for (s || (this.fixHooks[o] = s = He.test(o) ? this.mouseHooks : je.test(o) ? this.keyHooks : {}), i = s.props ? this.props.concat(s.props) : this.props, e = new re.Event(r), t = i.length; t--;) n = i[t], e[n] = r[n];
            return e.target || (e.target = G), 3 === e.target.nodeType && (e.target = e.target.parentNode), s.filter ? s.filter(e, r) : e
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    return this !== m() && this.focus ? (this.focus(), !1) : void 0
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === m() && this.blur ? (this.blur(), !1) : void 0
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return "checkbox" === this.type && this.click && re.nodeName(this, "input") ? (this.click(), !1) : void 0
                },
                _default: function(e) {
                    return re.nodeName(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                }
            }
        }
    }, re.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n)
    }, re.Event = function(e, t) {
        return this instanceof re.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? p : f) : this.type = e, t && re.extend(this, t), this.timeStamp = e && e.timeStamp || re.now(), void(this[re.expando] = !0)) : new re.Event(e, t)
    }, re.Event.prototype = {
        constructor: re.Event,
        isDefaultPrevented: f,
        isPropagationStopped: f,
        isImmediatePropagationStopped: f,
        isSimulated: !1,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = p, e && !this.isSimulated && e.preventDefault()
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = p, e && !this.isSimulated && e.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = p, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
        }
    }, re.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function(e, t) {
        re.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, i = this,
                    o = e.relatedTarget,
                    r = e.handleObj;
                return o && (o === i || re.contains(i, o)) || (e.type = r.origType, n = r.handler.apply(this, arguments), e.type = t), n
            }
        }
    }), re.fn.extend({
        on: function(e, t, n, i) {
            return g(this, e, t, n, i)
        },
        one: function(e, t, n, i) {
            return g(this, e, t, n, i, 1)
        },
        off: function(e, t, n) {
            var i, o;
            if (e && e.preventDefault && e.handleObj) return i = e.handleObj, re(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
            if ("object" == typeof e) {
                for (o in e) this.off(o, t, e[o]);
                return this
            }
            return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = f), this.each(function() {
                re.event.remove(this, e, n, t)
            })
        }
    });
    var Re = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:-]+)[^>]*)\/>/gi,
        qe = /<script|<style|<link/i,
        We = /checked\s*(?:[^=]|=\s*.checked.)/i,
        ze = /^true\/(.*)/,
        Ye = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    re.extend({
        htmlPrefilter: function(e) {
            return e.replace(Re, "<$1></$2>")
        },
        clone: function(e, t, n) {
            var i, o, r, s, a = e.cloneNode(!0),
                l = re.contains(e.ownerDocument, e);
            if (!(ie.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || re.isXMLDoc(e)))
                for (s = u(a), r = u(e), i = 0, o = r.length; o > i; i++) _(r[i], s[i]);
            if (t)
                if (n)
                    for (r = r || u(e), s = s || u(a), i = 0, o = r.length; o > i; i++) w(r[i], s[i]);
                else w(e, a);
            return s = u(a, "script"), s.length > 0 && d(s, !l && u(e, "script")), a
        },
        cleanData: function(e) {
            for (var t, n, i, o = re.event.special, r = 0; void 0 !== (n = e[r]); r++)
                if (Te(n)) {
                    if (t = n[Se.expando]) {
                        if (t.events)
                            for (i in t.events) o[i] ? re.event.remove(n, i) : re.removeEvent(n, i, t.handle);
                        n[Se.expando] = void 0
                    }
                    n[Ce.expando] && (n[Ce.expando] = void 0)
                }
        }
    }), re.fn.extend({
        domManip: x,
        detach: function(e) {
            return T(this, e, !0)
        },
        remove: function(e) {
            return T(this, e)
        },
        text: function(e) {
            return xe(this, function(e) {
                return void 0 === e ? re.text(this) : this.empty().each(function() {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                })
            }, null, e, arguments.length)
        },
        append: function() {
            return x(this, arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    v(this, e).appendChild(e)
                }
            })
        },
        prepend: function() {
            return x(this, arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = v(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return x(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return x(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (re.cleanData(u(e, !1)), e.textContent = "");
            return this
        },
        clone: function(e, t) {
            return e = null != e && e, t = null == t ? e : t, this.map(function() {
                return re.clone(this, e, t)
            })
        },
        html: function(e) {
            return xe(this, function(e) {
                var t = this[0] || {},
                    n = 0,
                    i = this.length;
                if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                if ("string" == typeof e && !qe.test(e) && !Me[(Le.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = re.htmlPrefilter(e);
                    try {
                        for (; i > n; n++) t = this[n] || {}, 1 === t.nodeType && (re.cleanData(u(t, !1)), t.innerHTML = e);
                        t = 0
                    } catch (e) {}
                }
                t && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = [];
            return x(this, arguments, function(t) {
                var n = this.parentNode;
                re.inArray(this, e) < 0 && (re.cleanData(u(this)), n && n.replaceChild(t, this))
            }, e)
        }
    }), re.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        re.fn[e] = function(e) {
            for (var n, i = [], o = re(e), r = o.length - 1, s = 0; r >= s; s++) n = s === r ? this : this.clone(!0), re(o[s])[t](n), Z.apply(i, n.get());
            return this.pushStack(i)
        }
    });
    var Be, Xe = {
            HTML: "block",
            BODY: "block"
        },
        Ue = /^margin/,
        Ve = new RegExp("^(" + Ae + ")(?!px)[a-z%]+$", "i"),
        Ge = function(t) {
            var n = t.ownerDocument.defaultView;
            return n && n.opener || (n = e), n.getComputedStyle(t)
        },
        Ke = function(e, t, n, i) {
            var o, r, s = {};
            for (r in t) s[r] = e.style[r], e.style[r] = t[r];
            o = n.apply(e, i || []);
            for (r in t) e.style[r] = s[r];
            return o
        },
        Qe = G.documentElement;
    ! function() {
        function t() {
            a.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", a.innerHTML = "", Qe.appendChild(s);
            var t = e.getComputedStyle(a);
            n = "1%" !== t.top, r = "2px" === t.marginLeft, i = "4px" === t.width, a.style.marginRight = "50%", o = "4px" === t.marginRight, Qe.removeChild(s)
        }
        var n, i, o, r, s = G.createElement("div"),
            a = G.createElement("div");
        a.style && (a.style.backgroundClip = "content-box", a.cloneNode(!0).style.backgroundClip = "", ie.clearCloneStyle = "content-box" === a.style.backgroundClip, s.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", s.appendChild(a), re.extend(ie, {
            pixelPosition: function() {
                return t(), n
            },
            boxSizingReliable: function() {
                return null == i && t(), i
            },
            pixelMarginRight: function() {
                return null == i && t(), o
            },
            reliableMarginLeft: function() {
                return null == i && t(), r
            },
            reliableMarginRight: function() {
                var t, n = a.appendChild(G.createElement("div"));
                return n.style.cssText = a.style.cssText = "-webkit-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", n.style.marginRight = n.style.width = "0", a.style.width = "1px", Qe.appendChild(s), t = !parseFloat(e.getComputedStyle(n).marginRight), Qe.removeChild(s), a.removeChild(n), t
            }
        }))
    }();
    var Ze = /^(none|table(?!-c[ea]).+)/,
        Je = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        et = {
            letterSpacing: "0",
            fontWeight: "400"
        },
        tt = ["Webkit", "O", "Moz", "ms"],
        nt = G.createElement("div").style;
    re.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = k(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            float: "cssFloat"
        },
        style: function(e, t, n, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o, r, s, a = re.camelCase(t),
                    l = e.style;
                return t = re.cssProps[a] || (re.cssProps[a] = A(a) || a), s = re.cssHooks[t] || re.cssHooks[a], void 0 === n ? s && "get" in s && void 0 !== (o = s.get(e, !1, i)) ? o : l[t] : (r = typeof n, "string" === r && (o = De.exec(n)) && o[1] && (n = c(e, t, o), r = "number"), void(null != n && n === n && ("number" === r && (n += o && o[3] || (re.cssNumber[a] ? "" : "px")), ie.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), s && "set" in s && void 0 === (n = s.set(e, n, i)) || (l[t] = n))))
            }
        },
        css: function(e, t, n, i) {
            var o, r, s, a = re.camelCase(t);
            return t = re.cssProps[a] || (re.cssProps[a] = A(a) || a), s = re.cssHooks[t] || re.cssHooks[a], s && "get" in s && (o = s.get(e, !0, n)), void 0 === o && (o = k(e, t, i)), "normal" === o && t in et && (o = et[t]), "" === n || n ? (r = parseFloat(o), !0 === n || isFinite(r) ? r || 0 : o) : o
        }
    }), re.each(["height", "width"], function(e, t) {
        re.cssHooks[t] = {
            get: function(e, n, i) {
                return n ? Ze.test(re.css(e, "display")) && 0 === e.offsetWidth ? Ke(e, Je, function() {
                    return I(e, t, i)
                }) : I(e, t, i) : void 0
            },
            set: function(e, n, i) {
                var o, r = i && Ge(e),
                    s = i && O(e, t, i, "border-box" === re.css(e, "boxSizing", !1, r), r);
                return s && (o = De.exec(n)) && "px" !== (o[3] || "px") && (e.style[t] = n, n = re.css(e, t)), D(e, n, s)
            }
        }
    }), re.cssHooks.marginLeft = E(ie.reliableMarginLeft, function(e, t) {
        return t ? (parseFloat(k(e, "marginLeft")) || e.getBoundingClientRect().left - Ke(e, {
            marginLeft: 0
        }, function() {
            return e.getBoundingClientRect().left
        })) + "px" : void 0
    }), re.cssHooks.marginRight = E(ie.reliableMarginRight, function(e, t) {
        return t ? Ke(e, {
            display: "inline-block"
        }, k, [e, "marginRight"]) : void 0
    }), re.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        re.cssHooks[e + t] = {
            expand: function(n) {
                for (var i = 0, o = {}, r = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++) o[e + Oe[i] + t] = r[i] || r[i - 2] || r[0];
                return o
            }
        }, Ue.test(e) || (re.cssHooks[e + t].set = D)
    }), re.fn.extend({
        css: function(e, t) {
            return xe(this, function(e, t, n) {
                var i, o, r = {},
                    s = 0;
                if (re.isArray(t)) {
                    for (i = Ge(e), o = t.length; o > s; s++) r[t[s]] = re.css(e, t[s], !1, i);
                    return r
                }
                return void 0 !== n ? re.style(e, t, n) : re.css(e, t)
            }, e, t, arguments.length > 1)
        },
        show: function() {
            return $(this, !0)
        },
        hide: function() {
            return $(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                Ie(this) ? re(this).show() : re(this).hide()
            })
        }
    }), re.Tween = L, L.prototype = {
        constructor: L,
        init: function(e, t, n, i, o, r) {
            this.elem = e, this.prop = n, this.easing = o || re.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = r || (re.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = L.propHooks[this.prop];
            return e && e.get ? e.get(this) : L.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = L.propHooks[this.prop];
            return this.options.duration ? this.pos = t = re.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : L.propHooks._default.set(this), this
        }
    }, L.prototype.init.prototype = L.prototype, L.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = re.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0)
            },
            set: function(e) {
                re.fx.step[e.prop] ? re.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[re.cssProps[e.prop]] && !re.cssHooks[e.prop] ? e.elem[e.prop] = e.now : re.style(e.elem, e.prop, e.now + e.unit)
            }
        }
    }, L.propHooks.scrollTop = L.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, re.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        },
        _default: "swing"
    }, re.fx = L.prototype.init, re.fx.step = {};
    var it, ot, rt = /^(?:toggle|show|hide)$/,
        st = /queueHooks$/;
    re.Animation = re.extend(F, {
        tweeners: {
            "*": [function(e, t) {
                var n = this.createTween(e, t);
                return c(n.elem, e, De.exec(t), n), n
            }]
        },
        tweener: function(e, t) {
            re.isFunction(e) ? (t = e, e = ["*"]) : e = e.match(we);
            for (var n, i = 0, o = e.length; o > i; i++) n = e[i], F.tweeners[n] = F.tweeners[n] || [], F.tweeners[n].unshift(t)
        },
        prefilters: [j],
        prefilter: function(e, t) {
            t ? F.prefilters.unshift(e) : F.prefilters.push(e)
        }
    }), re.speed = function(e, t, n) {
        var i = e && "object" == typeof e ? re.extend({}, e) : {
            complete: n || !n && t || re.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !re.isFunction(t) && t
        };
        return i.duration = re.fx.off ? 0 : "number" == typeof i.duration ? i.duration : i.duration in re.fx.speeds ? re.fx.speeds[i.duration] : re.fx.speeds._default, null != i.queue && !0 !== i.queue || (i.queue = "fx"), i.old = i.complete, i.complete = function() {
            re.isFunction(i.old) && i.old.call(this), i.queue && re.dequeue(this, i.queue)
        }, i
    }, re.fn.extend({
        fadeTo: function(e, t, n, i) {
            return this.filter(Ie).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, i)
        },
        animate: function(e, t, n, i) {
            var o = re.isEmptyObject(e),
                r = re.speed(t, n, i),
                s = function() {
                    var t = F(this, re.extend({}, e), r);
                    (o || Se.get(this, "finish")) && t.stop(!0)
                };
            return s.finish = s, o || !1 === r.queue ? this.each(s) : this.queue(r.queue, s)
        },
        stop: function(e, t, n) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(n)
            };
            return "string" != typeof e && (n = t, t = e, e = void 0), t && !1 !== e && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    o = null != e && e + "queueHooks",
                    r = re.timers,
                    s = Se.get(this);
                if (o) s[o] && s[o].stop && i(s[o]);
                else
                    for (o in s) s[o] && s[o].stop && st.test(o) && i(s[o]);
                for (o = r.length; o--;) r[o].elem !== this || null != e && r[o].queue !== e || (r[o].anim.stop(n), t = !1, r.splice(o, 1));
                !t && n || re.dequeue(this, e)
            })
        },
        finish: function(e) {
            return !1 !== e && (e = e || "fx"), this.each(function() {
                var t, n = Se.get(this),
                    i = n[e + "queue"],
                    o = n[e + "queueHooks"],
                    r = re.timers,
                    s = i ? i.length : 0;
                for (n.finish = !0, re.queue(this, e, []), o && o.stop && o.stop.call(this, !0), t = r.length; t--;) r[t].elem === this && r[t].queue === e && (r[t].anim.stop(!0), r.splice(t, 1));
                for (t = 0; s > t; t++) i[t] && i[t].finish && i[t].finish.call(this);
                delete n.finish
            })
        }
    }), re.each(["toggle", "show", "hide"], function(e, t) {
        var n = re.fn[t];
        re.fn[t] = function(e, i, o) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(M(t, !0), e, i, o)
        }
    }), re.each({
        slideDown: M("show"),
        slideUp: M("hide"),
        slideToggle: M("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        re.fn[e] = function(e, n, i) {
            return this.animate(t, e, n, i)
        }
    }), re.timers = [], re.fx.tick = function() {
        var e, t = 0,
            n = re.timers;
        for (it = re.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
        n.length || re.fx.stop(), it = void 0
    }, re.fx.timer = function(e) {
        re.timers.push(e), e() ? re.fx.start() : re.timers.pop()
    }, re.fx.interval = 13, re.fx.start = function() {
        ot || (ot = e.setInterval(re.fx.tick, re.fx.interval))
    }, re.fx.stop = function() {
        e.clearInterval(ot), ot = null
    }, re.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, re.fn.delay = function(t, n) {
        return t = re.fx ? re.fx.speeds[t] || t : t, n = n || "fx", this.queue(n, function(n, i) {
            var o = e.setTimeout(n, t);
            i.stop = function() {
                e.clearTimeout(o)
            }
        })
    },
        function() {
            var e = G.createElement("input"),
                t = G.createElement("select"),
                n = t.appendChild(G.createElement("option"));
            e.type = "checkbox", ie.checkOn = "" !== e.value, ie.optSelected = n.selected, t.disabled = !0, ie.optDisabled = !n.disabled, e = G.createElement("input"), e.value = "t", e.type = "radio", ie.radioValue = "t" === e.value
        }();
    var at, lt = re.expr.attrHandle;
    re.fn.extend({
        attr: function(e, t) {
            return xe(this, re.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                re.removeAttr(this, e)
            })
        }
    }), re.extend({
        attr: function(e, t, n) {
            var i, o, r = e.nodeType;
            if (3 !== r && 8 !== r && 2 !== r) return void 0 === e.getAttribute ? re.prop(e, t, n) : (1 === r && re.isXMLDoc(e) || (t = t.toLowerCase(), o = re.attrHooks[t] || (re.expr.match.bool.test(t) ? at : void 0)), void 0 !== n ? null === n ? void re.removeAttr(e, t) : o && "set" in o && void 0 !== (i = o.set(e, n, t)) ? i : (e.setAttribute(t, n + ""), n) : o && "get" in o && null !== (i = o.get(e, t)) ? i : (i = re.find.attr(e, t), null == i ? void 0 : i))
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!ie.radioValue && "radio" === t && re.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        removeAttr: function(e, t) {
            var n, i, o = 0,
                r = t && t.match(we);
            if (r && 1 === e.nodeType)
                for (; n = r[o++];) i = re.propFix[n] || n, re.expr.match.bool.test(n) && (e[i] = !1), e.removeAttribute(n)
        }
    }), at = {
        set: function(e, t, n) {
            return !1 === t ? re.removeAttr(e, n) : e.setAttribute(n, n), n
        }
    }, re.each(re.expr.match.bool.source.match(/\w+/g), function(e, t) {
        var n = lt[t] || re.find.attr;
        lt[t] = function(e, t, i) {
            var o, r;
            return i || (r = lt[t], lt[t] = o, o = null != n(e, t, i) ? t.toLowerCase() : null, lt[t] = r), o
        }
    });
    var ct = /^(?:input|select|textarea|button)$/i,
        ut = /^(?:a|area)$/i;
    re.fn.extend({
        prop: function(e, t) {
            return xe(this, re.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return this.each(function() {
                delete this[re.propFix[e] || e]
            })
        }
    }), re.extend({
        prop: function(e, t, n) {
            var i, o, r = e.nodeType;
            if (3 !== r && 8 !== r && 2 !== r) return 1 === r && re.isXMLDoc(e) || (t = re.propFix[t] || t, o = re.propHooks[t]), void 0 !== n ? o && "set" in o && void 0 !== (i = o.set(e, n, t)) ? i : e[t] = n : o && "get" in o && null !== (i = o.get(e, t)) ? i : e[t]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = re.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : ct.test(e.nodeName) || ut.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        },
        propFix: {
            for: "htmlFor",
            class: "className"
        }
    }), ie.optSelected || (re.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex, null
        },
        set: function(e) {
            var t = e.parentNode;
            t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
        }
    }), re.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        re.propFix[this.toLowerCase()] = this
    });
    var dt = /[\t\r\n\f]/g;
    re.fn.extend({
        addClass: function(e) {
            var t, n, i, o, r, s, a, l = 0;
            if (re.isFunction(e)) return this.each(function(t) {
                re(this).addClass(e.call(this, t, R(this)))
            });
            if ("string" == typeof e && e)
                for (t = e.match(we) || []; n = this[l++];)
                    if (o = R(n), i = 1 === n.nodeType && (" " + o + " ").replace(dt, " ")) {
                        for (s = 0; r = t[s++];) i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                        a = re.trim(i), o !== a && n.setAttribute("class", a)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, i, o, r, s, a, l = 0;
            if (re.isFunction(e)) return this.each(function(t) {
                re(this).removeClass(e.call(this, t, R(this)))
            });
            if (!arguments.length) return this.attr("class", "");
            if ("string" == typeof e && e)
                for (t = e.match(we) || []; n = this[l++];)
                    if (o = R(n), i = 1 === n.nodeType && (" " + o + " ").replace(dt, " ")) {
                        for (s = 0; r = t[s++];)
                            for (; i.indexOf(" " + r + " ") > -1;) i = i.replace(" " + r + " ", " ");
                        a = re.trim(i), o !== a && n.setAttribute("class", a)
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e;
            return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : re.isFunction(e) ? this.each(function(n) {
                re(this).toggleClass(e.call(this, n, R(this), t), t)
            }) : this.each(function() {
                var t, i, o, r;
                if ("string" === n)
                    for (i = 0, o = re(this), r = e.match(we) || []; t = r[i++];) o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                else void 0 !== e && "boolean" !== n || (t = R(this), t && Se.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : Se.get(this, "__className__") || ""))
            })
        },
        hasClass: function(e) {
            var t, n, i = 0;
            for (t = " " + e + " "; n = this[i++];)
                if (1 === n.nodeType && (" " + R(n) + " ").replace(dt, " ").indexOf(t) > -1) return !0;
            return !1
        }
    });
    var ht = /\r/g,
        pt = /[\x20\t\r\n\f]+/g;
    re.fn.extend({
        val: function(e) {
            var t, n, i, o = this[0];
            return arguments.length ? (i = re.isFunction(e), this.each(function(n) {
                var o;
                1 === this.nodeType && (o = i ? e.call(this, n, re(this).val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : re.isArray(o) && (o = re.map(o, function(e) {
                    return null == e ? "" : e + ""
                })), (t = re.valHooks[this.type] || re.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, o, "value") || (this.value = o))
            })) : o ? (t = re.valHooks[o.type] || re.valHooks[o.nodeName.toLowerCase()], t && "get" in t && void 0 !== (n = t.get(o, "value")) ? n : (n = o.value, "string" == typeof n ? n.replace(ht, "") : null == n ? "" : n)) : void 0
        }
    }), re.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = re.find.attr(e, "value");
                    return null != t ? t : re.trim(re.text(e)).replace(pt, " ")
                }
            },
            select: {
                get: function(e) {
                    for (var t, n, i = e.options, o = e.selectedIndex, r = "select-one" === e.type || 0 > o, s = r ? null : [], a = r ? o + 1 : i.length, l = 0 > o ? a : r ? o : 0; a > l; l++)
                        if (n = i[l], (n.selected || l === o) && (ie.optDisabled ? !n.disabled : null === n.getAttribute("disabled")) && (!n.parentNode.disabled || !re.nodeName(n.parentNode, "optgroup"))) {
                            if (t = re(n).val(), r) return t;
                            s.push(t)
                        }
                    return s
                },
                set: function(e, t) {
                    for (var n, i, o = e.options, r = re.makeArray(t), s = o.length; s--;) i = o[s], (i.selected = re.inArray(re.valHooks.option.get(i), r) > -1) && (n = !0);
                    return n || (e.selectedIndex = -1), r
                }
            }
        }
    }), re.each(["radio", "checkbox"], function() {
        re.valHooks[this] = {
            set: function(e, t) {
                return re.isArray(t) ? e.checked = re.inArray(re(e).val(), t) > -1 : void 0
            }
        }, ie.checkOn || (re.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    });
    var ft = /^(?:focusinfocus|focusoutblur)$/;
    re.extend(re.event, {
        trigger: function(t, n, i, o) {
            var r, s, a, l, c, u, d, h = [i || G],
                p = ne.call(t, "type") ? t.type : t,
                f = ne.call(t, "namespace") ? t.namespace.split(".") : [];
            if (s = a = i = i || G, 3 !== i.nodeType && 8 !== i.nodeType && !ft.test(p + re.event.triggered) && (p.indexOf(".") > -1 && (f = p.split("."), p = f.shift(), f.sort()), c = p.indexOf(":") < 0 && "on" + p, t = t[re.expando] ? t : new re.Event(p, "object" == typeof t && t), t.isTrigger = o ? 2 : 3, t.namespace = f.join("."), t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : re.makeArray(n, [t]), d = re.event.special[p] || {}, o || !d.trigger || !1 !== d.trigger.apply(i, n))) {
                if (!o && !d.noBubble && !re.isWindow(i)) {
                    for (l = d.delegateType || p, ft.test(l + p) || (s = s.parentNode); s; s = s.parentNode) h.push(s), a = s;
                    a === (i.ownerDocument || G) && h.push(a.defaultView || a.parentWindow || e)
                }
                for (r = 0;
                     (s = h[r++]) && !t.isPropagationStopped();) t.type = r > 1 ? l : d.bindType || p, u = (Se.get(s, "events") || {})[t.type] && Se.get(s, "handle"), u && u.apply(s, n), (u = c && s[c]) && u.apply && Te(s) && (t.result = u.apply(s, n), !1 === t.result && t.preventDefault());
                return t.type = p, o || t.isDefaultPrevented() || d._default && !1 !== d._default.apply(h.pop(), n) || !Te(i) || c && re.isFunction(i[p]) && !re.isWindow(i) && (a = i[c], a && (i[c] = null), re.event.triggered = p, i[p](), re.event.triggered = void 0, a && (i[c] = a)), t.result
            }
        },
        simulate: function(e, t, n) {
            var i = re.extend(new re.Event, n, {
                type: e,
                isSimulated: !0
            });
            re.event.trigger(i, null, t)
        }
    }), re.fn.extend({
        trigger: function(e, t) {
            return this.each(function() {
                re.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            return n ? re.event.trigger(e, t, n, !0) : void 0
        }
    }), re.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        re.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }), re.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        }
    }), ie.focusin = "onfocusin" in e, ie.focusin || re.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = function(e) {
            re.event.simulate(t, e.target, re.event.fix(e))
        };
        re.event.special[t] = {
            setup: function() {
                var i = this.ownerDocument || this,
                    o = Se.access(i, t);
                o || i.addEventListener(e, n, !0), Se.access(i, t, (o || 0) + 1)
            },
            teardown: function() {
                var i = this.ownerDocument || this,
                    o = Se.access(i, t) - 1;
                o ? Se.access(i, t, o) : (i.removeEventListener(e, n, !0), Se.remove(i, t))
            }
        }
    });
    var mt = e.location,
        gt = re.now(),
        vt = /\?/;
    re.parseJSON = function(e) {
        return JSON.parse(e + "")
    }, re.parseXML = function(t) {
        var n;
        if (!t || "string" != typeof t) return null;
        try {
            n = (new e.DOMParser).parseFromString(t, "text/xml")
        } catch (e) {
            n = void 0
        }
        return n && !n.getElementsByTagName("parsererror").length || re.error("Invalid XML: " + t), n
    };
    var yt = /#.*$/,
        bt = /([?&])_=[^&]*/,
        wt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        _t = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        xt = /^(?:GET|HEAD)$/,
        Tt = /^\/\//,
        St = {},
        Ct = {},
        kt = "*/".concat("*"),
        Et = G.createElement("a");
    Et.href = mt.href, re.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: mt.href,
            type: "GET",
            isLocal: _t.test(mt.protocol),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": kt,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /\bxml\b/,
                html: /\bhtml/,
                json: /\bjson\b/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": re.parseJSON,
                "text xml": re.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? z(z(e, re.ajaxSettings), t) : z(re.ajaxSettings, e)
        },
        ajaxPrefilter: q(St),
        ajaxTransport: q(Ct),
        ajax: function(t, n) {
            function i(t, n, i, a) {
                var c, d, y, b, _, T = n;
                2 !== w && (w = 2, l && e.clearTimeout(l), o = void 0, s = a || "", x.readyState = t > 0 ? 4 : 0, c = t >= 200 && 300 > t || 304 === t, i && (b = Y(h, x, i)), b = B(h, b, x, c), c ? (h.ifModified && (_ = x.getResponseHeader("Last-Modified"), _ && (re.lastModified[r] = _), (_ = x.getResponseHeader("etag")) && (re.etag[r] = _)), 204 === t || "HEAD" === h.type ? T = "nocontent" : 304 === t ? T = "notmodified" : (T = b.state, d = b.data, y = b.error, c = !y)) : (y = T, !t && T || (T = "error", 0 > t && (t = 0))), x.status = t, x.statusText = (n || T) + "", c ? m.resolveWith(p, [d, T, x]) : m.rejectWith(p, [x, T, y]), x.statusCode(v), v = void 0, u && f.trigger(c ? "ajaxSuccess" : "ajaxError", [x, h, c ? d : y]), g.fireWith(p, [x, T]), u && (f.trigger("ajaxComplete", [x, h]), --re.active || re.event.trigger("ajaxStop")))
            }
            "object" == typeof t && (n = t, t = void 0), n = n || {};
            var o, r, s, a, l, c, u, d, h = re.ajaxSetup({}, n),
                p = h.context || h,
                f = h.context && (p.nodeType || p.jquery) ? re(p) : re.event,
                m = re.Deferred(),
                g = re.Callbacks("once memory"),
                v = h.statusCode || {},
                y = {},
                b = {},
                w = 0,
                _ = "canceled",
                x = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === w) {
                            if (!a)
                                for (a = {}; t = wt.exec(s);) a[t[1].toLowerCase()] = t[2];
                            t = a[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return 2 === w ? s : null
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return w || (e = b[n] = b[n] || e, y[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return w || (h.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e)
                            if (2 > w)
                                for (t in e) v[t] = [v[t], e[t]];
                            else x.always(e[x.status]);
                        return this
                    },
                    abort: function(e) {
                        var t = e || _;
                        return o && o.abort(t), i(0, t), this
                    }
                };
            if (m.promise(x).complete = g.add, x.success = x.done, x.error = x.fail, h.url = ((t || h.url || mt.href) + "").replace(yt, "").replace(Tt, mt.protocol + "//"), h.type = n.method || n.type || h.method || h.type, h.dataTypes = re.trim(h.dataType || "*").toLowerCase().match(we) || [""], null == h.crossDomain) {
                c = G.createElement("a");
                try {
                    c.href = h.url, c.href = c.href, h.crossDomain = Et.protocol + "//" + Et.host != c.protocol + "//" + c.host
                } catch (e) {
                    h.crossDomain = !0
                }
            }
            if (h.data && h.processData && "string" != typeof h.data && (h.data = re.param(h.data, h.traditional)), W(St, h, n, x), 2 === w) return x;
            u = re.event && h.global, u && 0 == re.active++ && re.event.trigger("ajaxStart"), h.type = h.type.toUpperCase(), h.hasContent = !xt.test(h.type), r = h.url, h.hasContent || (h.data && (r = h.url += (vt.test(r) ? "&" : "?") + h.data, delete h.data), !1 === h.cache && (h.url = bt.test(r) ? r.replace(bt, "$1_=" + gt++) : r + (vt.test(r) ? "&" : "?") + "_=" + gt++)), h.ifModified && (re.lastModified[r] && x.setRequestHeader("If-Modified-Since", re.lastModified[r]), re.etag[r] && x.setRequestHeader("If-None-Match", re.etag[r])), (h.data && h.hasContent && !1 !== h.contentType || n.contentType) && x.setRequestHeader("Content-Type", h.contentType), x.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + kt + "; q=0.01" : "") : h.accepts["*"]);
            for (d in h.headers) x.setRequestHeader(d, h.headers[d]);
            if (h.beforeSend && (!1 === h.beforeSend.call(p, x, h) || 2 === w)) return x.abort();
            _ = "abort";
            for (d in {
                success: 1,
                error: 1,
                complete: 1
            }) x[d](h[d]);
            if (o = W(Ct, h, n, x)) {
                if (x.readyState = 1, u && f.trigger("ajaxSend", [x, h]), 2 === w) return x;
                h.async && h.timeout > 0 && (l = e.setTimeout(function() {
                    x.abort("timeout")
                }, h.timeout));
                try {
                    w = 1, o.send(y, i)
                } catch (e) {
                    if (!(2 > w)) throw e;
                    i(-1, e)
                }
            } else i(-1, "No Transport");
            return x
        },
        getJSON: function(e, t, n) {
            return re.get(e, t, n, "json")
        },
        getScript: function(e, t) {
            return re.get(e, void 0, t, "script")
        }
    }), re.each(["get", "post"], function(e, t) {
        re[t] = function(e, n, i, o) {
            return re.isFunction(n) && (o = o || i, i = n, n = void 0), re.ajax(re.extend({
                url: e,
                type: t,
                dataType: o,
                data: n,
                success: i
            }, re.isPlainObject(e) && e))
        }
    }), re._evalUrl = function(e) {
        return re.ajax({
            url: e,
            type: "GET",
            dataType: "script",
            async: !1,
            global: !1,
            throws: !0
        })
    }, re.fn.extend({
        wrapAll: function(e) {
            var t;
            return re.isFunction(e) ? this.each(function(t) {
                re(this).wrapAll(e.call(this, t))
            }) : (this[0] && (t = re(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                for (var e = this; e.firstElementChild;) e = e.firstElementChild;
                return e
            }).append(this)), this)
        },
        wrapInner: function(e) {
            return re.isFunction(e) ? this.each(function(t) {
                re(this).wrapInner(e.call(this, t))
            }) : this.each(function() {
                var t = re(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = re.isFunction(e);
            return this.each(function(n) {
                re(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                re.nodeName(this, "body") || re(this).replaceWith(this.childNodes)
            }).end()
        }
    }), re.expr.filters.hidden = function(e) {
        return !re.expr.filters.visible(e)
    }, re.expr.filters.visible = function(e) {
        return e.offsetWidth > 0 || e.offsetHeight > 0 || e.getClientRects().length > 0
    };
    var At = /%20/g,
        Dt = /\[\]$/,
        Ot = /\r?\n/g,
        It = /^(?:submit|button|image|reset|file)$/i,
        $t = /^(?:input|select|textarea|keygen)/i;
    re.param = function(e, t) {
        var n, i = [],
            o = function(e, t) {
                t = re.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        if (void 0 === t && (t = re.ajaxSettings && re.ajaxSettings.traditional), re.isArray(e) || e.jquery && !re.isPlainObject(e)) re.each(e, function() {
            o(this.name, this.value)
        });
        else
            for (n in e) X(n, e[n], t, o);
        return i.join("&").replace(At, "+")
    }, re.fn.extend({
        serialize: function() {
            return re.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = re.prop(this, "elements");
                return e ? re.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !re(this).is(":disabled") && $t.test(this.nodeName) && !It.test(e) && (this.checked || !$e.test(e))
            }).map(function(e, t) {
                var n = re(this).val();
                return null == n ? null : re.isArray(n) ? re.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(Ot, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(Ot, "\r\n")
                }
            }).get()
        }
    }), re.ajaxSettings.xhr = function() {
        try {
            return new e.XMLHttpRequest
        } catch (e) {}
    };
    var Lt = {
            0: 200,
            1223: 204
        },
        Nt = re.ajaxSettings.xhr();
    ie.cors = !!Nt && "withCredentials" in Nt, ie.ajax = Nt = !!Nt, re.ajaxTransport(function(t) {
        var n, i;
        return ie.cors || Nt && !t.crossDomain ? {
            send: function(o, r) {
                var s, a = t.xhr();
                if (a.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)
                    for (s in t.xhrFields) a[s] = t.xhrFields[s];
                t.mimeType && a.overrideMimeType && a.overrideMimeType(t.mimeType), t.crossDomain || o["X-Requested-With"] || (o["X-Requested-With"] = "XMLHttpRequest");
                for (s in o) a.setRequestHeader(s, o[s]);
                n = function(e) {
                    return function() {
                        n && (n = i = a.onload = a.onerror = a.onabort = a.onreadystatechange = null, "abort" === e ? a.abort() : "error" === e ? "number" != typeof a.status ? r(0, "error") : r(a.status, a.statusText) : r(Lt[a.status] || a.status, a.statusText, "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? {
                            binary: a.response
                        } : {
                            text: a.responseText
                        }, a.getAllResponseHeaders()))
                    }
                }, a.onload = n(), i = a.onerror = n("error"), void 0 !== a.onabort ? a.onabort = i : a.onreadystatechange = function() {
                    4 === a.readyState && e.setTimeout(function() {
                        n && i()
                    })
                }, n = n("abort");
                try {
                    a.send(t.hasContent && t.data || null)
                } catch (e) {
                    if (n) throw e
                }
            },
            abort: function() {
                n && n()
            }
        } : void 0
    }), re.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /\b(?:java|ecma)script\b/
        },
        converters: {
            "text script": function(e) {
                return re.globalEval(e), e
            }
        }
    }), re.ajaxPrefilter("script", function(e) {
        void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
    }), re.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var t, n;
            return {
                send: function(i, o) {
                    t = re("<script>").prop({
                        charset: e.scriptCharset,
                        src: e.url
                    }).on("load error", n = function(e) {
                        t.remove(), n = null, e && o("error" === e.type ? 404 : 200, e.type)
                    }), G.head.appendChild(t[0])
                },
                abort: function() {
                    n && n()
                }
            }
        }
    });
    var Mt = [],
        Pt = /(=)\?(?=&|$)|\?\?/;
    re.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Mt.pop() || re.expando + "_" + gt++;
            return this[e] = !0, e
        }
    }), re.ajaxPrefilter("json jsonp", function(t, n, i) {
        var o, r, s, a = !1 !== t.jsonp && (Pt.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Pt.test(t.data) && "data");
        return a || "jsonp" === t.dataTypes[0] ? (o = t.jsonpCallback = re.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, a ? t[a] = t[a].replace(Pt, "$1" + o) : !1 !== t.jsonp && (t.url += (vt.test(t.url) ? "&" : "?") + t.jsonp + "=" + o), t.converters["script json"] = function() {
            return s || re.error(o + " was not called"), s[0]
        }, t.dataTypes[0] = "json", r = e[o], e[o] = function() {
            s = arguments
        }, i.always(function() {
            void 0 === r ? re(e).removeProp(o) : e[o] = r, t[o] && (t.jsonpCallback = n.jsonpCallback, Mt.push(o)), s && re.isFunction(r) && r(s[0]), s = r = void 0
        }), "script") : void 0
    }), re.parseHTML = function(e, t, n) {
        if (!e || "string" != typeof e) return null;
        "boolean" == typeof t && (n = t, t = !1), t = t || G;
        var i = fe.exec(e),
            o = !n && [];
        return i ? [t.createElement(i[1])] : (i = h([e], t, o), o && o.length && re(o).remove(), re.merge([], i.childNodes))
    };
    var jt = re.fn.load;
    re.fn.load = function(e, t, n) {
        if ("string" != typeof e && jt) return jt.apply(this, arguments);
        var i, o, r, s = this,
            a = e.indexOf(" ");
        return a > -1 && (i = re.trim(e.slice(a)), e = e.slice(0, a)), re.isFunction(t) ? (n = t, t = void 0) : t && "object" == typeof t && (o = "POST"), s.length > 0 && re.ajax({
            url: e,
            type: o || "GET",
            dataType: "html",
            data: t
        }).done(function(e) {
            r = arguments, s.html(i ? re("<div>").append(re.parseHTML(e)).find(i) : e)
        }).always(n && function(e, t) {
            s.each(function() {
                n.apply(this, r || [e.responseText, t, e])
            })
        }), this
    }, re.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        re.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), re.expr.filters.animated = function(e) {
        return re.grep(re.timers, function(t) {
            return e === t.elem
        }).length
    }, re.offset = {
        setOffset: function(e, t, n) {
            var i, o, r, s, a, l, c, u = re.css(e, "position"),
                d = re(e),
                h = {};
            "static" === u && (e.style.position = "relative"), a = d.offset(), r = re.css(e, "top"), l = re.css(e, "left"), c = ("absolute" === u || "fixed" === u) && (r + l).indexOf("auto") > -1, c ? (i = d.position(), s = i.top, o = i.left) : (s = parseFloat(r) || 0, o = parseFloat(l) || 0), re.isFunction(t) && (t = t.call(e, n, re.extend({}, a))), null != t.top && (h.top = t.top - a.top + s), null != t.left && (h.left = t.left - a.left + o), "using" in t ? t.using.call(e, h) : d.css(h)
        }
    }, re.fn.extend({
        offset: function(e) {
            if (arguments.length) return void 0 === e ? this : this.each(function(t) {
                re.offset.setOffset(this, e, t)
            });
            var t, n, i = this[0],
                o = {
                    top: 0,
                    left: 0
                },
                r = i && i.ownerDocument;
            return r ? (t = r.documentElement, re.contains(t, i) ? (o = i.getBoundingClientRect(), n = U(r), {
                top: o.top + n.pageYOffset - t.clientTop,
                left: o.left + n.pageXOffset - t.clientLeft
            }) : o) : void 0
        },
        position: function() {
            if (this[0]) {
                var e, t, n = this[0],
                    i = {
                        top: 0,
                        left: 0
                    };
                return "fixed" === re.css(n, "position") ? t = n.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), re.nodeName(e[0], "html") || (i = e.offset()), i.top += re.css(e[0], "borderTopWidth", !0), i.left += re.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - i.top - re.css(n, "marginTop", !0),
                    left: t.left - i.left - re.css(n, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var e = this.offsetParent; e && "static" === re.css(e, "position");) e = e.offsetParent;
                return e || Qe
            })
        }
    }), re.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, t) {
        var n = "pageYOffset" === t;
        re.fn[e] = function(i) {
            return xe(this, function(e, i, o) {
                var r = U(e);
                return void 0 === o ? r ? r[t] : e[i] : void(r ? r.scrollTo(n ? r.pageXOffset : o, n ? o : r.pageYOffset) : e[i] = o)
            }, e, i, arguments.length)
        }
    }), re.each(["top", "left"], function(e, t) {
        re.cssHooks[t] = E(ie.pixelPosition, function(e, n) {
            return n ? (n = k(e, t), Ve.test(n) ? re(e).position()[t] + "px" : n) : void 0
        })
    }), re.each({
        Height: "height",
        Width: "width"
    }, function(e, t) {
        re.each({
            padding: "inner" + e,
            content: t,
            "": "outer" + e
        }, function(n, i) {
            re.fn[i] = function(i, o) {
                var r = arguments.length && (n || "boolean" != typeof i),
                    s = n || (!0 === i || !0 === o ? "margin" : "border");
                return xe(this, function(t, n, i) {
                    var o;
                    return re.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement, Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? re.css(t, n, s) : re.style(t, n, i, s)
                }, t, r ? i : void 0, r, null)
            }
        })
    }), re.fn.extend({
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, i) {
            return this.on(t, e, n, i)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        },
        size: function() {
            return this.length
        }
    }), re.fn.andSelf = re.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function() {
        return re
    });
    var Ht = e.jQuery,
        Ft = e.$;
    return re.noConflict = function(t) {
        return e.$ === re && (e.$ = Ft), t && e.jQuery === re && (e.jQuery = Ht), re
    }, t || (e.jQuery = e.$ = re), re
}),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.Popper = t()
    }(this, function() {
        "use strict";

        function e(e) {
            return e && "[object Function]" === {}.toString.call(e)
        }

        function t(e, t) {
            if (1 !== e.nodeType) return [];
            var n = getComputedStyle(e, null);
            return t ? n[t] : n
        }

        function n(e) {
            return "HTML" === e.nodeName ? e : e.parentNode || e.host
        }

        function i(e) {
            if (!e) return document.body;
            switch (e.nodeName) {
                case "HTML":
                case "BODY":
                    return e.ownerDocument.body;
                case "#document":
                    return e.body
            }
            var o = t(e),
                r = o.overflow,
                s = o.overflowX;
            return /(auto|scroll|overlay)/.test(r + o.overflowY + s) ? e : i(n(e))
        }

        function o(e) {
            return 11 === e ? re : 10 === e ? se : re || se
        }

        function r(e) {
            if (!e) return document.documentElement;
            for (var n = o(10) ? document.body : null, i = e.offsetParent; i === n && e.nextElementSibling;) i = (e = e.nextElementSibling).offsetParent;
            var s = i && i.nodeName;
            return s && "BODY" !== s && "HTML" !== s ? -1 !== ["TD", "TABLE"].indexOf(i.nodeName) && "static" === t(i, "position") ? r(i) : i : e ? e.ownerDocument.documentElement : document.documentElement
        }

        function s(e) {
            var t = e.nodeName;
            return "BODY" !== t && ("HTML" === t || r(e.firstElementChild) === e)
        }

        function a(e) {
            return null === e.parentNode ? e : a(e.parentNode)
        }

        function l(e, t) {
            if (!(e && e.nodeType && t && t.nodeType)) return document.documentElement;
            var n = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
                i = n ? e : t,
                o = n ? t : e,
                c = document.createRange();
            c.setStart(i, 0), c.setEnd(o, 0);
            var u = c.commonAncestorContainer;
            if (e !== u && t !== u || i.contains(o)) return s(u) ? u : r(u);
            var d = a(e);
            return d.host ? l(d.host, t) : l(e, a(t).host)
        }

        function c(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top",
                n = "top" === t ? "scrollTop" : "scrollLeft",
                i = e.nodeName;
            if ("BODY" === i || "HTML" === i) {
                var o = e.ownerDocument.documentElement;
                return (e.ownerDocument.scrollingElement || o)[n]
            }
            return e[n]
        }

        function u(e, t) {
            var n = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
                i = c(t, "top"),
                o = c(t, "left"),
                r = n ? -1 : 1;
            return e.top += i * r, e.bottom += i * r, e.left += o * r, e.right += o * r, e
        }

        function d(e, t) {
            var n = "x" === t ? "Left" : "Top",
                i = "Left" == n ? "Right" : "Bottom";
            return parseFloat(e["border" + n + "Width"], 10) + parseFloat(e["border" + i + "Width"], 10)
        }

        function h(e, t, n, i) {
            return Z(t["offset" + e], t["scroll" + e], n["client" + e], n["offset" + e], n["scroll" + e], o(10) ? n["offset" + e] + i["margin" + ("Height" === e ? "Top" : "Left")] + i["margin" + ("Height" === e ? "Bottom" : "Right")] : 0)
        }

        function p() {
            var e = document.body,
                t = document.documentElement,
                n = o(10) && getComputedStyle(t);
            return {
                height: h("Height", e, t, n),
                width: h("Width", e, t, n)
            }
        }

        function f(e) {
            return ue({}, e, {
                right: e.left + e.width,
                bottom: e.top + e.height
            })
        }

        function m(e) {
            var n = {};
            try {
                if (o(10)) {
                    n = e.getBoundingClientRect();
                    var i = c(e, "top"),
                        r = c(e, "left");
                    n.top += i, n.left += r, n.bottom += i, n.right += r
                } else n = e.getBoundingClientRect()
            } catch (e) {}
            var s = {
                    left: n.left,
                    top: n.top,
                    width: n.right - n.left,
                    height: n.bottom - n.top
                },
                a = "HTML" === e.nodeName ? p() : {},
                l = a.width || e.clientWidth || s.right - s.left,
                u = a.height || e.clientHeight || s.bottom - s.top,
                h = e.offsetWidth - l,
                m = e.offsetHeight - u;
            if (h || m) {
                var g = t(e);
                h -= d(g, "x"), m -= d(g, "y"), s.width -= h, s.height -= m
            }
            return f(s)
        }

        function g(e, n) {
            var r = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
                s = o(10),
                a = "HTML" === n.nodeName,
                l = m(e),
                c = m(n),
                d = i(e),
                h = t(n),
                p = parseFloat(h.borderTopWidth, 10),
                g = parseFloat(h.borderLeftWidth, 10);
            r && "HTML" === n.nodeName && (c.top = Z(c.top, 0), c.left = Z(c.left, 0));
            var v = f({
                top: l.top - c.top - p,
                left: l.left - c.left - g,
                width: l.width,
                height: l.height
            });
            if (v.marginTop = 0, v.marginLeft = 0, !s && a) {
                var y = parseFloat(h.marginTop, 10),
                    b = parseFloat(h.marginLeft, 10);
                v.top -= p - y, v.bottom -= p - y, v.left -= g - b, v.right -= g - b, v.marginTop = y, v.marginLeft = b
            }
            return (s && !r ? n.contains(d) : n === d && "BODY" !== d.nodeName) && (v = u(v, n)), v
        }

        function v(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
                n = e.ownerDocument.documentElement,
                i = g(e, n),
                o = Z(n.clientWidth, window.innerWidth || 0),
                r = Z(n.clientHeight, window.innerHeight || 0),
                s = t ? 0 : c(n),
                a = t ? 0 : c(n, "left");
            return f({
                top: s - i.top + i.marginTop,
                left: a - i.left + i.marginLeft,
                width: o,
                height: r
            })
        }

        function y(e) {
            var i = e.nodeName;
            return "BODY" !== i && "HTML" !== i && ("fixed" === t(e, "position") || y(n(e)))
        }

        function b(e) {
            if (!e || !e.parentElement || o()) return document.documentElement;
            for (var n = e.parentElement; n && "none" === t(n, "transform");) n = n.parentElement;
            return n || document.documentElement
        }

        function w(e, t, o, r) {
            var s = 4 < arguments.length && void 0 !== arguments[4] && arguments[4],
                a = {
                    top: 0,
                    left: 0
                },
                c = s ? b(e) : l(e, t);
            if ("viewport" === r) a = v(c, s);
            else {
                var u;
                "scrollParent" === r ? (u = i(n(t)), "BODY" === u.nodeName && (u = e.ownerDocument.documentElement)) : u = "window" === r ? e.ownerDocument.documentElement : r;
                var d = g(u, c, s);
                if ("HTML" !== u.nodeName || y(c)) a = d;
                else {
                    var h = p(),
                        f = h.height,
                        m = h.width;
                    a.top += d.top - d.marginTop, a.bottom = f + d.top, a.left += d.left - d.marginLeft, a.right = m + d.left
                }
            }
            return a.left += o, a.top += o, a.right -= o, a.bottom -= o, a
        }

        function _(e) {
            return e.width * e.height
        }

        function x(e, t, n, i, o) {
            var r = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
            if (-1 === e.indexOf("auto")) return e;
            var s = w(n, i, r, o),
                a = {
                    top: {
                        width: s.width,
                        height: t.top - s.top
                    },
                    right: {
                        width: s.right - t.right,
                        height: s.height
                    },
                    bottom: {
                        width: s.width,
                        height: s.bottom - t.bottom
                    },
                    left: {
                        width: t.left - s.left,
                        height: s.height
                    }
                },
                l = Object.keys(a).map(function(e) {
                    return ue({
                        key: e
                    }, a[e], {
                        area: _(a[e])
                    })
                }).sort(function(e, t) {
                    return t.area - e.area
                }),
                c = l.filter(function(e) {
                    var t = e.width,
                        i = e.height;
                    return t >= n.clientWidth && i >= n.clientHeight
                }),
                u = 0 < c.length ? c[0].key : l[0].key,
                d = e.split("-")[1];
            return u + (d ? "-" + d : "")
        }

        function T(e, t, n) {
            var i = 3 < arguments.length && void 0 !== arguments[3] ? arguments[3] : null;
            return g(n, i ? b(t) : l(t, n), i)
        }

        function S(e) {
            var t = getComputedStyle(e),
                n = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
                i = parseFloat(t.marginLeft) + parseFloat(t.marginRight);
            return {
                width: e.offsetWidth + i,
                height: e.offsetHeight + n
            }
        }

        function C(e) {
            var t = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom"
            };
            return e.replace(/left|right|bottom|top/g, function(e) {
                return t[e]
            })
        }

        function k(e, t, n) {
            n = n.split("-")[0];
            var i = S(e),
                o = {
                    width: i.width,
                    height: i.height
                },
                r = -1 !== ["right", "left"].indexOf(n),
                s = r ? "top" : "left",
                a = r ? "left" : "top",
                l = r ? "height" : "width",
                c = r ? "width" : "height";
            return o[s] = t[s] + t[l] / 2 - i[l] / 2, o[a] = n === a ? t[a] - i[c] : t[C(a)], o
        }

        function E(e, t) {
            return Array.prototype.find ? e.find(t) : e.filter(t)[0]
        }

        function A(e, t, n) {
            if (Array.prototype.findIndex) return e.findIndex(function(e) {
                return e[t] === n
            });
            var i = E(e, function(e) {
                return e[t] === n
            });
            return e.indexOf(i)
        }

        function D(t, n, i) {
            return (void 0 === i ? t : t.slice(0, A(t, "name", i))).forEach(function(t) {
                t.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
                var i = t.function || t.fn;
                t.enabled && e(i) && (n.offsets.popper = f(n.offsets.popper), n.offsets.reference = f(n.offsets.reference), n = i(n, t))
            }), n
        }

        function O() {
            if (!this.state.isDestroyed) {
                var e = {
                    instance: this,
                    styles: {},
                    arrowStyles: {},
                    attributes: {},
                    flipped: !1,
                    offsets: {}
                };
                e.offsets.reference = T(this.state, this.popper, this.reference, this.options.positionFixed), e.placement = x(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.positionFixed = this.options.positionFixed, e.offsets.popper = k(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = this.options.positionFixed ? "fixed" : "absolute", e = D(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
            }
        }

        function I(e, t) {
            return e.some(function(e) {
                var n = e.name;
                return e.enabled && n === t
            })
        }

        function $(e) {
            for (var t = [!1, "ms", "Webkit", "Moz", "O"], n = e.charAt(0).toUpperCase() + e.slice(1), i = 0; i < t.length; i++) {
                var o = t[i],
                    r = o ? "" + o + n : e;
                if (void 0 !== document.body.style[r]) return r
            }
            return null
        }

        function L() {
            return this.state.isDestroyed = !0, I(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.position = "", this.popper.style.top = "", this.popper.style.left = "", this.popper.style.right = "", this.popper.style.bottom = "", this.popper.style.willChange = "", this.popper.style[$("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
        }

        function N(e) {
            var t = e.ownerDocument;
            return t ? t.defaultView : window
        }

        function M(e, t, n, o) {
            var r = "BODY" === e.nodeName,
                s = r ? e.ownerDocument.defaultView : e;
            s.addEventListener(t, n, {
                passive: !0
            }), r || M(i(s.parentNode), t, n, o), o.push(s)
        }

        function P(e, t, n, o) {
            n.updateBound = o, N(e).addEventListener("resize", n.updateBound, {
                passive: !0
            });
            var r = i(e);
            return M(r, "scroll", n.updateBound, n.scrollParents), n.scrollElement = r, n.eventsEnabled = !0, n
        }

        function j() {
            this.state.eventsEnabled || (this.state = P(this.reference, this.options, this.state, this.scheduleUpdate))
        }

        function H(e, t) {
            return N(e).removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function(e) {
                e.removeEventListener("scroll", t.updateBound)
            }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t
        }

        function F() {
            this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = H(this.reference, this.state))
        }

        function R(e) {
            return "" !== e && !isNaN(parseFloat(e)) && isFinite(e)
        }

        function q(e, t) {
            Object.keys(t).forEach(function(n) {
                var i = ""; - 1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(n) && R(t[n]) && (i = "px"), e.style[n] = t[n] + i
            })
        }

        function W(e, t) {
            Object.keys(t).forEach(function(n) {
                !1 === t[n] ? e.removeAttribute(n) : e.setAttribute(n, t[n])
            })
        }

        function z(e, t, n) {
            var i = E(e, function(e) {
                    return e.name === t
                }),
                o = !!i && e.some(function(e) {
                    return e.name === n && e.enabled && e.order < i.order
                });
            if (!o) {
                var r = "`" + t + "`";
                console.warn("`" + n + "` modifier is required by " + r + " modifier in order to work, be sure to include it before " + r + "!")
            }
            return o
        }

        function Y(e) {
            return "end" === e ? "start" : "start" === e ? "end" : e
        }

        function B(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
                n = he.indexOf(e),
                i = he.slice(n + 1).concat(he.slice(0, n));
            return t ? i.reverse() : i
        }

        function X(e, t, n, i) {
            var o = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                r = +o[1],
                s = o[2];
            if (!r) return e;
            if (0 === s.indexOf("%")) {
                var a;
                switch (s) {
                    case "%p":
                        a = n;
                        break;
                    case "%":
                    case "%r":
                    default:
                        a = i
                }
                return f(a)[t] / 100 * r
            }
            if ("vh" === s || "vw" === s) {
                return ("vh" === s ? Z(document.documentElement.clientHeight, window.innerHeight || 0) : Z(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * r
            }
            return r
        }

        function U(e, t, n, i) {
            var o = [0, 0],
                r = -1 !== ["right", "left"].indexOf(i),
                s = e.split(/(\+|\-)/).map(function(e) {
                    return e.trim()
                }),
                a = s.indexOf(E(s, function(e) {
                    return -1 !== e.search(/,|\s/)
                }));
            s[a] && -1 === s[a].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
            var l = /\s*,\s*|\s+/,
                c = -1 === a ? [s] : [s.slice(0, a).concat([s[a].split(l)[0]]), [s[a].split(l)[1]].concat(s.slice(a + 1))];
            return c = c.map(function(e, i) {
                var o = (1 === i ? !r : r) ? "height" : "width",
                    s = !1;
                return e.reduce(function(e, t) {
                    return "" === e[e.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (e[e.length - 1] = t, s = !0, e) : s ? (e[e.length - 1] += t, s = !1, e) : e.concat(t)
                }, []).map(function(e) {
                    return X(e, o, t, n)
                })
            }), c.forEach(function(e, t) {
                e.forEach(function(n, i) {
                    R(n) && (o[t] += n * ("-" === e[i - 1] ? -1 : 1))
                })
            }), o
        }

        function V(e, t) {
            var n, i = t.offset,
                o = e.placement,
                r = e.offsets,
                s = r.popper,
                a = r.reference,
                l = o.split("-")[0];
            return n = R(+i) ? [+i, 0] : U(i, s, a, l), "left" === l ? (s.top += n[0], s.left -= n[1]) : "right" === l ? (s.top += n[0], s.left += n[1]) : "top" === l ? (s.left += n[0], s.top -= n[1]) : "bottom" === l && (s.left += n[0], s.top += n[1]), e.popper = s, e
        }
        for (var G = Math.min, K = Math.round, Q = Math.floor, Z = Math.max, J = "undefined" != typeof window && "undefined" != typeof document, ee = ["Edge", "Trident", "Firefox"], te = 0, ne = 0; ne < ee.length; ne += 1)
            if (J && 0 <= navigator.userAgent.indexOf(ee[ne])) {
                te = 1;
                break
            }
        var ie = J && window.Promise,
            oe = ie ? function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, window.Promise.resolve().then(function() {
                        t = !1, e()
                    }))
                }
            } : function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, setTimeout(function() {
                        t = !1, e()
                    }, te))
                }
            },
            re = J && !(!window.MSInputMethodContext || !document.documentMode),
            se = J && /MSIE 10/.test(navigator.userAgent),
            ae = function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            },
            le = function() {
                function e(e, t) {
                    for (var n, i = 0; i < t.length; i++) n = t[i], n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
                return function(t, n, i) {
                    return n && e(t.prototype, n), i && e(t, i), t
                }
            }(),
            ce = function(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            },
            ue = Object.assign || function(e) {
                for (var t, n = 1; n < arguments.length; n++)
                    for (var i in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                return e
            },
            de = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
            he = de.slice(3),
            pe = {
                FLIP: "flip",
                CLOCKWISE: "clockwise",
                COUNTERCLOCKWISE: "counterclockwise"
            },
            fe = function() {
                function t(n, i) {
                    var o = this,
                        r = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
                    ae(this, t), this.scheduleUpdate = function() {
                        return requestAnimationFrame(o.update)
                    }, this.update = oe(this.update.bind(this)), this.options = ue({}, t.Defaults, r), this.state = {
                        isDestroyed: !1,
                        isCreated: !1,
                        scrollParents: []
                    }, this.reference = n && n.jquery ? n[0] : n, this.popper = i && i.jquery ? i[0] : i, this.options.modifiers = {}, Object.keys(ue({}, t.Defaults.modifiers, r.modifiers)).forEach(function(e) {
                        o.options.modifiers[e] = ue({}, t.Defaults.modifiers[e] || {}, r.modifiers ? r.modifiers[e] : {})
                    }), this.modifiers = Object.keys(this.options.modifiers).map(function(e) {
                        return ue({
                            name: e
                        }, o.options.modifiers[e])
                    }).sort(function(e, t) {
                        return e.order - t.order
                    }), this.modifiers.forEach(function(t) {
                        t.enabled && e(t.onLoad) && t.onLoad(o.reference, o.popper, o.options, t, o.state)
                    }), this.update();
                    var s = this.options.eventsEnabled;
                    s && this.enableEventListeners(), this.state.eventsEnabled = s
                }
                return le(t, [{
                    key: "update",
                    value: function() {
                        return O.call(this)
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        return L.call(this)
                    }
                }, {
                    key: "enableEventListeners",
                    value: function() {
                        return j.call(this)
                    }
                }, {
                    key: "disableEventListeners",
                    value: function() {
                        return F.call(this)
                    }
                }]), t
            }();
        return fe.Utils = ("undefined" == typeof window ? global : window).PopperUtils, fe.placements = de, fe.Defaults = {
            placement: "bottom",
            positionFixed: !1,
            eventsEnabled: !0,
            removeOnDestroy: !1,
            onCreate: function() {},
            onUpdate: function() {},
            modifiers: {
                shift: {
                    order: 100,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            i = t.split("-")[1];
                        if (i) {
                            var o = e.offsets,
                                r = o.reference,
                                s = o.popper,
                                a = -1 !== ["bottom", "top"].indexOf(n),
                                l = a ? "left" : "top",
                                c = a ? "width" : "height",
                                u = {
                                    start: ce({}, l, r[l]),
                                    end: ce({}, l, r[l] + r[c] - s[c])
                                };
                            e.offsets.popper = ue({}, s, u[i])
                        }
                        return e
                    }
                },
                offset: {
                    order: 200,
                    enabled: !0,
                    fn: V,
                    offset: 0
                },
                preventOverflow: {
                    order: 300,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.boundariesElement || r(e.instance.popper);
                        e.instance.reference === n && (n = r(n));
                        var i = $("transform"),
                            o = e.instance.popper.style,
                            s = o.top,
                            a = o.left,
                            l = o[i];
                        o.top = "", o.left = "", o[i] = "";
                        var c = w(e.instance.popper, e.instance.reference, t.padding, n, e.positionFixed);
                        o.top = s, o.left = a, o[i] = l, t.boundaries = c;
                        var u = t.priority,
                            d = e.offsets.popper,
                            h = {
                                primary: function(e) {
                                    var n = d[e];
                                    return d[e] < c[e] && !t.escapeWithReference && (n = Z(d[e], c[e])), ce({}, e, n)
                                },
                                secondary: function(e) {
                                    var n = "right" === e ? "left" : "top",
                                        i = d[n];
                                    return d[e] > c[e] && !t.escapeWithReference && (i = G(d[n], c[e] - ("right" === e ? d.width : d.height))), ce({}, n, i)
                                }
                            };
                        return u.forEach(function(e) {
                            var t = -1 === ["left", "top"].indexOf(e) ? "secondary" : "primary";
                            d = ue({}, d, h[t](e))
                        }), e.offsets.popper = d, e
                    },
                    priority: ["left", "right", "top", "bottom"],
                    padding: 5,
                    boundariesElement: "scrollParent"
                },
                keepTogether: {
                    order: 400,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.offsets,
                            n = t.popper,
                            i = t.reference,
                            o = e.placement.split("-")[0],
                            r = Q,
                            s = -1 !== ["top", "bottom"].indexOf(o),
                            a = s ? "right" : "bottom",
                            l = s ? "left" : "top",
                            c = s ? "width" : "height";
                        return n[a] < r(i[l]) && (e.offsets.popper[l] = r(i[l]) - n[c]), n[l] > r(i[a]) && (e.offsets.popper[l] = r(i[a])), e
                    }
                },
                arrow: {
                    order: 500,
                    enabled: !0,
                    fn: function(e, n) {
                        var i;
                        if (!z(e.instance.modifiers, "arrow", "keepTogether")) return e;
                        var o = n.element;
                        if ("string" == typeof o) {
                            if (!(o = e.instance.popper.querySelector(o))) return e
                        } else if (!e.instance.popper.contains(o)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), e;
                        var r = e.placement.split("-")[0],
                            s = e.offsets,
                            a = s.popper,
                            l = s.reference,
                            c = -1 !== ["left", "right"].indexOf(r),
                            u = c ? "height" : "width",
                            d = c ? "Top" : "Left",
                            h = d.toLowerCase(),
                            p = c ? "left" : "top",
                            m = c ? "bottom" : "right",
                            g = S(o)[u];
                        l[m] - g < a[h] && (e.offsets.popper[h] -= a[h] - (l[m] - g)), l[h] + g > a[m] && (e.offsets.popper[h] += l[h] + g - a[m]), e.offsets.popper = f(e.offsets.popper);
                        var v = l[h] + l[u] / 2 - g / 2,
                            y = t(e.instance.popper),
                            b = parseFloat(y["margin" + d], 10),
                            w = parseFloat(y["border" + d + "Width"], 10),
                            _ = v - e.offsets.popper[h] - b - w;
                        return _ = Z(G(a[u] - g, _), 0), e.arrowElement = o, e.offsets.arrow = (i = {}, ce(i, h, K(_)), ce(i, p, ""), i), e
                    },
                    element: "[x-arrow]"
                },
                flip: {
                    order: 600,
                    enabled: !0,
                    fn: function(e, t) {
                        if (I(e.instance.modifiers, "inner")) return e;
                        if (e.flipped && e.placement === e.originalPlacement) return e;
                        var n = w(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement, e.positionFixed),
                            i = e.placement.split("-")[0],
                            o = C(i),
                            r = e.placement.split("-")[1] || "",
                            s = [];
                        switch (t.behavior) {
                            case pe.FLIP:
                                s = [i, o];
                                break;
                            case pe.CLOCKWISE:
                                s = B(i);
                                break;
                            case pe.COUNTERCLOCKWISE:
                                s = B(i, !0);
                                break;
                            default:
                                s = t.behavior
                        }
                        return s.forEach(function(a, l) {
                            if (i !== a || s.length === l + 1) return e;
                            i = e.placement.split("-")[0], o = C(i);
                            var c = e.offsets.popper,
                                u = e.offsets.reference,
                                d = Q,
                                h = "left" === i && d(c.right) > d(u.left) || "right" === i && d(c.left) < d(u.right) || "top" === i && d(c.bottom) > d(u.top) || "bottom" === i && d(c.top) < d(u.bottom),
                                p = d(c.left) < d(n.left),
                                f = d(c.right) > d(n.right),
                                m = d(c.top) < d(n.top),
                                g = d(c.bottom) > d(n.bottom),
                                v = "left" === i && p || "right" === i && f || "top" === i && m || "bottom" === i && g,
                                y = -1 !== ["top", "bottom"].indexOf(i),
                                b = !!t.flipVariations && (y && "start" === r && p || y && "end" === r && f || !y && "start" === r && m || !y && "end" === r && g);
                            (h || v || b) && (e.flipped = !0, (h || v) && (i = s[l + 1]), b && (r = Y(r)), e.placement = i + (r ? "-" + r : ""), e.offsets.popper = ue({}, e.offsets.popper, k(e.instance.popper, e.offsets.reference, e.placement)), e = D(e.instance.modifiers, e, "flip"))
                        }), e
                    },
                    behavior: "flip",
                    padding: 5,
                    boundariesElement: "viewport"
                },
                inner: {
                    order: 700,
                    enabled: !1,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            i = e.offsets,
                            o = i.popper,
                            r = i.reference,
                            s = -1 !== ["left", "right"].indexOf(n),
                            a = -1 === ["top", "left"].indexOf(n);
                        return o[s ? "left" : "top"] = r[n] - (a ? o[s ? "width" : "height"] : 0), e.placement = C(t), e.offsets.popper = f(o), e
                    }
                },
                hide: {
                    order: 800,
                    enabled: !0,
                    fn: function(e) {
                        if (!z(e.instance.modifiers, "hide", "preventOverflow")) return e;
                        var t = e.offsets.reference,
                            n = E(e.instance.modifiers, function(e) {
                                return "preventOverflow" === e.name
                            }).boundaries;
                        if (t.bottom < n.top || t.left > n.right || t.top > n.bottom || t.right < n.left) {
                            if (!0 === e.hide) return e;
                            e.hide = !0, e.attributes["x-out-of-boundaries"] = ""
                        } else {
                            if (!1 === e.hide) return e;
                            e.hide = !1, e.attributes["x-out-of-boundaries"] = !1
                        }
                        return e
                    }
                },
                computeStyle: {
                    order: 850,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.x,
                            i = t.y,
                            o = e.offsets.popper,
                            s = E(e.instance.modifiers, function(e) {
                                return "applyStyle" === e.name
                            }).gpuAcceleration;
                        void 0 !== s && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
                        var a, l, c = void 0 === s ? t.gpuAcceleration : s,
                            u = r(e.instance.popper),
                            d = m(u),
                            h = {
                                position: o.position
                            },
                            p = {
                                left: Q(o.left),
                                top: K(o.top),
                                bottom: K(o.bottom),
                                right: Q(o.right)
                            },
                            f = "bottom" === n ? "top" : "bottom",
                            g = "right" === i ? "left" : "right",
                            v = $("transform");
                        if (l = "bottom" == f ? -d.height + p.bottom : p.top, a = "right" == g ? -d.width + p.right : p.left, c && v) h[v] = "translate3d(" + a + "px, " + l + "px, 0)", h[f] = 0, h[g] = 0, h.willChange = "transform";
                        else {
                            var y = "bottom" == f ? -1 : 1,
                                b = "right" == g ? -1 : 1;
                            h[f] = l * y, h[g] = a * b, h.willChange = f + ", " + g
                        }
                        var w = {
                            "x-placement": e.placement
                        };
                        return e.attributes = ue({}, w, e.attributes), e.styles = ue({}, h, e.styles), e.arrowStyles = ue({}, e.offsets.arrow, e.arrowStyles), e
                    },
                    gpuAcceleration: !0,
                    x: "bottom",
                    y: "right"
                },
                applyStyle: {
                    order: 900,
                    enabled: !0,
                    fn: function(e) {
                        return q(e.instance.popper, e.styles), W(e.instance.popper, e.attributes), e.arrowElement && Object.keys(e.arrowStyles).length && q(e.arrowElement, e.arrowStyles), e
                    },
                    onLoad: function(e, t, n, i, o) {
                        var r = T(o, t, e, n.positionFixed),
                            s = x(n.placement, r, t, e, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
                        return t.setAttribute("x-placement", s), q(t, {
                            position: n.positionFixed ? "fixed" : "absolute"
                        }), n
                    },
                    gpuAcceleration: void 0
                }
            }
        }, fe
    }),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? t(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], t) : t(e.bootstrap = {}, e.jQuery, e.Popper)
    }(this, function(e, t, n) {
        "use strict";

        function i(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
            }
        }

        function o(e, t, n) {
            return t && i(e.prototype, t), n && i(e, n), e
        }

        function r(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {},
                    i = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols && (i = i.concat(Object.getOwnPropertySymbols(n).filter(function(e) {
                    return Object.getOwnPropertyDescriptor(n, e).enumerable
                }))), i.forEach(function(t) {
                    var i, o, r;
                    i = e, r = n[o = t], o in i ? Object.defineProperty(i, o, {
                        value: r,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0
                    }) : i[o] = r
                })
            }
            return e
        }
        t = t && t.hasOwnProperty("default") ? t.default : t, n = n && n.hasOwnProperty("default") ? n.default : n;
        var s, a, l, c, u, d, h, p, f, m, g, v, y, b, w, _, x, T, S, C, k, E, A, D, O, I, $, L, N, M, P, j, H, F, R, q, W, z, Y, B, X, U, V, G, K, Q, Z, J, ee, te, ne, ie, oe, re, se, ae, le, ce, ue, de, he, pe, fe, me, ge, ve, ye, be, we, _e, xe, Te, Se, Ce, ke, Ee, Ae, De, Oe, Ie, $e, Le, Ne, Me, Pe, je, He, Fe, Re, qe, We, ze, Ye, Be, Xe, Ue, Ve, Ge, Ke, Qe, Ze, Je, et, tt, nt, it, ot, rt, st, at, lt, ct, ut, dt, ht, pt, ft, mt, gt, vt, yt, bt, wt, _t, xt, Tt, St, Ct, kt, Et, At, Dt, Ot, It, $t, Lt, Nt, Mt, Pt, jt, Ht, Ft, Rt, qt, Wt, zt, Yt, Bt, Xt, Ut, Vt, Gt, Kt, Qt, Zt, Jt, en, tn, nn, on, rn, sn, an, ln, cn, un, dn, hn, pn, fn, mn, gn, vn, yn, bn, wn, _n, xn = function(e) {
                function t(t) {
                    var n = this,
                        o = !1;
                    return e(this).one(i.TRANSITION_END, function() {
                        o = !0
                    }), setTimeout(function() {
                        o || i.triggerTransitionEnd(n)
                    }, t), this
                }
                var n = "transitionend",
                    i = {
                        TRANSITION_END: "bsTransitionEnd",
                        getUID: function(e) {
                            for (; e += ~~(1e6 * Math.random()), document.getElementById(e););
                            return e
                        },
                        getSelectorFromElement: function(t) {
                            var n = t.getAttribute("data-target");
                            n && "#" !== n || (n = t.getAttribute("href") || "");
                            try {
                                return 0 < e(document).find(n).length ? n : null
                            } catch (t) {
                                return null
                            }
                        },
                        getTransitionDurationFromElement: function(t) {
                            if (!t) return 0;
                            var n = e(t).css("transition-duration");
                            return parseFloat(n) ? (n = n.split(",")[0], 1e3 * parseFloat(n)) : 0
                        },
                        reflow: function(e) {
                            return e.offsetHeight
                        },
                        triggerTransitionEnd: function(t) {
                            e(t).trigger(n)
                        },
                        supportsTransitionEnd: function() {
                            return Boolean(n)
                        },
                        isElement: function(e) {
                            return (e[0] || e).nodeType
                        },
                        typeCheckConfig: function(e, t, n) {
                            for (var o in n)
                                if (Object.prototype.hasOwnProperty.call(n, o)) {
                                    var r = n[o],
                                        s = t[o],
                                        a = s && i.isElement(s) ? "element" : (l = s, {}.toString.call(l).match(/\s([a-z]+)/i)[1].toLowerCase());
                                    if (!new RegExp(r).test(a)) throw new Error(e.toUpperCase() + ': Option "' + o + '" provided type "' + a + '" but expected type "' + r + '".')
                                }
                            var l
                        }
                    };
                return e.fn.emulateTransitionEnd = t, e.event.special[i.TRANSITION_END] = {
                    bindType: n,
                    delegateType: n,
                    handle: function(t) {
                        if (e(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
                    }
                }, i
            }(t),
            Tn = (a = "alert", c = "." + (l = "bs.alert"), u = (s = t).fn[a], d = {
                CLOSE: "close" + c,
                CLOSED: "closed" + c,
                CLICK_DATA_API: "click" + c + ".data-api"
            }, h = "alert", p = "fade", f = "show", m = function() {
                function e(e) {
                    this._element = e
                }
                var t = e.prototype;
                return t.close = function(e) {
                    var t = this._element;
                    e && (t = this._getRootElement(e)), this._triggerCloseEvent(t).isDefaultPrevented() || this._removeElement(t)
                }, t.dispose = function() {
                    s.removeData(this._element, l), this._element = null
                }, t._getRootElement = function(e) {
                    var t = xn.getSelectorFromElement(e),
                        n = !1;
                    return t && (n = s(t)[0]), n || (n = s(e).closest("." + h)[0]), n
                }, t._triggerCloseEvent = function(e) {
                    var t = s.Event(d.CLOSE);
                    return s(e).trigger(t), t
                }, t._removeElement = function(e) {
                    var t = this;
                    if (s(e).removeClass(f), s(e).hasClass(p)) {
                        var n = xn.getTransitionDurationFromElement(e);
                        s(e).one(xn.TRANSITION_END, function(n) {
                            return t._destroyElement(e, n)
                        }).emulateTransitionEnd(n)
                    } else this._destroyElement(e)
                }, t._destroyElement = function(e) {
                    s(e).detach().trigger(d.CLOSED).remove()
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = s(this),
                            i = n.data(l);
                        i || (i = new e(this), n.data(l, i)), "close" === t && i[t](this)
                    })
                }, e._handleDismiss = function(e) {
                    return function(t) {
                        t && t.preventDefault(), e.close(this)
                    }
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }]), e
            }(), s(document).on(d.CLICK_DATA_API, '[data-dismiss="alert"]', m._handleDismiss(new m)), s.fn[a] = m._jQueryInterface, s.fn[a].Constructor = m, s.fn[a].noConflict = function() {
                return s.fn[a] = u, m._jQueryInterface
            }, m),
            Sn = (v = "button", b = "." + (y = "bs.button"), w = ".data-api", _ = (g = t).fn[v], x = "active", T = "btn", C = '[data-toggle^="button"]', k = '[data-toggle="buttons"]', E = "input", A = ".active", D = ".btn", O = {
                CLICK_DATA_API: "click" + b + w,
                FOCUS_BLUR_DATA_API: (S = "focus") + b + w + " blur" + b + w
            }, I = function() {
                function e(e) {
                    this._element = e
                }
                var t = e.prototype;
                return t.toggle = function() {
                    var e = !0,
                        t = !0,
                        n = g(this._element).closest(k)[0];
                    if (n) {
                        var i = g(this._element).find(E)[0];
                        if (i) {
                            if ("radio" === i.type)
                                if (i.checked && g(this._element).hasClass(x)) e = !1;
                                else {
                                    var o = g(n).find(A)[0];
                                    o && g(o).removeClass(x)
                                }
                            if (e) {
                                if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled")) return;
                                i.checked = !g(this._element).hasClass(x), g(i).trigger("change")
                            }
                            i.focus(), t = !1
                        }
                    }
                    t && this._element.setAttribute("aria-pressed", !g(this._element).hasClass(x)), e && g(this._element).toggleClass(x)
                }, t.dispose = function() {
                    g.removeData(this._element, y), this._element = null
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = g(this).data(y);
                        n || (n = new e(this), g(this).data(y, n)), "toggle" === t && n[t]()
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }]), e
            }(), g(document).on(O.CLICK_DATA_API, C, function(e) {
                e.preventDefault();
                var t = e.target;
                g(t).hasClass(T) || (t = g(t).closest(D)), I._jQueryInterface.call(g(t), "toggle")
            }).on(O.FOCUS_BLUR_DATA_API, C, function(e) {
                var t = g(e.target).closest(D)[0];
                g(t).toggleClass(S, /^focus(in)?$/.test(e.type))
            }), g.fn[v] = I._jQueryInterface, g.fn[v].Constructor = I, g.fn[v].noConflict = function() {
                return g.fn[v] = _, I._jQueryInterface
            }, I),
            Cn = (L = "carousel", M = "." + (N = "bs.carousel"), P = ".data-api", j = ($ = t).fn[L], H = {
                interval: 5e3,
                keyboard: !0,
                slide: !1,
                pause: "hover",
                wrap: !0
            }, F = {
                interval: "(number|boolean)",
                keyboard: "boolean",
                slide: "(boolean|string)",
                pause: "(string|boolean)",
                wrap: "boolean"
            }, R = "next", q = "prev", W = "left", z = "right", Y = {
                SLIDE: "slide" + M,
                SLID: "slid" + M,
                KEYDOWN: "keydown" + M,
                MOUSEENTER: "mouseenter" + M,
                MOUSELEAVE: "mouseleave" + M,
                TOUCHEND: "touchend" + M,
                LOAD_DATA_API: "load" + M + P,
                CLICK_DATA_API: "click" + M + P
            }, B = "carousel", X = "active", U = "slide", V = "carousel-item-right", G = "carousel-item-left", K = "carousel-item-next", Q = "carousel-item-prev", Z = {
                ACTIVE: ".active",
                ACTIVE_ITEM: ".active.carousel-item",
                ITEM: ".carousel-item",
                NEXT_PREV: ".carousel-item-next, .carousel-item-prev",
                INDICATORS: ".carousel-indicators",
                DATA_SLIDE: "[data-slide], [data-slide-to]",
                DATA_RIDE: '[data-ride="carousel"]'
            }, J = function() {
                function e(e, t) {
                    this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this._config = this._getConfig(t), this._element = $(e)[0], this._indicatorsElement = $(this._element).find(Z.INDICATORS)[0], this._addEventListeners()
                }
                var t = e.prototype;
                return t.next = function() {
                    this._isSliding || this._slide(R)
                }, t.nextWhenVisible = function() {
                    !document.hidden && $(this._element).is(":visible") && "hidden" !== $(this._element).css("visibility") && this.next()
                }, t.prev = function() {
                    this._isSliding || this._slide(q)
                }, t.pause = function(e) {
                    e || (this._isPaused = !0), $(this._element).find(Z.NEXT_PREV)[0] && (xn.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
                }, t.cycle = function(e) {
                    e || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
                }, t.to = function(e) {
                    var t = this;
                    this._activeElement = $(this._element).find(Z.ACTIVE_ITEM)[0];
                    var n = this._getItemIndex(this._activeElement);
                    if (!(e > this._items.length - 1 || e < 0))
                        if (this._isSliding) $(this._element).one(Y.SLID, function() {
                            return t.to(e)
                        });
                        else {
                            if (n === e) return this.pause(), void this.cycle();
                            var i = n < e ? R : q;
                            this._slide(i, this._items[e])
                        }
                }, t.dispose = function() {
                    $(this._element).off(M), $.removeData(this._element, N), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null
                }, t._getConfig = function(e) {
                    return e = r({}, H, e), xn.typeCheckConfig(L, e, F), e
                }, t._addEventListeners = function() {
                    var e = this;
                    this._config.keyboard && $(this._element).on(Y.KEYDOWN, function(t) {
                        return e._keydown(t)
                    }), "hover" === this._config.pause && ($(this._element).on(Y.MOUSEENTER, function(t) {
                        return e.pause(t)
                    }).on(Y.MOUSELEAVE, function(t) {
                        return e.cycle(t)
                    }), "ontouchstart" in document.documentElement && $(this._element).on(Y.TOUCHEND, function() {
                        e.pause(), e.touchTimeout && clearTimeout(e.touchTimeout), e.touchTimeout = setTimeout(function(t) {
                            return e.cycle(t)
                        }, 500 + e._config.interval)
                    }))
                }, t._keydown = function(e) {
                    if (!/input|textarea/i.test(e.target.tagName)) switch (e.which) {
                        case 37:
                            e.preventDefault(), this.prev();
                            break;
                        case 39:
                            e.preventDefault(), this.next()
                    }
                }, t._getItemIndex = function(e) {
                    return this._items = $.makeArray($(e).parent().find(Z.ITEM)), this._items.indexOf(e)
                }, t._getItemByDirection = function(e, t) {
                    var n = e === R,
                        i = e === q,
                        o = this._getItemIndex(t),
                        r = this._items.length - 1;
                    if ((i && 0 === o || n && o === r) && !this._config.wrap) return t;
                    var s = (o + (e === q ? -1 : 1)) % this._items.length;
                    return -1 === s ? this._items[this._items.length - 1] : this._items[s]
                }, t._triggerSlideEvent = function(e, t) {
                    var n = this._getItemIndex(e),
                        i = this._getItemIndex($(this._element).find(Z.ACTIVE_ITEM)[0]),
                        o = $.Event(Y.SLIDE, {
                            relatedTarget: e,
                            direction: t,
                            from: i,
                            to: n
                        });
                    return $(this._element).trigger(o), o
                }, t._setActiveIndicatorElement = function(e) {
                    if (this._indicatorsElement) {
                        $(this._indicatorsElement).find(Z.ACTIVE).removeClass(X);
                        var t = this._indicatorsElement.children[this._getItemIndex(e)];
                        t && $(t).addClass(X)
                    }
                }, t._slide = function(e, t) {
                    var n, i, o, r = this,
                        s = $(this._element).find(Z.ACTIVE_ITEM)[0],
                        a = this._getItemIndex(s),
                        l = t || s && this._getItemByDirection(e, s),
                        c = this._getItemIndex(l),
                        u = Boolean(this._interval);
                    if (e === R ? (n = G, i = K, o = W) : (n = V, i = Q, o = z), l && $(l).hasClass(X)) this._isSliding = !1;
                    else if (!this._triggerSlideEvent(l, o).isDefaultPrevented() && s && l) {
                        this._isSliding = !0, u && this.pause(), this._setActiveIndicatorElement(l);
                        var d = $.Event(Y.SLID, {
                            relatedTarget: l,
                            direction: o,
                            from: a,
                            to: c
                        });
                        if ($(this._element).hasClass(U)) {
                            $(l).addClass(i), xn.reflow(l), $(s).addClass(n), $(l).addClass(n);
                            var h = xn.getTransitionDurationFromElement(s);
                            $(s).one(xn.TRANSITION_END, function() {
                                $(l).removeClass(n + " " + i).addClass(X), $(s).removeClass(X + " " + i + " " + n), r._isSliding = !1, setTimeout(function() {
                                    return $(r._element).trigger(d)
                                }, 0)
                            }).emulateTransitionEnd(h)
                        } else $(s).removeClass(X), $(l).addClass(X), this._isSliding = !1, $(this._element).trigger(d);
                        u && this.cycle()
                    }
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = $(this).data(N),
                            i = r({}, H, $(this).data());
                        "object" == typeof t && (i = r({}, i, t));
                        var o = "string" == typeof t ? t : i.slide;
                        if (n || (n = new e(this, i), $(this).data(N, n)), "number" == typeof t) n.to(t);
                        else if ("string" == typeof o) {
                            if (void 0 === n[o]) throw new TypeError('No method named "' + o + '"');
                            n[o]()
                        } else i.interval && (n.pause(), n.cycle())
                    })
                }, e._dataApiClickHandler = function(t) {
                    var n = xn.getSelectorFromElement(this);
                    if (n) {
                        var i = $(n)[0];
                        if (i && $(i).hasClass(B)) {
                            var o = r({}, $(i).data(), $(this).data()),
                                s = this.getAttribute("data-slide-to");
                            s && (o.interval = !1), e._jQueryInterface.call($(i), o), s && $(i).data(N).to(s), t.preventDefault()
                        }
                    }
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return H
                    }
                }]), e
            }(), $(document).on(Y.CLICK_DATA_API, Z.DATA_SLIDE, J._dataApiClickHandler), $(window).on(Y.LOAD_DATA_API, function() {
                $(Z.DATA_RIDE).each(function() {
                    var e = $(this);
                    J._jQueryInterface.call(e, e.data())
                })
            }), $.fn[L] = J._jQueryInterface, $.fn[L].Constructor = J, $.fn[L].noConflict = function() {
                return $.fn[L] = j, J._jQueryInterface
            }, J),
            kn = (te = "collapse", ie = "." + (ne = "bs.collapse"), oe = (ee = t).fn[te], re = {
                toggle: !0,
                parent: ""
            }, se = {
                toggle: "boolean",
                parent: "(string|element)"
            }, ae = {
                SHOW: "show" + ie,
                SHOWN: "shown" + ie,
                HIDE: "hide" + ie,
                HIDDEN: "hidden" + ie,
                CLICK_DATA_API: "click" + ie + ".data-api"
            }, le = "show", ce = "collapse", ue = "collapsing", de = "collapsed", he = "width", pe = "height", fe = {
                ACTIVES: ".show, .collapsing",
                DATA_TOGGLE: '[data-toggle="collapse"]'
            }, me = function() {
                function e(e, t) {
                    this._isTransitioning = !1, this._element = e, this._config = this._getConfig(t), this._triggerArray = ee.makeArray(ee('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'));
                    for (var n = ee(fe.DATA_TOGGLE), i = 0; i < n.length; i++) {
                        var o = n[i],
                            r = xn.getSelectorFromElement(o);
                        null !== r && 0 < ee(r).filter(e).length && (this._selector = r, this._triggerArray.push(o))
                    }
                    this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle()
                }
                var t = e.prototype;
                return t.toggle = function() {
                    ee(this._element).hasClass(le) ? this.hide() : this.show()
                }, t.show = function() {
                    var t, n, i = this;
                    if (!(this._isTransitioning || ee(this._element).hasClass(le) || (this._parent && 0 === (t = ee.makeArray(ee(this._parent).find(fe.ACTIVES).filter('[data-parent="' + this._config.parent + '"]'))).length && (t = null), t && (n = ee(t).not(this._selector).data(ne)) && n._isTransitioning))) {
                        var o = ee.Event(ae.SHOW);
                        if (ee(this._element).trigger(o), !o.isDefaultPrevented()) {
                            t && (e._jQueryInterface.call(ee(t).not(this._selector), "hide"), n || ee(t).data(ne, null));
                            var r = this._getDimension();
                            ee(this._element).removeClass(ce).addClass(ue), (this._element.style[r] = 0) < this._triggerArray.length && ee(this._triggerArray).removeClass(de).attr("aria-expanded", !0), this.setTransitioning(!0);
                            var s = "scroll" + (r[0].toUpperCase() + r.slice(1)),
                                a = xn.getTransitionDurationFromElement(this._element);
                            ee(this._element).one(xn.TRANSITION_END, function() {
                                ee(i._element).removeClass(ue).addClass(ce).addClass(le), i._element.style[r] = "", i.setTransitioning(!1), ee(i._element).trigger(ae.SHOWN)
                            }).emulateTransitionEnd(a), this._element.style[r] = this._element[s] + "px"
                        }
                    }
                }, t.hide = function() {
                    var e = this;
                    if (!this._isTransitioning && ee(this._element).hasClass(le)) {
                        var t = ee.Event(ae.HIDE);
                        if (ee(this._element).trigger(t), !t.isDefaultPrevented()) {
                            var n = this._getDimension();
                            if (this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", xn.reflow(this._element), ee(this._element).addClass(ue).removeClass(ce).removeClass(le), 0 < this._triggerArray.length)
                                for (var i = 0; i < this._triggerArray.length; i++) {
                                    var o = this._triggerArray[i],
                                        r = xn.getSelectorFromElement(o);
                                    null !== r && (ee(r).hasClass(le) || ee(o).addClass(de).attr("aria-expanded", !1))
                                }
                            this.setTransitioning(!0), this._element.style[n] = "";
                            var s = xn.getTransitionDurationFromElement(this._element);
                            ee(this._element).one(xn.TRANSITION_END, function() {
                                e.setTransitioning(!1), ee(e._element).removeClass(ue).addClass(ce).trigger(ae.HIDDEN)
                            }).emulateTransitionEnd(s)
                        }
                    }
                }, t.setTransitioning = function(e) {
                    this._isTransitioning = e
                }, t.dispose = function() {
                    ee.removeData(this._element, ne), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null
                }, t._getConfig = function(e) {
                    return (e = r({}, re, e)).toggle = Boolean(e.toggle), xn.typeCheckConfig(te, e, se), e
                }, t._getDimension = function() {
                    return ee(this._element).hasClass(he) ? he : pe
                }, t._getParent = function() {
                    var t = this,
                        n = null;
                    xn.isElement(this._config.parent) ? (n = this._config.parent, void 0 !== this._config.parent.jquery && (n = this._config.parent[0])) : n = ee(this._config.parent)[0];
                    var i = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]';
                    return ee(n).find(i).each(function(n, i) {
                        t._addAriaAndCollapsedClass(e._getTargetFromElement(i), [i])
                    }), n
                }, t._addAriaAndCollapsedClass = function(e, t) {
                    if (e) {
                        var n = ee(e).hasClass(le);
                        0 < t.length && ee(t).toggleClass(de, !n).attr("aria-expanded", n)
                    }
                }, e._getTargetFromElement = function(e) {
                    var t = xn.getSelectorFromElement(e);
                    return t ? ee(t)[0] : null
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = ee(this),
                            i = n.data(ne),
                            o = r({}, re, n.data(), "object" == typeof t && t ? t : {});
                        if (!i && o.toggle && /show|hide/.test(t) && (o.toggle = !1), i || (i = new e(this, o), n.data(ne, i)), "string" == typeof t) {
                            if (void 0 === i[t]) throw new TypeError('No method named "' + t + '"');
                            i[t]()
                        }
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return re
                    }
                }]), e
            }(), ee(document).on(ae.CLICK_DATA_API, fe.DATA_TOGGLE, function(e) {
                "A" === e.currentTarget.tagName && e.preventDefault();
                var t = ee(this),
                    n = xn.getSelectorFromElement(this);
                ee(n).each(function() {
                    var e = ee(this),
                        n = e.data(ne) ? "toggle" : t.data();
                    me._jQueryInterface.call(e, n)
                })
            }), ee.fn[te] = me._jQueryInterface, ee.fn[te].Constructor = me, ee.fn[te].noConflict = function() {
                return ee.fn[te] = oe, me._jQueryInterface
            }, me),
            En = (ve = "dropdown", be = "." + (ye = "bs.dropdown"), we = ".data-api", _e = (ge = t).fn[ve], xe = new RegExp("38|40|27"), Te = {
                HIDE: "hide" + be,
                HIDDEN: "hidden" + be,
                SHOW: "show" + be,
                SHOWN: "shown" + be,
                CLICK: "click" + be,
                CLICK_DATA_API: "click" + be + we,
                KEYDOWN_DATA_API: "keydown" + be + we,
                KEYUP_DATA_API: "keyup" + be + we
            }, Se = "disabled", Ce = "show", ke = "dropup", Ee = "dropright", Ae = "dropleft", De = "dropdown-menu-right", Oe = "position-static", Ie = '[data-toggle="dropdown"]', $e = ".dropdown form", Le = ".dropdown-menu", Ne = ".navbar-nav", Me = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", Pe = "top-start", je = "top-end", He = "bottom-start", Fe = "bottom-end", Re = "right-start", qe = "left-start", We = {
                offset: 0,
                flip: !0,
                boundary: "scrollParent",
                reference: "toggle",
                display: "dynamic"
            }, ze = {
                offset: "(number|string|function)",
                flip: "boolean",
                boundary: "(string|element)",
                reference: "(string|element)",
                display: "string"
            }, Ye = function() {
                function e(e, t) {
                    this._element = e, this._popper = null, this._config = this._getConfig(t), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners()
                }
                var t = e.prototype;
                return t.toggle = function() {
                    if (!this._element.disabled && !ge(this._element).hasClass(Se)) {
                        var t = e._getParentFromElement(this._element),
                            i = ge(this._menu).hasClass(Ce);
                        if (e._clearMenus(), !i) {
                            var o = {
                                    relatedTarget: this._element
                                },
                                r = ge.Event(Te.SHOW, o);
                            if (ge(t).trigger(r), !r.isDefaultPrevented()) {
                                if (!this._inNavbar) {
                                    if (void 0 === n) throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");
                                    var s = this._element;
                                    "parent" === this._config.reference ? s = t : xn.isElement(this._config.reference) && (s = this._config.reference, void 0 !== this._config.reference.jquery && (s = this._config.reference[0])), "scrollParent" !== this._config.boundary && ge(t).addClass(Oe), this._popper = new n(s, this._menu, this._getPopperConfig())
                                }
                                "ontouchstart" in document.documentElement && 0 === ge(t).closest(Ne).length && ge(document.body).children().on("mouseover", null, ge.noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), ge(this._menu).toggleClass(Ce), ge(t).toggleClass(Ce).trigger(ge.Event(Te.SHOWN, o))
                            }
                        }
                    }
                }, t.dispose = function() {
                    ge.removeData(this._element, ye), ge(this._element).off(be), this._element = null, (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null)
                }, t.update = function() {
                    this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate()
                }, t._addEventListeners = function() {
                    var e = this;
                    ge(this._element).on(Te.CLICK, function(t) {
                        t.preventDefault(), t.stopPropagation(), e.toggle()
                    })
                }, t._getConfig = function(e) {
                    return e = r({}, this.constructor.Default, ge(this._element).data(), e), xn.typeCheckConfig(ve, e, this.constructor.DefaultType), e
                }, t._getMenuElement = function() {
                    if (!this._menu) {
                        var t = e._getParentFromElement(this._element);
                        this._menu = ge(t).find(Le)[0]
                    }
                    return this._menu
                }, t._getPlacement = function() {
                    var e = ge(this._element).parent(),
                        t = He;
                    return e.hasClass(ke) ? (t = Pe, ge(this._menu).hasClass(De) && (t = je)) : e.hasClass(Ee) ? t = Re : e.hasClass(Ae) ? t = qe : ge(this._menu).hasClass(De) && (t = Fe), t
                }, t._detectNavbar = function() {
                    return 0 < ge(this._element).closest(".navbar").length
                }, t._getPopperConfig = function() {
                    var e = this,
                        t = {};
                    "function" == typeof this._config.offset ? t.fn = function(t) {
                        return t.offsets = r({}, t.offsets, e._config.offset(t.offsets) || {}), t
                    } : t.offset = this._config.offset;
                    var n = {
                        placement: this._getPlacement(),
                        modifiers: {
                            offset: t,
                            flip: {
                                enabled: this._config.flip
                            },
                            preventOverflow: {
                                boundariesElement: this._config.boundary
                            }
                        }
                    };
                    return "static" === this._config.display && (n.modifiers.applyStyle = {
                        enabled: !1
                    }), n
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = ge(this).data(ye);
                        if (n || (n = new e(this, "object" == typeof t ? t : null), ge(this).data(ye, n)), "string" == typeof t) {
                            if (void 0 === n[t]) throw new TypeError('No method named "' + t + '"');
                            n[t]()
                        }
                    })
                }, e._clearMenus = function(t) {
                    if (!t || 3 !== t.which && ("keyup" !== t.type || 9 === t.which))
                        for (var n = ge.makeArray(ge(Ie)), i = 0; i < n.length; i++) {
                            var o = e._getParentFromElement(n[i]),
                                r = ge(n[i]).data(ye),
                                s = {
                                    relatedTarget: n[i]
                                };
                            if (r) {
                                var a = r._menu;
                                if (ge(o).hasClass(Ce) && !(t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && 9 === t.which) && ge.contains(o, t.target))) {
                                    var l = ge.Event(Te.HIDE, s);
                                    ge(o).trigger(l), l.isDefaultPrevented() || ("ontouchstart" in document.documentElement && ge(document.body).children().off("mouseover", null, ge.noop), n[i].setAttribute("aria-expanded", "false"), ge(a).removeClass(Ce), ge(o).removeClass(Ce).trigger(ge.Event(Te.HIDDEN, s)))
                                }
                            }
                        }
                }, e._getParentFromElement = function(e) {
                    var t, n = xn.getSelectorFromElement(e);
                    return n && (t = ge(n)[0]), t || e.parentNode
                }, e._dataApiKeydownHandler = function(t) {
                    if ((/input|textarea/i.test(t.target.tagName) ? !(32 === t.which || 27 !== t.which && (40 !== t.which && 38 !== t.which || ge(t.target).closest(Le).length)) : xe.test(t.which)) && (t.preventDefault(), t.stopPropagation(), !this.disabled && !ge(this).hasClass(Se))) {
                        var n = e._getParentFromElement(this),
                            i = ge(n).hasClass(Ce);
                        if ((i || 27 === t.which && 32 === t.which) && (!i || 27 !== t.which && 32 !== t.which)) {
                            var o = ge(n).find(Me).get();
                            if (0 !== o.length) {
                                var r = o.indexOf(t.target);
                                38 === t.which && 0 < r && r--, 40 === t.which && r < o.length - 1 && r++, r < 0 && (r = 0), o[r].focus()
                            }
                        } else {
                            if (27 === t.which) {
                                var s = ge(n).find(Ie)[0];
                                ge(s).trigger("focus")
                            }
                            ge(this).trigger("click")
                        }
                    }
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return We
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return ze
                    }
                }]), e
            }(), ge(document).on(Te.KEYDOWN_DATA_API, Ie, Ye._dataApiKeydownHandler).on(Te.KEYDOWN_DATA_API, Le, Ye._dataApiKeydownHandler).on(Te.CLICK_DATA_API + " " + Te.KEYUP_DATA_API, Ye._clearMenus).on(Te.CLICK_DATA_API, Ie, function(e) {
                e.preventDefault(), e.stopPropagation(), Ye._jQueryInterface.call(ge(this), "toggle")
            }).on(Te.CLICK_DATA_API, $e, function(e) {
                e.stopPropagation()
            }), ge.fn[ve] = Ye._jQueryInterface, ge.fn[ve].Constructor = Ye, ge.fn[ve].noConflict = function() {
                return ge.fn[ve] = _e, Ye._jQueryInterface
            }, Ye),
            An = (Xe = "modal", Ve = "." + (Ue = "bs.modal"), Ge = (Be = t).fn[Xe], Ke = {
                backdrop: !0,
                keyboard: !0,
                focus: !0,
                show: !0
            }, Qe = {
                backdrop: "(boolean|string)",
                keyboard: "boolean",
                focus: "boolean",
                show: "boolean"
            }, Ze = {
                HIDE: "hide" + Ve,
                HIDDEN: "hidden" + Ve,
                SHOW: "show" + Ve,
                SHOWN: "shown" + Ve,
                FOCUSIN: "focusin" + Ve,
                RESIZE: "resize" + Ve,
                CLICK_DISMISS: "click.dismiss" + Ve,
                KEYDOWN_DISMISS: "keydown.dismiss" + Ve,
                MOUSEUP_DISMISS: "mouseup.dismiss" + Ve,
                MOUSEDOWN_DISMISS: "mousedown.dismiss" + Ve,
                CLICK_DATA_API: "click" + Ve + ".data-api"
            }, Je = "modal-scrollbar-measure", et = "modal-backdrop", tt = "modal-open", nt = "fade", it = "show", ot = {
                DIALOG: ".modal-dialog",
                DATA_TOGGLE: '[data-toggle="modal"]',
                DATA_DISMISS: '[data-dismiss="modal"]',
                FIXED_CONTENT: ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
                STICKY_CONTENT: ".sticky-top",
                NAVBAR_TOGGLER: ".navbar-toggler"
            }, rt = function() {
                function e(e, t) {
                    this._config = this._getConfig(t), this._element = e, this._dialog = Be(e).find(ot.DIALOG)[0], this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._scrollbarWidth = 0
                }
                var t = e.prototype;
                return t.toggle = function(e) {
                    return this._isShown ? this.hide() : this.show(e)
                }, t.show = function(e) {
                    var t = this;
                    if (!this._isTransitioning && !this._isShown) {
                        Be(this._element).hasClass(nt) && (this._isTransitioning = !0);
                        var n = Be.Event(Ze.SHOW, {
                            relatedTarget: e
                        });
                        Be(this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), Be(document.body).addClass(tt), this._setEscapeEvent(), this._setResizeEvent(), Be(this._element).on(Ze.CLICK_DISMISS, ot.DATA_DISMISS, function(e) {
                            return t.hide(e)
                        }), Be(this._dialog).on(Ze.MOUSEDOWN_DISMISS, function() {
                            Be(t._element).one(Ze.MOUSEUP_DISMISS, function(e) {
                                Be(e.target).is(t._element) && (t._ignoreBackdropClick = !0)
                            })
                        }), this._showBackdrop(function() {
                            return t._showElement(e)
                        }))
                    }
                }, t.hide = function(e) {
                    var t = this;
                    if (e && e.preventDefault(), !this._isTransitioning && this._isShown) {
                        var n = Be.Event(Ze.HIDE);
                        if (Be(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
                            this._isShown = !1;
                            var i = Be(this._element).hasClass(nt);
                            if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), Be(document).off(Ze.FOCUSIN), Be(this._element).removeClass(it), Be(this._element).off(Ze.CLICK_DISMISS), Be(this._dialog).off(Ze.MOUSEDOWN_DISMISS), i) {
                                var o = xn.getTransitionDurationFromElement(this._element);
                                Be(this._element).one(xn.TRANSITION_END, function(e) {
                                    return t._hideModal(e)
                                }).emulateTransitionEnd(o)
                            } else this._hideModal()
                        }
                    }
                }, t.dispose = function() {
                    Be.removeData(this._element, Ue), Be(window, document, this._element, this._backdrop).off(Ve), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._scrollbarWidth = null
                }, t.handleUpdate = function() {
                    this._adjustDialog()
                }, t._getConfig = function(e) {
                    return e = r({}, Ke, e), xn.typeCheckConfig(Xe, e, Qe), e
                }, t._showElement = function(e) {
                    var t = this,
                        n = Be(this._element).hasClass(nt);
                    this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.scrollTop = 0, n && xn.reflow(this._element), Be(this._element).addClass(it), this._config.focus && this._enforceFocus();
                    var i = Be.Event(Ze.SHOWN, {
                            relatedTarget: e
                        }),
                        o = function() {
                            t._config.focus && t._element.focus(), t._isTransitioning = !1, Be(t._element).trigger(i)
                        };
                    if (n) {
                        var r = xn.getTransitionDurationFromElement(this._element);
                        Be(this._dialog).one(xn.TRANSITION_END, o).emulateTransitionEnd(r)
                    } else o()
                }, t._enforceFocus = function() {
                    var e = this;
                    Be(document).off(Ze.FOCUSIN).on(Ze.FOCUSIN, function(t) {
                        document !== t.target && e._element !== t.target && 0 === Be(e._element).has(t.target).length && e._element.focus()
                    })
                }, t._setEscapeEvent = function() {
                    var e = this;
                    this._isShown && this._config.keyboard ? Be(this._element).on(Ze.KEYDOWN_DISMISS, function(t) {
                        27 === t.which && (t.preventDefault(), e.hide())
                    }) : this._isShown || Be(this._element).off(Ze.KEYDOWN_DISMISS)
                }, t._setResizeEvent = function() {
                    var e = this;
                    this._isShown ? Be(window).on(Ze.RESIZE, function(t) {
                        return e.handleUpdate(t)
                    }) : Be(window).off(Ze.RESIZE)
                }, t._hideModal = function() {
                    var e = this;
                    this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._isTransitioning = !1, this._showBackdrop(function() {
                        Be(document.body).removeClass(tt), e._resetAdjustments(), e._resetScrollbar(), Be(e._element).trigger(Ze.HIDDEN)
                    })
                }, t._removeBackdrop = function() {
                    this._backdrop && (Be(this._backdrop).remove(), this._backdrop = null)
                }, t._showBackdrop = function(e) {
                    var t = this,
                        n = Be(this._element).hasClass(nt) ? nt : "";
                    if (this._isShown && this._config.backdrop) {
                        if (this._backdrop = document.createElement("div"), this._backdrop.className = et, n && Be(this._backdrop).addClass(n), Be(this._backdrop).appendTo(document.body), Be(this._element).on(Ze.CLICK_DISMISS, function(e) {
                                t._ignoreBackdropClick ? t._ignoreBackdropClick = !1 : e.target === e.currentTarget && ("static" === t._config.backdrop ? t._element.focus() : t.hide())
                            }), n && xn.reflow(this._backdrop), Be(this._backdrop).addClass(it), !e) return;
                        if (!n) return void e();
                        var i = xn.getTransitionDurationFromElement(this._backdrop);
                        Be(this._backdrop).one(xn.TRANSITION_END, e).emulateTransitionEnd(i)
                    } else if (!this._isShown && this._backdrop) {
                        Be(this._backdrop).removeClass(it);
                        var o = function() {
                            t._removeBackdrop(), e && e()
                        };
                        if (Be(this._element).hasClass(nt)) {
                            var r = xn.getTransitionDurationFromElement(this._backdrop);
                            Be(this._backdrop).one(xn.TRANSITION_END, o).emulateTransitionEnd(r)
                        } else o()
                    } else e && e()
                }, t._adjustDialog = function() {
                    var e = this._element.scrollHeight > document.documentElement.clientHeight;
                    !this._isBodyOverflowing && e && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !e && (this._element.style.paddingRight = this._scrollbarWidth + "px")
                }, t._resetAdjustments = function() {
                    this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
                }, t._checkScrollbar = function() {
                    var e = document.body.getBoundingClientRect();
                    this._isBodyOverflowing = e.left + e.right < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth()
                }, t._setScrollbar = function() {
                    var e = this;
                    if (this._isBodyOverflowing) {
                        Be(ot.FIXED_CONTENT).each(function(t, n) {
                            var i = Be(n)[0].style.paddingRight,
                                o = Be(n).css("padding-right");
                            Be(n).data("padding-right", i).css("padding-right", parseFloat(o) + e._scrollbarWidth + "px")
                        }), Be(ot.STICKY_CONTENT).each(function(t, n) {
                            var i = Be(n)[0].style.marginRight,
                                o = Be(n).css("margin-right");
                            Be(n).data("margin-right", i).css("margin-right", parseFloat(o) - e._scrollbarWidth + "px")
                        }), Be(ot.NAVBAR_TOGGLER).each(function(t, n) {
                            var i = Be(n)[0].style.marginRight,
                                o = Be(n).css("margin-right");
                            Be(n).data("margin-right", i).css("margin-right", parseFloat(o) + e._scrollbarWidth + "px")
                        });
                        var t = document.body.style.paddingRight,
                            n = Be(document.body).css("padding-right");
                        Be(document.body).data("padding-right", t).css("padding-right", parseFloat(n) + this._scrollbarWidth + "px")
                    }
                }, t._resetScrollbar = function() {
                    Be(ot.FIXED_CONTENT).each(function(e, t) {
                        var n = Be(t).data("padding-right");
                        void 0 !== n && Be(t).css("padding-right", n).removeData("padding-right")
                    }), Be(ot.STICKY_CONTENT + ", " + ot.NAVBAR_TOGGLER).each(function(e, t) {
                        var n = Be(t).data("margin-right");
                        void 0 !== n && Be(t).css("margin-right", n).removeData("margin-right")
                    });
                    var e = Be(document.body).data("padding-right");
                    void 0 !== e && Be(document.body).css("padding-right", e).removeData("padding-right")
                }, t._getScrollbarWidth = function() {
                    var e = document.createElement("div");
                    e.className = Je, document.body.appendChild(e);
                    var t = e.getBoundingClientRect().width - e.clientWidth;
                    return document.body.removeChild(e), t
                }, e._jQueryInterface = function(t, n) {
                    return this.each(function() {
                        var i = Be(this).data(Ue),
                            o = r({}, Ke, Be(this).data(), "object" == typeof t && t ? t : {});
                        if (i || (i = new e(this, o), Be(this).data(Ue, i)), "string" == typeof t) {
                            if (void 0 === i[t]) throw new TypeError('No method named "' + t + '"');
                            i[t](n)
                        } else o.show && i.show(n)
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return Ke
                    }
                }]), e
            }(), Be(document).on(Ze.CLICK_DATA_API, ot.DATA_TOGGLE, function(e) {
                var t, n = this,
                    i = xn.getSelectorFromElement(this);
                i && (t = Be(i)[0]);
                var o = Be(t).data(Ue) ? "toggle" : r({}, Be(t).data(), Be(this).data());
                "A" !== this.tagName && "AREA" !== this.tagName || e.preventDefault();
                var s = Be(t).one(Ze.SHOW, function(e) {
                    e.isDefaultPrevented() || s.one(Ze.HIDDEN, function() {
                        Be(n).is(":visible") && n.focus()
                    })
                });
                rt._jQueryInterface.call(Be(t), o, this)
            }), Be.fn[Xe] = rt._jQueryInterface, Be.fn[Xe].Constructor = rt, Be.fn[Xe].noConflict = function() {
                return Be.fn[Xe] = Ge, rt._jQueryInterface
            }, rt),
            Dn = (at = "tooltip", ct = "." + (lt = "bs.tooltip"), ut = (st = t).fn[at], dt = "bs-tooltip", ht = new RegExp("(^|\\s)" + dt + "\\S+", "g"), mt = {
                animation: !0,
                template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                title: "",
                delay: 0,
                html: !(ft = {
                    AUTO: "auto",
                    TOP: "top",
                    RIGHT: "right",
                    BOTTOM: "bottom",
                    LEFT: "left"
                }),
                selector: !(pt = {
                    animation: "boolean",
                    template: "string",
                    title: "(string|element|function)",
                    trigger: "string",
                    delay: "(number|object)",
                    html: "boolean",
                    selector: "(string|boolean)",
                    placement: "(string|function)",
                    offset: "(number|string)",
                    container: "(string|element|boolean)",
                    fallbackPlacement: "(string|array)",
                    boundary: "(string|element)"
                }),
                placement: "top",
                offset: 0,
                container: !1,
                fallbackPlacement: "flip",
                boundary: "scrollParent"
            }, vt = "out", yt = {
                HIDE: "hide" + ct,
                HIDDEN: "hidden" + ct,
                SHOW: (gt = "show") + ct,
                SHOWN: "shown" + ct,
                INSERTED: "inserted" + ct,
                CLICK: "click" + ct,
                FOCUSIN: "focusin" + ct,
                FOCUSOUT: "focusout" + ct,
                MOUSEENTER: "mouseenter" + ct,
                MOUSELEAVE: "mouseleave" + ct
            }, bt = "fade", wt = "show", _t = ".tooltip-inner", xt = ".arrow", Tt = "hover", St = "focus", Ct = "click", kt = "manual", Et = function() {
                function e(e, t) {
                    if (void 0 === n) throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");
                    this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = e, this.config = this._getConfig(t), this.tip = null, this._setListeners()
                }
                var t = e.prototype;
                return t.enable = function() {
                    this._isEnabled = !0
                }, t.disable = function() {
                    this._isEnabled = !1
                }, t.toggleEnabled = function() {
                    this._isEnabled = !this._isEnabled
                }, t.toggle = function(e) {
                    if (this._isEnabled)
                        if (e) {
                            var t = this.constructor.DATA_KEY,
                                n = st(e.currentTarget).data(t);
                            n || (n = new this.constructor(e.currentTarget, this._getDelegateConfig()), st(e.currentTarget).data(t, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
                        } else {
                            if (st(this.getTipElement()).hasClass(wt)) return void this._leave(null, this);
                            this._enter(null, this)
                        }
                }, t.dispose = function() {
                    clearTimeout(this._timeout), st.removeData(this.element, this.constructor.DATA_KEY), st(this.element).off(this.constructor.EVENT_KEY), st(this.element).closest(".modal").off("hide.bs.modal"), this.tip && st(this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, (this._activeTrigger = null) !== this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null
                }, t.show = function() {
                    var e = this;
                    if ("none" === st(this.element).css("display")) throw new Error("Please use show on visible elements");
                    var t = st.Event(this.constructor.Event.SHOW);
                    if (this.isWithContent() && this._isEnabled) {
                        st(this.element).trigger(t);
                        var i = st.contains(this.element.ownerDocument.documentElement, this.element);
                        if (t.isDefaultPrevented() || !i) return;
                        var o = this.getTipElement(),
                            r = xn.getUID(this.constructor.NAME);
                        o.setAttribute("id", r), this.element.setAttribute("aria-describedby", r), this.setContent(), this.config.animation && st(o).addClass(bt);
                        var s = "function" == typeof this.config.placement ? this.config.placement.call(this, o, this.element) : this.config.placement,
                            a = this._getAttachment(s);
                        this.addAttachmentClass(a);
                        var l = !1 === this.config.container ? document.body : st(this.config.container);
                        st(o).data(this.constructor.DATA_KEY, this), st.contains(this.element.ownerDocument.documentElement, this.tip) || st(o).appendTo(l), st(this.element).trigger(this.constructor.Event.INSERTED), this._popper = new n(this.element, o, {
                            placement: a,
                            modifiers: {
                                offset: {
                                    offset: this.config.offset
                                },
                                flip: {
                                    behavior: this.config.fallbackPlacement
                                },
                                arrow: {
                                    element: xt
                                },
                                preventOverflow: {
                                    boundariesElement: this.config.boundary
                                }
                            },
                            onCreate: function(t) {
                                t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t)
                            },
                            onUpdate: function(t) {
                                e._handlePopperPlacementChange(t)
                            }
                        }), st(o).addClass(wt), "ontouchstart" in document.documentElement && st(document.body).children().on("mouseover", null, st.noop);
                        var c = function() {
                            e.config.animation && e._fixTransition();
                            var t = e._hoverState;
                            e._hoverState = null, st(e.element).trigger(e.constructor.Event.SHOWN), t === vt && e._leave(null, e)
                        };
                        if (st(this.tip).hasClass(bt)) {
                            var u = xn.getTransitionDurationFromElement(this.tip);
                            st(this.tip).one(xn.TRANSITION_END, c).emulateTransitionEnd(u)
                        } else c()
                    }
                }, t.hide = function(e) {
                    var t = this,
                        n = this.getTipElement(),
                        i = st.Event(this.constructor.Event.HIDE),
                        o = function() {
                            t._hoverState !== gt && n.parentNode && n.parentNode.removeChild(n), t._cleanTipClass(), t.element.removeAttribute("aria-describedby"), st(t.element).trigger(t.constructor.Event.HIDDEN), null !== t._popper && t._popper.destroy(), e && e()
                        };
                    if (st(this.element).trigger(i), !i.isDefaultPrevented()) {
                        if (st(n).removeClass(wt), "ontouchstart" in document.documentElement && st(document.body).children().off("mouseover", null, st.noop), this._activeTrigger[Ct] = !1, this._activeTrigger[St] = !1, this._activeTrigger[Tt] = !1, st(this.tip).hasClass(bt)) {
                            var r = xn.getTransitionDurationFromElement(n);
                            st(n).one(xn.TRANSITION_END, o).emulateTransitionEnd(r)
                        } else o();
                        this._hoverState = ""
                    }
                }, t.update = function() {
                    null !== this._popper && this._popper.scheduleUpdate()
                }, t.isWithContent = function() {
                    return Boolean(this.getTitle())
                }, t.addAttachmentClass = function(e) {
                    st(this.getTipElement()).addClass(dt + "-" + e)
                }, t.getTipElement = function() {
                    return this.tip = this.tip || st(this.config.template)[0], this.tip
                }, t.setContent = function() {
                    var e = st(this.getTipElement());
                    this.setElementContent(e.find(_t), this.getTitle()), e.removeClass(bt + " " + wt)
                }, t.setElementContent = function(e, t) {
                    var n = this.config.html;
                    "object" == typeof t && (t.nodeType || t.jquery) ? n ? st(t).parent().is(e) || e.empty().append(t) : e.text(st(t).text()) : e[n ? "html" : "text"](t)
                }, t.getTitle = function() {
                    var e = this.element.getAttribute("data-original-title");
                    return e || (e = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), e
                }, t._getAttachment = function(e) {
                    return ft[e.toUpperCase()]
                }, t._setListeners = function() {
                    var e = this;
                    this.config.trigger.split(" ").forEach(function(t) {
                        if ("click" === t) st(e.element).on(e.constructor.Event.CLICK, e.config.selector, function(t) {
                            return e.toggle(t)
                        });
                        else if (t !== kt) {
                            var n = t === Tt ? e.constructor.Event.MOUSEENTER : e.constructor.Event.FOCUSIN,
                                i = t === Tt ? e.constructor.Event.MOUSELEAVE : e.constructor.Event.FOCUSOUT;
                            st(e.element).on(n, e.config.selector, function(t) {
                                return e._enter(t)
                            }).on(i, e.config.selector, function(t) {
                                return e._leave(t)
                            })
                        }
                        st(e.element).closest(".modal").on("hide.bs.modal", function() {
                            return e.hide()
                        })
                    }), this.config.selector ? this.config = r({}, this.config, {
                        trigger: "manual",
                        selector: ""
                    }) : this._fixTitle()
                }, t._fixTitle = function() {
                    var e = typeof this.element.getAttribute("data-original-title");
                    (this.element.getAttribute("title") || "string" !== e) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
                }, t._enter = function(e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || st(e.currentTarget).data(n)) || (t = new this.constructor(e.currentTarget, this._getDelegateConfig()), st(e.currentTarget).data(n, t)), e && (t._activeTrigger["focusin" === e.type ? St : Tt] = !0), st(t.getTipElement()).hasClass(wt) || t._hoverState === gt ? t._hoverState = gt : (clearTimeout(t._timeout), t._hoverState = gt, t.config.delay && t.config.delay.show ? t._timeout = setTimeout(function() {
                        t._hoverState === gt && t.show()
                    }, t.config.delay.show) : t.show())
                }, t._leave = function(e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || st(e.currentTarget).data(n)) || (t = new this.constructor(e.currentTarget, this._getDelegateConfig()), st(e.currentTarget).data(n, t)), e && (t._activeTrigger["focusout" === e.type ? St : Tt] = !1), t._isWithActiveTrigger() || (clearTimeout(t._timeout), t._hoverState = vt, t.config.delay && t.config.delay.hide ? t._timeout = setTimeout(function() {
                        t._hoverState === vt && t.hide()
                    }, t.config.delay.hide) : t.hide())
                }, t._isWithActiveTrigger = function() {
                    for (var e in this._activeTrigger)
                        if (this._activeTrigger[e]) return !0;
                    return !1
                }, t._getConfig = function(e) {
                    return "number" == typeof(e = r({}, this.constructor.Default, st(this.element).data(), "object" == typeof e && e ? e : {})).delay && (e.delay = {
                        show: e.delay,
                        hide: e.delay
                    }), "number" == typeof e.title && (e.title = e.title.toString()), "number" == typeof e.content && (e.content = e.content.toString()), xn.typeCheckConfig(at, e, this.constructor.DefaultType), e
                }, t._getDelegateConfig = function() {
                    var e = {};
                    if (this.config)
                        for (var t in this.config) this.constructor.Default[t] !== this.config[t] && (e[t] = this.config[t]);
                    return e
                }, t._cleanTipClass = function() {
                    var e = st(this.getTipElement()),
                        t = e.attr("class").match(ht);
                    null !== t && 0 < t.length && e.removeClass(t.join(""))
                }, t._handlePopperPlacementChange = function(e) {
                    this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(e.placement))
                }, t._fixTransition = function() {
                    var e = this.getTipElement(),
                        t = this.config.animation;
                    null === e.getAttribute("x-placement") && (st(e).removeClass(bt), this.config.animation = !1, this.hide(), this.show(), this.config.animation = t)
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = st(this).data(lt),
                            i = "object" == typeof t && t;
                        if ((n || !/dispose|hide/.test(t)) && (n || (n = new e(this, i), st(this).data(lt, n)), "string" == typeof t)) {
                            if (void 0 === n[t]) throw new TypeError('No method named "' + t + '"');
                            n[t]()
                        }
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return mt
                    }
                }, {
                    key: "NAME",
                    get: function() {
                        return at
                    }
                }, {
                    key: "DATA_KEY",
                    get: function() {
                        return lt
                    }
                }, {
                    key: "Event",
                    get: function() {
                        return yt
                    }
                }, {
                    key: "EVENT_KEY",
                    get: function() {
                        return ct
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return pt
                    }
                }]), e
            }(), st.fn[at] = Et._jQueryInterface, st.fn[at].Constructor = Et, st.fn[at].noConflict = function() {
                return st.fn[at] = ut, Et._jQueryInterface
            }, Et),
            On = (Dt = "popover", It = "." + (Ot = "bs.popover"), $t = (At = t).fn[Dt], Lt = "bs-popover", Nt = new RegExp("(^|\\s)" + Lt + "\\S+", "g"), Mt = r({}, Dn.Default, {
                placement: "right",
                trigger: "click",
                content: "",
                template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            }), Pt = r({}, Dn.DefaultType, {
                content: "(string|element|function)"
            }), jt = "fade", Ft = ".popover-header", Rt = ".popover-body", qt = {
                HIDE: "hide" + It,
                HIDDEN: "hidden" + It,
                SHOW: (Ht = "show") + It,
                SHOWN: "shown" + It,
                INSERTED: "inserted" + It,
                CLICK: "click" + It,
                FOCUSIN: "focusin" + It,
                FOCUSOUT: "focusout" + It,
                MOUSEENTER: "mouseenter" + It,
                MOUSELEAVE: "mouseleave" + It
            }, Wt = function(e) {
                function t() {
                    return e.apply(this, arguments) || this
                }
                var n, i;
                i = e, (n = t).prototype = Object.create(i.prototype), (n.prototype.constructor = n).__proto__ = i;
                var r = t.prototype;
                return r.isWithContent = function() {
                    return this.getTitle() || this._getContent()
                }, r.addAttachmentClass = function(e) {
                    At(this.getTipElement()).addClass(Lt + "-" + e)
                }, r.getTipElement = function() {
                    return this.tip = this.tip || At(this.config.template)[0], this.tip
                }, r.setContent = function() {
                    var e = At(this.getTipElement());
                    this.setElementContent(e.find(Ft), this.getTitle());
                    var t = this._getContent();
                    "function" == typeof t && (t = t.call(this.element)), this.setElementContent(e.find(Rt), t), e.removeClass(jt + " " + Ht)
                }, r._getContent = function() {
                    return this.element.getAttribute("data-content") || this.config.content
                }, r._cleanTipClass = function() {
                    var e = At(this.getTipElement()),
                        t = e.attr("class").match(Nt);
                    null !== t && 0 < t.length && e.removeClass(t.join(""))
                }, t._jQueryInterface = function(e) {
                    return this.each(function() {
                        var n = At(this).data(Ot),
                            i = "object" == typeof e ? e : null;
                        if ((n || !/destroy|hide/.test(e)) && (n || (n = new t(this, i), At(this).data(Ot, n)), "string" == typeof e)) {
                            if (void 0 === n[e]) throw new TypeError('No method named "' + e + '"');
                            n[e]()
                        }
                    })
                }, o(t, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return Mt
                    }
                }, {
                    key: "NAME",
                    get: function() {
                        return Dt
                    }
                }, {
                    key: "DATA_KEY",
                    get: function() {
                        return Ot
                    }
                }, {
                    key: "Event",
                    get: function() {
                        return qt
                    }
                }, {
                    key: "EVENT_KEY",
                    get: function() {
                        return It
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return Pt
                    }
                }]), t
            }(Dn), At.fn[Dt] = Wt._jQueryInterface, At.fn[Dt].Constructor = Wt, At.fn[Dt].noConflict = function() {
                return At.fn[Dt] = $t, Wt._jQueryInterface
            }, Wt),
            In = (Yt = "scrollspy", Xt = "." + (Bt = "bs.scrollspy"), Ut = (zt = t).fn[Yt], Vt = {
                offset: 10,
                method: "auto",
                target: ""
            }, Gt = {
                offset: "number",
                method: "string",
                target: "(string|element)"
            }, Kt = {
                ACTIVATE: "activate" + Xt,
                SCROLL: "scroll" + Xt,
                LOAD_DATA_API: "load" + Xt + ".data-api"
            }, Qt = "dropdown-item", Zt = "active", Jt = {
                DATA_SPY: '[data-spy="scroll"]',
                ACTIVE: ".active",
                NAV_LIST_GROUP: ".nav, .list-group",
                NAV_LINKS: ".nav-link",
                NAV_ITEMS: ".nav-item",
                LIST_ITEMS: ".list-group-item",
                DROPDOWN: ".dropdown",
                DROPDOWN_ITEMS: ".dropdown-item",
                DROPDOWN_TOGGLE: ".dropdown-toggle"
            }, en = "offset", tn = "position", nn = function() {
                function e(e, t) {
                    var n = this;
                    this._element = e, this._scrollElement = "BODY" === e.tagName ? window : e, this._config = this._getConfig(t), this._selector = this._config.target + " " + Jt.NAV_LINKS + "," + this._config.target + " " + Jt.LIST_ITEMS + "," + this._config.target + " " + Jt.DROPDOWN_ITEMS, this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, zt(this._scrollElement).on(Kt.SCROLL, function(e) {
                        return n._process(e)
                    }), this.refresh(), this._process()
                }
                var t = e.prototype;
                return t.refresh = function() {
                    var e = this,
                        t = this._scrollElement === this._scrollElement.window ? en : tn,
                        n = "auto" === this._config.method ? t : this._config.method,
                        i = n === tn ? this._getScrollTop() : 0;
                    this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), zt.makeArray(zt(this._selector)).map(function(e) {
                        var t, o = xn.getSelectorFromElement(e);
                        if (o && (t = zt(o)[0]), t) {
                            var r = t.getBoundingClientRect();
                            if (r.width || r.height) return [zt(t)[n]().top + i, o]
                        }
                        return null
                    }).filter(function(e) {
                        return e
                    }).sort(function(e, t) {
                        return e[0] - t[0]
                    }).forEach(function(t) {
                        e._offsets.push(t[0]), e._targets.push(t[1])
                    })
                }, t.dispose = function() {
                    zt.removeData(this._element, Bt), zt(this._scrollElement).off(Xt), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null
                }, t._getConfig = function(e) {
                    if ("string" != typeof(e = r({}, Vt, "object" == typeof e && e ? e : {})).target) {
                        var t = zt(e.target).attr("id");
                        t || (t = xn.getUID(Yt), zt(e.target).attr("id", t)), e.target = "#" + t
                    }
                    return xn.typeCheckConfig(Yt, e, Gt), e
                }, t._getScrollTop = function() {
                    return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
                }, t._getScrollHeight = function() {
                    return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                }, t._getOffsetHeight = function() {
                    return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
                }, t._process = function() {
                    var e = this._getScrollTop() + this._config.offset,
                        t = this._getScrollHeight(),
                        n = this._config.offset + t - this._getOffsetHeight();
                    if (this._scrollHeight !== t && this.refresh(), n <= e) {
                        var i = this._targets[this._targets.length - 1];
                        this._activeTarget !== i && this._activate(i)
                    } else {
                        if (this._activeTarget && e < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();
                        for (var o = this._offsets.length; o--;) this._activeTarget !== this._targets[o] && e >= this._offsets[o] && (void 0 === this._offsets[o + 1] || e < this._offsets[o + 1]) && this._activate(this._targets[o])
                    }
                }, t._activate = function(e) {
                    this._activeTarget = e, this._clear();
                    var t = this._selector.split(",");
                    t = t.map(function(t) {
                        return t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]'
                    });
                    var n = zt(t.join(","));
                    n.hasClass(Qt) ? (n.closest(Jt.DROPDOWN).find(Jt.DROPDOWN_TOGGLE).addClass(Zt), n.addClass(Zt)) : (n.addClass(Zt), n.parents(Jt.NAV_LIST_GROUP).prev(Jt.NAV_LINKS + ", " + Jt.LIST_ITEMS).addClass(Zt), n.parents(Jt.NAV_LIST_GROUP).prev(Jt.NAV_ITEMS).children(Jt.NAV_LINKS).addClass(Zt)), zt(this._scrollElement).trigger(Kt.ACTIVATE, {
                        relatedTarget: e
                    })
                }, t._clear = function() {
                    zt(this._selector).filter(Jt.ACTIVE).removeClass(Zt)
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = zt(this).data(Bt);
                        if (n || (n = new e(this, "object" == typeof t && t), zt(this).data(Bt, n)), "string" == typeof t) {
                            if (void 0 === n[t]) throw new TypeError('No method named "' + t + '"');
                            n[t]()
                        }
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return Vt
                    }
                }]), e
            }(), zt(window).on(Kt.LOAD_DATA_API, function() {
                for (var e = zt.makeArray(zt(Jt.DATA_SPY)), t = e.length; t--;) {
                    var n = zt(e[t]);
                    nn._jQueryInterface.call(n, n.data())
                }
            }), zt.fn[Yt] = nn._jQueryInterface, zt.fn[Yt].Constructor = nn, zt.fn[Yt].noConflict = function() {
                return zt.fn[Yt] = Ut, nn._jQueryInterface
            }, nn),
            $n = (sn = "." + (rn = "bs.tab"), an = (on = t).fn.tab, ln = {
                HIDE: "hide" + sn,
                HIDDEN: "hidden" + sn,
                SHOW: "show" + sn,
                SHOWN: "shown" + sn,
                CLICK_DATA_API: "click" + sn + ".data-api"
            }, cn = "dropdown-menu", un = "active", dn = "disabled", hn = "fade", pn = "show", fn = ".dropdown", mn = ".nav, .list-group", gn = ".active", vn = "> li > .active", yn = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', bn = ".dropdown-toggle", wn = "> .dropdown-menu .active", _n = function() {
                function e(e) {
                    this._element = e
                }
                var t = e.prototype;
                return t.show = function() {
                    var e = this;
                    if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && on(this._element).hasClass(un) || on(this._element).hasClass(dn))) {
                        var t, n, i = on(this._element).closest(mn)[0],
                            o = xn.getSelectorFromElement(this._element);
                        if (i) {
                            var r = "UL" === i.nodeName ? vn : gn;
                            n = (n = on.makeArray(on(i).find(r)))[n.length - 1]
                        }
                        var s = on.Event(ln.HIDE, {
                                relatedTarget: this._element
                            }),
                            a = on.Event(ln.SHOW, {
                                relatedTarget: n
                            });
                        if (n && on(n).trigger(s), on(this._element).trigger(a), !a.isDefaultPrevented() && !s.isDefaultPrevented()) {
                            o && (t = on(o)[0]), this._activate(this._element, i);
                            var l = function() {
                                var t = on.Event(ln.HIDDEN, {
                                        relatedTarget: e._element
                                    }),
                                    i = on.Event(ln.SHOWN, {
                                        relatedTarget: n
                                    });
                                on(n).trigger(t), on(e._element).trigger(i)
                            };
                            t ? this._activate(t, t.parentNode, l) : l()
                        }
                    }
                }, t.dispose = function() {
                    on.removeData(this._element, rn), this._element = null
                }, t._activate = function(e, t, n) {
                    var i = this,
                        o = ("UL" === t.nodeName ? on(t).find(vn) : on(t).children(gn))[0],
                        r = n && o && on(o).hasClass(hn),
                        s = function() {
                            return i._transitionComplete(e, o, n)
                        };
                    if (o && r) {
                        var a = xn.getTransitionDurationFromElement(o);
                        on(o).one(xn.TRANSITION_END, s).emulateTransitionEnd(a)
                    } else s()
                }, t._transitionComplete = function(e, t, n) {
                    if (t) {
                        on(t).removeClass(pn + " " + un);
                        var i = on(t.parentNode).find(wn)[0];
                        i && on(i).removeClass(un), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !1)
                    }
                    if (on(e).addClass(un), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !0), xn.reflow(e), on(e).addClass(pn), e.parentNode && on(e.parentNode).hasClass(cn)) {
                        var o = on(e).closest(fn)[0];
                        o && on(o).find(bn).addClass(un), e.setAttribute("aria-expanded", !0)
                    }
                    n && n()
                }, e._jQueryInterface = function(t) {
                    return this.each(function() {
                        var n = on(this),
                            i = n.data(rn);
                        if (i || (i = new e(this), n.data(rn, i)), "string" == typeof t) {
                            if (void 0 === i[t]) throw new TypeError('No method named "' + t + '"');
                            i[t]()
                        }
                    })
                }, o(e, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.1.1"
                    }
                }]), e
            }(), on(document).on(ln.CLICK_DATA_API, yn, function(e) {
                e.preventDefault(), _n._jQueryInterface.call(on(this), "show")
            }), on.fn.tab = _n._jQueryInterface, on.fn.tab.Constructor = _n, on.fn.tab.noConflict = function() {
                return on.fn.tab = an, _n._jQueryInterface
            }, _n);
        ! function(e) {
            if (void 0 === e) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
            var t = e.fn.jquery.split(" ")[0].split(".");
            if (t[0] < 2 && t[1] < 9 || 1 === t[0] && 9 === t[1] && t[2] < 1 || 4 <= t[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")
        }(t), e.Util = xn, e.Alert = Tn, e.Button = Sn, e.Carousel = Cn, e.Collapse = kn, e.Dropdown = En, e.Modal = An, e.Popover = On, e.Scrollspy = In, e.Tab = $n, e.Tooltip = Dn, Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }),
    function(e) {
        if ("function" == typeof define && define.amd) define(["jquery"], e);
        else if ("object" == typeof module && module.exports) {
            var t = require("jquery");
            e(t), module.exports = t
        } else e(jQuery)
    }(function(e) {
        function t(e) {
            this.init(e)
        }
        t.prototype = {
            value: 0,
            size: 100,
            startAngle: -Math.PI,
            thickness: "auto",
            fill: {
                gradient: ["#3aeabb", "#fdd250"]
            },
            emptyFill: "rgba(0, 0, 0, .1)",
            animation: {
                duration: 1200,
                easing: "circleProgressEasing"
            },
            animationStartValue: 0,
            reverse: !1,
            lineCap: "butt",
            insertMode: "prepend",
            constructor: t,
            el: null,
            canvas: null,
            ctx: null,
            radius: 0,
            arcFill: null,
            lastFrameValue: 0,
            init: function(t) {
                e.extend(this, t), this.radius = this.size / 2, this.initWidget(), this.initFill(), this.draw(), this.el.trigger("circle-inited")
            },
            initWidget: function() {
                this.canvas || (this.canvas = e("<canvas>")["prepend" == this.insertMode ? "prependTo" : "appendTo"](this.el)[0]);
                var t = this.canvas;
                if (t.width = this.size, t.height = this.size, this.ctx = t.getContext("2d"), window.devicePixelRatio > 1) {
                    var n = window.devicePixelRatio;
                    t.style.width = t.style.height = this.size + "px", t.width = t.height = this.size * n, this.ctx.scale(n, n)
                }
            },
            initFill: function() {
                function t() {
                    var t = e("<canvas>")[0];
                    t.width = n.size, t.height = n.size, t.getContext("2d").drawImage(p, 0, 0, r, r), n.arcFill = n.ctx.createPattern(t, "no-repeat"), n.drawFrame(n.lastFrameValue)
                }
                var n = this,
                    i = this.fill,
                    o = this.ctx,
                    r = this.size;
                if (!i) throw Error("The fill is not specified!");
                if ("string" == typeof i && (i = {
                        color: i
                    }), i.color && (this.arcFill = i.color), i.gradient) {
                    var s = i.gradient;
                    if (1 == s.length) this.arcFill = s[0];
                    else if (s.length > 1) {
                        for (var a = i.gradientAngle || 0, l = i.gradientDirection || [r / 2 * (1 - Math.cos(a)), r / 2 * (1 + Math.sin(a)), r / 2 * (1 + Math.cos(a)), r / 2 * (1 - Math.sin(a))], c = o.createLinearGradient.apply(o, l), u = 0; u < s.length; u++) {
                            var d = s[u],
                                h = u / (s.length - 1);
                            e.isArray(d) && (h = d[1], d = d[0]), c.addColorStop(h, d)
                        }
                        this.arcFill = c
                    }
                }
                if (i.image) {
                    var p;
                    i.image instanceof Image ? p = i.image : (p = new Image, p.src = i.image), p.complete ? t() : p.onload = t
                }
            },
            draw: function() {
                this.animation ? this.drawAnimated(this.value) : this.drawFrame(this.value)
            },
            drawFrame: function(e) {
                this.lastFrameValue = e, this.ctx.clearRect(0, 0, this.size, this.size), this.drawEmptyArc(e), this.drawArc(e)
            },
            drawArc: function(e) {
                if (0 !== e) {
                    var t = this.ctx,
                        n = this.radius,
                        i = this.getThickness(),
                        o = this.startAngle;
                    t.save(), t.beginPath(), this.reverse ? t.arc(n, n, n - i / 2, o - 2 * Math.PI * e, o) : t.arc(n, n, n - i / 2, o, o + 2 * Math.PI * e), t.lineWidth = i, t.lineCap = this.lineCap, t.strokeStyle = this.arcFill, t.stroke(), t.restore()
                }
            },
            drawEmptyArc: function(e) {
                var t = this.ctx,
                    n = this.radius,
                    i = this.getThickness(),
                    o = this.startAngle;
                e < 1 && (t.save(), t.beginPath(), e <= 0 ? t.arc(n, n, n - i / 2, 0, 2 * Math.PI) : this.reverse ? t.arc(n, n, n - i / 2, o, o - 2 * Math.PI * e) : t.arc(n, n, n - i / 2, o + 2 * Math.PI * e, o), t.lineWidth = i, t.strokeStyle = this.emptyFill, t.stroke(), t.restore())
            },
            drawAnimated: function(t) {
                var n = this,
                    i = this.el,
                    o = e(this.canvas);
                o.stop(!0, !1), i.trigger("circle-animation-start"), o.css({
                    animationProgress: 0
                }).animate({
                    animationProgress: 1
                }, e.extend({}, this.animation, {
                    step: function(e) {
                        var o = n.animationStartValue * (1 - e) + t * e;
                        n.drawFrame(o), i.trigger("circle-animation-progress", [e, o])
                    }
                })).promise().always(function() {
                    i.trigger("circle-animation-end")
                })
            },
            getThickness: function() {
                return e.isNumeric(this.thickness) ? this.thickness : this.size / 14
            },
            getValue: function() {
                return this.value
            },
            setValue: function(e) {
                this.animation && (this.animationStartValue = this.lastFrameValue), this.value = e, this.draw()
            }
        }, e.circleProgress = {
            defaults: t.prototype
        }, e.easing.circleProgressEasing = function(e) {
            return e < .5 ? .5 * (e *= 2) * e * e : 1 - .5 * (e = 2 - 2 * e) * e * e
        }, e.fn.circleProgress = function(n, i) {
            var o = "circle-progress",
                r = this.data(o);
            if ("widget" == n) {
                if (!r) throw Error('Calling "widget" method on not initialized instance is forbidden');
                return r.canvas
            }
            if ("value" == n) {
                if (!r) throw Error('Calling "value" method on not initialized instance is forbidden');
                if (void 0 === i) return r.getValue();
                var s = arguments[1];
                return this.each(function() {
                    e(this).data(o).setValue(s)
                })
            }
            return this.each(function() {
                var i = e(this),
                    r = i.data(o),
                    s = e.isPlainObject(n) ? n : {};
                if (r) r.init(s);
                else {
                    var a = e.extend({}, i.data());
                    "string" == typeof a.fill && (a.fill = JSON.parse(a.fill)), "string" == typeof a.animation && (a.animation = JSON.parse(a.animation)), s = e.extend(a, s), s.el = i, r = new t(s), i.data(o, r)
                }
            })
        }
    }),
    function(e, t) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], function(n) {
            return t(n, e, e.document, e.Math)
        }) : "object" == typeof exports && exports ? module.exports = t(require("jquery"), e, e.document, e.Math) : t(jQuery, e, e.document, e.Math)
    }("undefined" != typeof window ? window : this, function(e, t, n, i, o) {
        "use strict";
        var r = "fullpage-wrapper",
            s = "." + r,
            a = "fp-responsive",
            l = "fp-notransition",
            c = "fp-destroyed",
            u = "fp-enabled",
            d = "fp-viewing",
            h = "active",
            p = "." + h,
            f = "fp-completely",
            m = "." + f,
            g = "fp-section",
            v = "." + g,
            y = v + p,
            b = v + ":first",
            w = v + ":last",
            _ = "fp-tableCell",
            x = "." + _,
            T = "fp-nav",
            S = "#" + T,
            C = "fp-tooltip",
            k = "fp-slide",
            E = "." + k,
            A = E + p,
            D = "fp-slides",
            O = "." + D,
            I = "fp-slidesContainer",
            $ = "." + I,
            L = "fp-table",
            N = "fp-slidesNav",
            M = "." + N,
            P = M + " a",
            j = "fp-controlArrow",
            H = "." + j,
            F = "fp-prev",
            R = j + " " + F,
            q = H + "." + F,
            W = H + ".fp-next",
            z = e(t),
            Y = e(n);
        e.fn.fullpage = function(j) {
            function B(t, n) {
                t || rt(0), lt("autoScrolling", t, n);
                var i = e(y);
                j.autoScrolling && !j.scrollBar ? (dt.css({
                    overflow: "hidden",
                    height: "100%"
                }), X(Ht.recordHistory, "internal"), _t.css({
                    "-ms-touch-action": "none",
                    "touch-action": "none"
                }), i.length && rt(i.position().top)) : (dt.css({
                    overflow: "visible",
                    height: "initial"
                }), X(!1, "internal"), _t.css({
                    "-ms-touch-action": "",
                    "touch-action": ""
                }), i.length && dt.scrollTop(i.position().top))
            }

            function X(e, t) {
                lt("recordHistory", e, t)
            }

            function U(e, t) {
                lt("scrollingSpeed", e, t)
            }

            function V(e, t) {
                lt("fitToSection", e, t)
            }

            function G(e) {
                e ? (function() {
                    var e, i = "";
                    t.addEventListener ? e = "addEventListener" : (e = "attachEvent", i = "on");
                    var r = "onwheel" in n.createElement("div") ? "wheel" : n.onmousewheel !== o ? "mousewheel" : "DOMMouseScroll";
                    "DOMMouseScroll" == r ? n[e](i + "MozMousePixelScroll", me, !1) : n[e](i + r, me, !1)
                }(), _t.on("mousedown", $e).on("mouseup", Le)) : (n.addEventListener ? (n.removeEventListener("mousewheel", me, !1), n.removeEventListener("wheel", me, !1), n.removeEventListener("MozMousePixelScroll", me, !1)) : n.detachEvent("onmousewheel", me), _t.off("mousedown", $e).off("mouseup", Le))
            }

            function K(t, n) {
                void 0 !== n ? (n = n.replace(/ /g, "").split(","), e.each(n, function(e, n) {
                    at(t, n, "m")
                })) : (at(t, "all", "m"), t ? (G(!0), (bt || wt) && (j.autoScrolling && ht.off(Pt.touchmove).on(Pt.touchmove, ue), e(s).off(Pt.touchstart).on(Pt.touchstart, pe).off(Pt.touchmove).on(Pt.touchmove, de))) : (G(!1), (bt || wt) && (j.autoScrolling && ht.off(Pt.touchmove), e(s).off(Pt.touchstart).off(Pt.touchmove))))
            }

            function Q(t, n) {
                void 0 !== n ? (n = n.replace(/ /g, "").split(","), e.each(n, function(e, n) {
                    at(t, n, "k")
                })) : (at(t, "all", "k"), j.keyboardScrolling = t)
            }

            function Z() {
                var t = e(y).prev(v);
                t.length || !j.loopTop && !j.continuousVertical || (t = e(v).last()), t.length && ye(t, null, !0)
            }

            function J() {
                var t = e(y).next(v);
                t.length || !j.loopBottom && !j.continuousVertical || (t = e(v).first()), t.length && ye(t, null, !1)
            }

            function ee(e, t) {
                U(0, "internal"), te(e, t), U(Ht.scrollingSpeed, "internal")
            }

            function te(e, t) {
                var n = Ke(e);
                void 0 !== t ? Qe(e, t) : n.length > 0 && ye(n)
            }

            function ne(e) {
                ge("right", e)
            }

            function ie(e) {
                ge("left", e)
            }

            function oe(t) {
                if (!_t.hasClass(c)) {
                    Tt = !0, xt = z.height(), e(v).each(function() {
                        var t = e(this).find(O),
                            n = e(this).find(E);
                        j.verticalCentered && e(this).find(x).css("height", Ve(e(this)) + "px"), e(this).css("height", xt + "px"), n.length > 1 && Fe(t, t.find(A))
                    }), j.scrollOverflow && At.createScrollBarForAll();
                    var n = e(y).index(v);
                    n && ee(n + 1), Tt = !1, e.isFunction(j.afterResize) && t && j.afterResize.call(_t), e.isFunction(j.afterReBuild) && !t && j.afterReBuild.call(_t)
                }
            }

            function re(t) {
                var n = ht.hasClass(a);
                t ? n || (B(!1, "internal"), V(!1, "internal"), e(S).hide(), ht.addClass(a), e.isFunction(j.afterResponsive) && j.afterResponsive.call(_t, t)) : n && (B(Ht.autoScrolling, "internal"), V(Ht.autoScrolling, "internal"), e(S).show(), ht.removeClass(a), e.isFunction(j.afterResponsive) && j.afterResponsive.call(_t, t))
            }

            function se() {
                var t, n = e(y);
                n.addClass(f), _e(n), xe(n), j.scrollOverflow && j.scrollOverflowHandler.afterLoad(), (!(t = Ke(Ae().section)) || t.length && t.index() === vt.index()) && e.isFunction(j.afterLoad) && j.afterLoad.call(n, n.data("anchor"), n.index(v) + 1), e.isFunction(j.afterRender) && j.afterRender.call(_t)
            }

            function ae() {
                var t, i, o;
                if (!j.autoScrolling || j.scrollBar) {
                    var r = z.scrollTop(),
                        s = (o = (i = r) > Rt ? "down" : "up", Rt = i, Xt = i, o),
                        a = 0,
                        l = r + z.height() / 2,
                        c = ht.height() - z.height() === r,
                        u = n.querySelectorAll(v);
                    if (c) a = u.length - 1;
                    else if (r)
                        for (var d = 0; d < u.length; ++d) u[d].offsetTop <= l && (a = d);
                    else a = 0;
                    if (function(t) {
                            var n = e(y).position().top,
                                i = n + z.height();
                            return "up" == t ? i >= z.scrollTop() + z.height() : n <= z.scrollTop()
                        }(s) && (e(y).hasClass(f) || e(y).addClass(f).siblings().removeClass(f)), !(t = e(u).eq(a)).hasClass(h)) {
                        Ft = !0;
                        var p, m, g = e(y),
                            b = g.index(v) + 1,
                            w = Xe(t),
                            _ = t.data("anchor"),
                            x = t.index(v) + 1,
                            T = t.find(A);
                        T.length && (m = T.data("anchor"), p = T.index()), Ct && (t.addClass(h).siblings().removeClass(h), e.isFunction(j.onLeave) && j.onLeave.call(g, b, x, w), e.isFunction(j.afterLoad) && j.afterLoad.call(t, _, x), Se(g), _e(t), xe(t), Be(_, x - 1), j.anchors.length && (ft = _), Je(p, m, _, x)), clearTimeout($t), $t = setTimeout(function() {
                            Ft = !1
                        }, 100)
                    }
                    j.fitToSection && (clearTimeout(Lt), Lt = setTimeout(function() {
                        j.fitToSection && e(y).outerHeight() <= xt && le()
                    }, j.fitToSectionDelay))
                }
            }

            function le() {
                Ct && (Tt = !0, ye(e(y)), Tt = !1)
            }

            function ce(t) {
                if (Et.m[t]) {
                    var n = "down" === t ? J : Z;
                    if (j.scrollOverflow) {
                        var i = j.scrollOverflowHandler.scrollable(e(y)),
                            o = "down" === t ? "bottom" : "top";
                        if (i.length > 0) {
                            if (!j.scrollOverflowHandler.isScrolled(o, i)) return !0;
                            n()
                        } else n()
                    } else n()
                }
            }

            function ue(e) {
                var t = e.originalEvent;
                j.autoScrolling && he(t) && e.preventDefault()
            }

            function de(t) {
                var n = t.originalEvent,
                    o = e(n.target).closest(v);
                if (he(n)) {
                    j.autoScrolling && t.preventDefault();
                    var r = it(n);
                    zt = r.y, Yt = r.x, o.find(O).length && i.abs(Wt - Yt) > i.abs(qt - zt) ? !yt && i.abs(Wt - Yt) > z.outerWidth() / 100 * j.touchSensitivity && (Wt > Yt ? Et.m.right && ne(o) : Et.m.left && ie(o)) : j.autoScrolling && Ct && i.abs(qt - zt) > z.height() / 100 * j.touchSensitivity && (qt > zt ? ce("down") : zt > qt && ce("up"))
                }
            }

            function he(e) {
                return void 0 === e.pointerType || "mouse" != e.pointerType
            }

            function pe(e) {
                var t = e.originalEvent;
                if (j.fitToSection && dt.stop(), he(t)) {
                    var n = it(t);
                    qt = n.y, Wt = n.x
                }
            }

            function fe(e, t) {
                for (var n = 0, o = e.slice(i.max(e.length - t, 1)), r = 0; r < o.length; r++) n += o[r];
                return i.ceil(n / t)
            }

            function me(n) {
                var o = (new Date).getTime(),
                    r = e(m).hasClass("fp-normal-scroll");
                if (j.autoScrolling && !gt && !r) {
                    var s = (n = n || t.event).wheelDelta || -n.deltaY || -n.detail,
                        a = i.max(-1, i.min(1, s)),
                        l = void 0 !== n.wheelDeltaX || void 0 !== n.deltaX,
                        c = i.abs(n.wheelDeltaX) < i.abs(n.wheelDelta) || i.abs(n.deltaX) < i.abs(n.deltaY) || !l;
                    kt.length > 149 && kt.shift(), kt.push(i.abs(s)), j.scrollBar && (n.preventDefault ? n.preventDefault() : n.returnValue = !1);
                    var u = o - Bt;
                    return Bt = o, u > 200 && (kt = []), Ct && fe(kt, 10) >= fe(kt, 70) && c && ce(a < 0 ? "down" : "up"), !1
                }
                j.fitToSection && dt.stop()
            }

            function ge(t, n) {
                var i = (void 0 === n ? e(y) : n).find(O),
                    o = i.find(E).length;
                if (!(!i.length || yt || o < 2)) {
                    var r = i.find(A),
                        s = null;
                    if (!(s = "left" === t ? r.prev(E) : r.next(E)).length) {
                        if (!j.loopHorizontal) return;
                        s = "left" === t ? r.siblings(":last") : r.siblings(":first")
                    }
                    yt = !0, Fe(i, s, t)
                }
            }

            function ve() {
                e(A).each(function() {
                    ot(e(this), "internal")
                })
            }

            function ye(t, n, o) {
                if (void 0 !== t) {
                    var r, a, l, c, u, d, p, f, m = {
                        element: t,
                        callback: n,
                        isMovementUp: o,
                        dtop: (a = (r = t).position(), l = a.top, c = a.top > Xt, u = l - xt + r.outerHeight(), d = j.bigSectionsDestination, r.outerHeight() > xt ? (c || d) && "bottom" !== d || (l = u) : (c || Tt && r.is(":last-child")) && (l = u), Xt = l, l),
                        yMovement: Xe(t),
                        anchorLink: t.data("anchor"),
                        sectionIndex: t.index(v),
                        activeSlide: t.find(A),
                        activeSection: e(y),
                        leavingSection: e(y).index(v) + 1,
                        localIsResizing: Tt
                    };
                    if (!(m.activeSection.is(t) && !Tt || j.scrollBar && z.scrollTop() === m.dtop && !t.hasClass("fp-auto-height"))) {
                        if (m.activeSlide.length && (p = m.activeSlide.data("anchor"), f = m.activeSlide.index()), e.isFunction(j.onLeave) && !m.localIsResizing) {
                            var g = m.yMovement;
                            if (void 0 !== o && (g = o ? "up" : "down"), !1 === j.onLeave.call(m.activeSection, m.leavingSection, m.sectionIndex + 1, g)) return
                        }
                        j.autoScrolling && j.continuousVertical && void 0 !== m.isMovementUp && (!m.isMovementUp && "up" == m.yMovement || m.isMovementUp && "down" == m.yMovement) && (m = function(t) {
                            return t.isMovementUp ? e(y).before(t.activeSection.nextAll(v)) : e(y).after(t.activeSection.prevAll(v).get().reverse()), rt(e(y).position().top), ve(), t.wrapAroundElements = t.activeSection, t.dtop = t.element.position().top, t.yMovement = Xe(t.element), t.leavingSection = t.activeSection.index(v) + 1, t.sectionIndex = t.element.index(v), t
                        }(m)), m.localIsResizing || Se(m.activeSection), j.scrollOverflow && j.scrollOverflowHandler.beforeLeave(), t.addClass(h).siblings().removeClass(h), _e(t), j.scrollOverflow && j.scrollOverflowHandler.onLeave(), Ct = !1, Je(f, p, m.anchorLink, m.sectionIndex),
                            function(t) {
                                if (j.css3 && j.autoScrolling && !j.scrollBar) Ge("translate3d(0px, -" + i.round(t.dtop) + "px, 0px)", !0), j.scrollingSpeed ? (clearTimeout(Ot), Ot = setTimeout(function() {
                                    be(t)
                                }, j.scrollingSpeed)) : be(t);
                                else {
                                    var n = function(e) {
                                        var t = {};
                                        return j.autoScrolling && !j.scrollBar ? (t.options = {
                                            top: -e.dtop
                                        }, t.element = s) : (t.options = {
                                            scrollTop: e.dtop
                                        }, t.element = "html, body"), t
                                    }(t);
                                    e(n.element).animate(n.options, j.scrollingSpeed, j.easing).promise().done(function() {
                                        j.scrollBar ? setTimeout(function() {
                                            be(t)
                                        }, 30) : be(t)
                                    })
                                }
                            }(m), ft = m.anchorLink, Be(m.anchorLink, m.sectionIndex)
                    }
                }
            }

            function be(t) {
                var n;
                (n = t).wrapAroundElements && n.wrapAroundElements.length && (n.isMovementUp ? e(b).before(n.wrapAroundElements) : e(w).after(n.wrapAroundElements), rt(e(y).position().top), ve()), e.isFunction(j.afterLoad) && !t.localIsResizing && j.afterLoad.call(t.element, t.anchorLink, t.sectionIndex + 1), j.scrollOverflow && j.scrollOverflowHandler.afterLoad(), t.localIsResizing || xe(t.element), t.element.addClass(f).siblings().removeClass(f), Ct = !0, e.isFunction(t.callback) && t.callback.call(this)
            }

            function we(e, t) {
                e.attr(t, e.data(t)).removeAttr("data-" + t)
            }

            function _e(t) {
                var n;
                j.lazyLoading && Ce(t).find("img[data-src], img[data-srcset], source[data-src], source[data-srcset], video[data-src], audio[data-src], iframe[data-src]").each(function() {
                    if (n = e(this), e.each(["src", "srcset"], function(e, t) {
                            var i = n.attr("data-" + t);
                            void 0 !== i && i && we(n, t)
                        }), n.is("source")) {
                        var t = n.closest("video").length ? "video" : "audio";
                        n.closest(t).get(0).load()
                    }
                })
            }

            function xe(t) {
                var n = Ce(t);
                n.find("video, audio").each(function() {
                    var t = e(this).get(0);
                    t.hasAttribute("data-autoplay") && "function" == typeof t.play && t.play()
                }), n.find('iframe[src*="youtube.com/embed/"]').each(function() {
                    var t = e(this).get(0);
                    t.hasAttribute("data-autoplay") && Te(t), t.onload = function() {
                        t.hasAttribute("data-autoplay") && Te(t)
                    }
                })
            }

            function Te(e) {
                e.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*")
            }

            function Se(t) {
                var n = Ce(t);
                n.find("video, audio").each(function() {
                    var t = e(this).get(0);
                    t.hasAttribute("data-keepplaying") || "function" != typeof t.pause || t.pause()
                }), n.find('iframe[src*="youtube.com/embed/"]').each(function() {
                    var t = e(this).get(0);
                    /youtube\.com\/embed\//.test(e(this).attr("src")) && !t.hasAttribute("data-keepplaying") && e(this).get(0).contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*")
                })
            }

            function Ce(t) {
                var n = t.find(A);
                return n.length && (t = e(n)), t
            }

            function ke() {
                var e = Ae(),
                    t = e.section,
                    n = e.slide;
                t && (j.animateAnchor ? Qe(t, n) : ee(t, n))
            }

            function Ee() {
                if (!Ft && !j.lockAnchors) {
                    var e = Ae(),
                        t = e.section,
                        n = e.slide,
                        i = void 0 === ft,
                        o = void 0 === ft && void 0 === n && !yt;
                    t && t.length && (t && t !== ft && !i || o || !yt && mt != n) && Qe(t, n)
                }
            }

            function Ae() {
                var e, n, i = t.location.hash;
                if (i.length) {
                    var o = i.replace("#", "").split("/"),
                        r = i.indexOf("#/") > -1;
                    e = r ? "/" + o[1] : decodeURIComponent(o[0]);
                    var s = r ? o[2] : o[1];
                    s && s.length && (n = decodeURIComponent(s))
                }
                return {
                    section: e,
                    slide: n
                }
            }

            function De(t) {
                clearTimeout(Nt);
                var n = e(":focus"),
                    i = t.which;
                9 === i ? function(t) {
                    function n(e) {
                        return e.preventDefault(), a.first().focus()
                    }
                    var i = t.shiftKey,
                        o = e(":focus"),
                        r = e(y),
                        s = r.find(A),
                        a = (s.length ? s : r).find(jt).not('[tabindex="-1"]');
                    o.length ? o.closest(y, A).length || (o = n(t)) : n(t), (!i && o.is(a.last()) || i && o.is(a.first())) && t.preventDefault()
                }(t) : n.is("textarea") || n.is("input") || n.is("select") || "true" === n.attr("contentEditable") || "" === n.attr("contentEditable") || !j.keyboardScrolling || !j.autoScrolling || (e.inArray(i, [40, 38, 32, 33, 34]) > -1 && t.preventDefault(), gt = t.ctrlKey, Nt = setTimeout(function() {
                    ! function(t) {
                        var n = t.shiftKey;
                        if (Ct || !([37, 39].indexOf(t.which) < 0)) switch (t.which) {
                            case 38:
                            case 33:
                                Et.k.up && Z();
                                break;
                            case 32:
                                if (n && Et.k.up) {
                                    Z();
                                    break
                                }
                            case 40:
                            case 34:
                                Et.k.down && J();
                                break;
                            case 36:
                                Et.k.up && te(1);
                                break;
                            case 35:
                                Et.k.down && te(e(v).length);
                                break;
                            case 37:
                                Et.k.left && ie();
                                break;
                            case 39:
                                Et.k.right && ne()
                        }
                    }(t)
                }, 150))
            }

            function Oe() {
                e(this).prev().trigger("click")
            }

            function Ie(e) {
                St && (gt = e.ctrlKey)
            }

            function $e(e) {
                2 == e.which && (Ut = e.pageY, _t.on("mousemove", He))
            }

            function Le(e) {
                2 == e.which && _t.off("mousemove")
            }

            function Ne() {
                var t = e(this).closest(v);
                e(this).hasClass(F) ? Et.m.left && ie(t) : Et.m.right && ne(t)
            }

            function Me() {
                St = !1, gt = !1
            }

            function Pe(t) {
                t.preventDefault();
                var n = e(this).parent().index();
                ye(e(v).eq(n))
            }

            function je(t) {
                t.preventDefault();
                var n = e(this).closest(v).find(O);
                Fe(n, n.find(E).eq(e(this).closest("li").index()))
            }

            function He(e) {
                Ct && (e.pageY < Ut && Et.m.up ? Z() : e.pageY > Ut && Et.m.down && J()), Ut = e.pageY
            }

            function Fe(t, n, o) {
                var r = t.closest(v),
                    s = {
                        slides: t,
                        destiny: n,
                        direction: o,
                        destinyPos: n.position(),
                        slideIndex: n.index(),
                        section: r,
                        sectionIndex: r.index(v),
                        anchorLink: r.data("anchor"),
                        slidesNav: r.find(M),
                        slideAnchor: tt(n),
                        prevSlide: r.find(A),
                        prevSlideIndex: r.find(A).index(),
                        localIsResizing: Tt
                    };
                s.xMovement = function(e, t) {
                    return e == t ? "none" : e > t ? "left" : "right"
                }(s.prevSlideIndex, s.slideIndex), s.localIsResizing || (Ct = !1), j.onSlideLeave && !s.localIsResizing && "none" !== s.xMovement && e.isFunction(j.onSlideLeave) && !1 === j.onSlideLeave.call(s.prevSlide, s.anchorLink, s.sectionIndex + 1, s.prevSlideIndex, s.direction, s.slideIndex) ? yt = !1 : (n.addClass(h).siblings().removeClass(h), s.localIsResizing || (Se(s.prevSlide), _e(n)), !j.loopHorizontal && j.controlArrows && (r.find(q).toggle(0 !== s.slideIndex), r.find(W).toggle(!n.is(":last-child"))), r.hasClass(h) && !s.localIsResizing && Je(s.slideIndex, s.slideAnchor, s.anchorLink, s.sectionIndex), function(e, t, n) {
                    var o = t.destinyPos;
                    if (j.css3) {
                        var r = "translate3d(-" + i.round(o.left) + "px, 0px, 0px)";
                        ze(e.find($)).css(st(r)), It = setTimeout(function() {
                            Re(t)
                        }, j.scrollingSpeed, j.easing)
                    } else e.animate({
                        scrollLeft: i.round(o.left)
                    }, j.scrollingSpeed, j.easing, function() {
                        Re(t)
                    })
                }(t, s))
            }

            function Re(t) {
                var n, i;
                n = t.slidesNav, i = t.slideIndex, n.find(p).removeClass(h), n.find("li").eq(i).find("a").addClass(h), t.localIsResizing || (e.isFunction(j.afterSlideLoad) && j.afterSlideLoad.call(t.destiny, t.anchorLink, t.sectionIndex + 1, t.slideAnchor, t.slideIndex), Ct = !0, xe(t.destiny)), yt = !1
            }

            function qe() {
                if (We(), bt) {
                    var t = e(n.activeElement);
                    if (!t.is("textarea") && !t.is("input") && !t.is("select")) {
                        var o = z.height();
                        i.abs(o - Vt) > 20 * i.max(Vt, o) / 100 && (oe(!0), Vt = o)
                    }
                } else clearTimeout(Dt), Dt = setTimeout(function() {
                    oe(!0)
                }, 350)
            }

            function We() {
                var e = j.responsive || j.responsiveWidth,
                    t = j.responsiveHeight,
                    n = e && z.outerWidth() < e,
                    i = t && z.height() < t;
                e && t ? re(n || i) : e ? re(n) : t && re(i)
            }

            function ze(e) {
                var t = "all " + j.scrollingSpeed + "ms " + j.easingcss3;
                return e.removeClass(l), e.css({
                    "-webkit-transition": t,
                    transition: t
                })
            }

            function Ye(e) {
                return e.addClass(l)
            }

            function Be(t, n) {
                var i, o, r;
                i = t, j.menu && (e(j.menu).find(p).removeClass(h), e(j.menu).find('[data-menuanchor="' + i + '"]').addClass(h)), o = t, r = n, j.navigation && (e(S).find(p).removeClass(h), o ? e(S).find('a[href="#' + o + '"]').addClass(h) : e(S).find("li").eq(r).find("a").addClass(h))
            }

            function Xe(t) {
                var n = e(y).index(v),
                    i = t.index(v);
                return n == i ? "none" : n > i ? "up" : "down"
            }

            function Ue(t) {
                if (!t.hasClass(L)) {
                    var n = e('<div class="' + _ + '" />').height(Ve(t));
                    t.addClass(L).wrapInner(n)
                }
            }

            function Ve(e) {
                var t = xt;
                if (j.paddingTop || j.paddingBottom) {
                    var n = e;
                    n.hasClass(g) || (n = e.closest(v));
                    var i = parseInt(n.css("padding-top")) + parseInt(n.css("padding-bottom"));
                    t = xt - i
                }
                return t
            }

            function Ge(e, t) {
                t ? ze(_t) : Ye(_t), _t.css(st(e)), setTimeout(function() {
                    _t.removeClass(l)
                }, 10)
            }

            function Ke(t) {
                var n = _t.find(v + '[data-anchor="' + t + '"]');
                if (!n.length) {
                    var i = void 0 !== t ? t - 1 : 0;
                    n = e(v).eq(i)
                }
                return n
            }

            function Qe(e, t) {
                var n = Ke(e);
                if (n.length) {
                    var i, o, r, s = (i = t, (r = (o = n).find(E + '[data-anchor="' + i + '"]')).length || (i = void 0 !== i ? i : 0, r = o.find(E).eq(i)), r);
                    e === ft || n.hasClass(h) ? Ze(s) : ye(n, function() {
                        Ze(s)
                    })
                }
            }

            function Ze(e) {
                e.length && Fe(e.closest(O), e)
            }

            function Je(e, t, n, i) {
                var o = "";
                j.anchors.length && !j.lockAnchors && (e ? (void 0 !== n && (o = n), void 0 === t && (t = e), mt = t, et(o + "/" + t)) : void 0 !== e ? (mt = t, et(n)) : et(n)), nt()
            }

            function et(e) {
                if (j.recordHistory) location.hash = e;
                else if (bt || wt) t.history.replaceState(o, o, "#" + e);
                else {
                    var n = t.location.href.split("#")[0];
                    t.location.replace(n + "#" + e)
                }
            }

            function tt(e) {
                var t = e.data("anchor"),
                    n = e.index();
                return void 0 === t && (t = n), t
            }

            function nt() {
                var t = e(y),
                    n = t.find(A),
                    i = tt(t),
                    o = tt(n),
                    r = String(i);
                n.length && (r = r + "-" + o), r = r.replace("/", "-").replace("#", "");
                var s = new RegExp("\\b\\s?" + d + "-[^\\s]+\\b", "g");
                ht[0].className = ht[0].className.replace(s, ""), ht.addClass(d + "-" + r)
            }

            function it(e) {
                var t = [];
                return t.y = void 0 !== e.pageY && (e.pageY || e.pageX) ? e.pageY : e.touches[0].pageY, t.x = void 0 !== e.pageX && (e.pageY || e.pageX) ? e.pageX : e.touches[0].pageX, wt && he(e) && (j.scrollBar || !j.autoScrolling) && (t.y = e.touches[0].pageY, t.x = e.touches[0].pageX), t
            }

            function ot(e, t) {
                U(0, "internal"), void 0 !== t && (Tt = !0), Fe(e.closest(O), e), void 0 !== t && (Tt = !1), U(Ht.scrollingSpeed, "internal")
            }

            function rt(e) {
                var t = i.round(e);
                j.css3 && j.autoScrolling && !j.scrollBar ? Ge("translate3d(0px, -" + t + "px, 0px)", !1) : j.autoScrolling && !j.scrollBar ? _t.css("top", -t) : dt.scrollTop(t)
            }

            function st(e) {
                return {
                    "-webkit-transform": e,
                    "-moz-transform": e,
                    "-ms-transform": e,
                    transform: e
                }
            }

            function at(t, n, i) {
                "all" !== n ? Et[i][n] = t : e.each(Object.keys(Et[i]), function(e, n) {
                    Et[i][n] = t
                })
            }

            function lt(e, t, n) {
                j[e] = t, "internal" !== n && (Ht[e] = t)
            }

            function ct() {
                e("html").hasClass(u) ? ut("error", "Fullpage.js can only be initialized once and you are doing it multiple times!") : (j.continuousVertical && (j.loopTop || j.loopBottom) && (j.continuousVertical = !1, ut("warn", "Option `loopTop/loopBottom` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled")), j.scrollBar && j.scrollOverflow && ut("warn", "Option `scrollBar` is mutually exclusive with `scrollOverflow`. Sections with scrollOverflow might not work well in Firefox"), !j.continuousVertical || !j.scrollBar && j.autoScrolling || (j.continuousVertical = !1, ut("warn", "Scroll bars (`scrollBar:true` or `autoScrolling:false`) are mutually exclusive with `continuousVertical`; `continuousVertical` disabled")), j.scrollOverflow && !j.scrollOverflowHandler && (j.scrollOverflow = !1, ut("error", "The option `scrollOverflow:true` requires the file `scrolloverflow.min.js`. Please include it before fullPage.js.")), e.each(["fadingEffect", "continuousHorizontal", "scrollHorizontally", "interlockedSlides", "resetSliders", "responsiveSlides", "offsetSections", "dragAndMove", "scrollOverflowReset", "parallax"], function(e, t) {
                    j[t] && ut("warn", "fullpage.js extensions require jquery.fullpage.extensions.min.js file instead of the usual jquery.fullpage.js. Requested: " + t)
                }), e.each(j.anchors, function(t, n) {
                    var i = Y.find("[name]").filter(function() {
                            return e(this).attr("name") && e(this).attr("name").toLowerCase() == n.toLowerCase()
                        }),
                        o = Y.find("[id]").filter(function() {
                            return e(this).attr("id") && e(this).attr("id").toLowerCase() == n.toLowerCase()
                        });
                    (o.length || i.length) && (ut("error", "data-anchor tags can not have the same value as any `id` element on the site (or `name` element for IE)."), o.length && ut("error", '"' + n + '" is is being used by another element `id` property'), i.length && ut("error", '"' + n + '" is is being used by another element `name` property'))
                }))
            }

            function ut(e, t) {
                console && console[e] && console[e]("fullPage: " + t)
            }
            if (e("html").hasClass(u)) ct();
            else {
                var dt = e("html, body"),
                    ht = e("body"),
                    pt = e.fn.fullpage;
                j = e.extend({
                    menu: !1,
                    anchors: [],
                    lockAnchors: !1,
                    navigation: !1,
                    navigationPosition: "right",
                    navigationTooltips: [],
                    showActiveTooltip: !1,
                    slidesNavigation: !1,
                    slidesNavPosition: "bottom",
                    scrollBar: !1,
                    hybrid: !1,
                    css3: !0,
                    scrollingSpeed: 700,
                    autoScrolling: !0,
                    fitToSection: !0,
                    fitToSectionDelay: 1e3,
                    easing: "easeInOutCubic",
                    easingcss3: "ease",
                    loopBottom: !1,
                    loopTop: !1,
                    loopHorizontal: !0,
                    continuousVertical: !1,
                    continuousHorizontal: !1,
                    scrollHorizontally: !1,
                    interlockedSlides: !1,
                    dragAndMove: !1,
                    offsetSections: !1,
                    resetSliders: !1,
                    fadingEffect: !1,
                    normalScrollElements: null,
                    scrollOverflow: !1,
                    scrollOverflowReset: !1,
                    scrollOverflowHandler: e.fn.fp_scrolloverflow ? e.fn.fp_scrolloverflow.iscrollHandler : null,
                    scrollOverflowOptions: null,
                    touchSensitivity: 5,
                    normalScrollElementTouchThreshold: 5,
                    bigSectionsDestination: null,
                    keyboardScrolling: !0,
                    animateAnchor: !0,
                    recordHistory: !0,
                    controlArrows: !0,
                    controlArrowColor: "#fff",
                    verticalCentered: !0,
                    sectionsColor: [],
                    paddingTop: 0,
                    paddingBottom: 0,
                    fixedElements: null,
                    responsive: 0,
                    responsiveWidth: 0,
                    responsiveHeight: 0,
                    responsiveSlides: !1,
                    parallax: !1,
                    parallaxOptions: {
                        type: "reveal",
                        percentage: 62,
                        property: "translate"
                    },
                    sectionSelector: ".section",
                    slideSelector: ".slide",
                    afterLoad: null,
                    onLeave: null,
                    afterRender: null,
                    afterResize: null,
                    afterReBuild: null,
                    afterSlideLoad: null,
                    onSlideLeave: null,
                    afterResponsive: null,
                    lazyLoading: !0
                }, j);
                var ft, mt, gt, vt, yt = !1,
                    bt = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/),
                    wt = "ontouchstart" in t || navigator.msMaxTouchPoints > 0 || navigator.maxTouchPoints,
                    _t = e(this),
                    xt = z.height(),
                    Tt = !1,
                    St = !0,
                    Ct = !0,
                    kt = [],
                    Et = {
                        m: {
                            up: !0,
                            down: !0,
                            left: !0,
                            right: !0
                        }
                    };
                Et.k = e.extend(!0, {}, Et.m);
                var At, Dt, Ot, It, $t, Lt, Nt, Mt = function() {
                        return t.PointerEvent ? {
                            down: "pointerdown",
                            move: "pointermove"
                        } : {
                            down: "MSPointerDown",
                            move: "MSPointerMove"
                        }
                    }(),
                    Pt = {
                        touchmove: "ontouchmove" in t ? "touchmove" : Mt.move,
                        touchstart: "ontouchstart" in t ? "touchstart" : Mt.down
                    },
                    jt = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]',
                    Ht = e.extend(!0, {}, j);
                ct(), e.extend(e.easing, {
                    easeInOutCubic: function(e, t, n, i, o) {
                        return (t /= o / 2) < 1 ? i / 2 * t * t * t + n : i / 2 * ((t -= 2) * t * t + 2) + n
                    }
                }), e(this).length && (pt.version = "2.9.6", pt.setAutoScrolling = B, pt.setRecordHistory = X, pt.setScrollingSpeed = U, pt.setFitToSection = V, pt.setLockAnchors = function(e) {
                    j.lockAnchors = e
                }, pt.setMouseWheelScrolling = G, pt.setAllowScrolling = K, pt.setKeyboardScrolling = Q, pt.moveSectionUp = Z, pt.moveSectionDown = J, pt.silentMoveTo = ee, pt.moveTo = te, pt.moveSlideRight = ne, pt.moveSlideLeft = ie, pt.fitToSection = le, pt.reBuild = oe, pt.setResponsive = re, pt.destroy = function(t) {
                    B(!1, "internal"), K(!1), Q(!1), _t.addClass(c), clearTimeout(It), clearTimeout(Ot), clearTimeout(Dt), clearTimeout($t), clearTimeout(Lt), z.off("scroll", ae).off("hashchange", Ee).off("resize", qe), Y.off("keydown", De).off("keyup", Ie).off("click touchstart", S + " a").off("mouseenter", S + " li").off("mouseleave", S + " li").off("click touchstart", P).off("mouseover", j.normalScrollElements).off("mouseout", j.normalScrollElements), e(v).off("click touchstart", H), clearTimeout(It), clearTimeout(Ot), t && function() {
                        rt(0), _t.find("img[data-src], source[data-src], audio[data-src], iframe[data-src]").each(function() {
                            we(e(this), "src")
                        }), _t.find("img[data-srcset]").each(function() {
                            we(e(this), "srcset")
                        }), e(S + ", " + M + ", " + H).remove(), e(v).css({
                            height: "",
                            "background-color": "",
                            padding: ""
                        }), e(E).css({
                            width: ""
                        }), _t.css({
                            height: "",
                            position: "",
                            "-ms-touch-action": "",
                            "touch-action": ""
                        }), dt.css({
                            overflow: "",
                            height: ""
                        }), e("html").removeClass(u), ht.removeClass(a), e.each(ht.get(0).className.split(/\s+/), function(e, t) {
                            0 === t.indexOf(d) && ht.removeClass(t)
                        }), e(v + ", " + E).each(function() {
                            j.scrollOverflowHandler && j.scrollOverflowHandler.remove(e(this)), e(this).removeClass(L + " " + h), e(this).attr("style", e(this).data("fp-styles"))
                        }), Ye(_t), _t.find(x + ", " + $ + ", " + O).each(function() {
                            e(this).replaceWith(this.childNodes)
                        }), _t.css({
                            "-webkit-transition": "none",
                            transition: "none"
                        }), dt.scrollTop(0);
                        var t = [g, k, I];
                        e.each(t, function(t, n) {
                            e("." + n).removeClass(n)
                        })
                    }()
                }, pt.shared = {
                    afterRenderActions: se
                }, function() {
                    j.css3 && (j.css3 = function() {
                        var e, i = n.createElement("p"),
                            r = {
                                webkitTransform: "-webkit-transform",
                                OTransform: "-o-transform",
                                msTransform: "-ms-transform",
                                MozTransform: "-moz-transform",
                                transform: "transform"
                            };
                        for (var s in n.body.insertBefore(i, null), r) i.style[s] !== o && (i.style[s] = "translate3d(1px,1px,1px)", e = t.getComputedStyle(i).getPropertyValue(r[s]));
                        return n.body.removeChild(i), e !== o && e.length > 0 && "none" !== e
                    }()), j.scrollBar = j.scrollBar || j.hybrid, i = _t.find(j.sectionSelector), j.anchors.length || (j.anchors = i.filter("[data-anchor]").map(function() {
                        return e(this).data("anchor").toString()
                    }).get()), j.navigationTooltips.length || (j.navigationTooltips = i.filter("[data-tooltip]").map(function() {
                        return e(this).data("tooltip").toString()
                    }).get()), _t.css({
                        height: "100%",
                        position: "relative"
                    }), _t.addClass(r), e("html").addClass(u), xt = z.height(), _t.removeClass(c), _t.find(j.sectionSelector).addClass(g), _t.find(j.slideSelector).addClass(k), e(v).each(function(t) {
                        var n, i, o, r, a = e(this),
                            l = a.find(E),
                            c = l.length;
                        a.data("fp-styles", a.attr("style")), o = a, (r = t) || 0 !== e(y).length || o.addClass(h), vt = e(y), o.css("height", xt + "px"), j.paddingTop && o.css("padding-top", j.paddingTop), j.paddingBottom && o.css("padding-bottom", j.paddingBottom), void 0 !== j.sectionsColor[r] && o.css("background-color", j.sectionsColor[r]), void 0 !== j.anchors[r] && o.attr("data-anchor", j.anchors[r]), n = a, i = t, void 0 !== j.anchors[i] && n.hasClass(h) && Be(j.anchors[i], i), j.menu && j.css3 && e(j.menu).closest(s).length && e(j.menu).appendTo(ht), c > 0 ? function(t, n, i) {
                            var o, r = 100 * i,
                                s = 100 / i;
                            n.wrapAll('<div class="' + I + '" />'), n.parent().wrap('<div class="' + D + '" />'), t.find($).css("width", r + "%"), i > 1 && (j.controlArrows && ((o = t).find(O).after('<div class="' + R + '"></div><div class="fp-controlArrow fp-next"></div>'), "#fff" != j.controlArrowColor && (o.find(W).css("border-color", "transparent transparent transparent " + j.controlArrowColor), o.find(q).css("border-color", "transparent " + j.controlArrowColor + " transparent transparent")), j.loopHorizontal || o.find(q).hide()), j.slidesNavigation && function(e, t) {
                                e.append('<div class="' + N + '"><ul></ul></div>');
                                var n = e.find(M);
                                n.addClass(j.slidesNavPosition);
                                for (var i = 0; i < t; i++) n.find("ul").append('<li><a href="#"><span></span></a></li>');
                                n.css("margin-left", "-" + n.width() / 2 + "px"), n.find("li").first().find("a").addClass(h)
                            }(t, i)), n.each(function(t) {
                                e(this).css("width", s + "%"), j.verticalCentered && Ue(e(this))
                            });
                            var a = t.find(A);
                            a.length && (0 !== e(y).index(v) || 0 === e(y).index(v) && 0 !== a.index()) ? ot(a, "internal") : n.eq(0).addClass(h)
                        }(a, l, c) : j.verticalCentered && Ue(a)
                    }), j.fixedElements && j.css3 && e(j.fixedElements).appendTo(ht), j.navigation && function() {
                        ht.append('<div id="' + T + '"><ul></ul></div>');
                        var t = e(S);
                        t.addClass(function() {
                            return j.showActiveTooltip ? "fp-show-active " + j.navigationPosition : j.navigationPosition
                        });
                        for (var n = 0; n < e(v).length; n++) {
                            var i = "";
                            j.anchors.length && (i = j.anchors[n]);
                            var o = '<li><a href="#' + i + '"><span></span></a>',
                                r = j.navigationTooltips[n];
                            void 0 !== r && "" !== r && (o += '<div class="' + C + " " + j.navigationPosition + '">' + r + "</div>"), o += "</li>", t.find("ul").append(o)
                        }
                        e(S).css("margin-top", "-" + e(S).height() / 2 + "px"), e(S).find("li").eq(e(y).index(v)).find("a").addClass(h)
                    }(), _t.find('iframe[src*="youtube.com/embed/"]').each(function() {
                        var t, n, i;
                        t = e(this), n = "enablejsapi=1", i = t.attr("src"), t.attr("src", i + (/\?/.test(i) ? "&" : "?") + n)
                    }), j.scrollOverflow ? At = j.scrollOverflowHandler.init(j) : se(), K(!0), B(j.autoScrolling, "internal"), We(), nt(), "complete" === n.readyState && ke();
                    var i;
                    z.on("load", ke)
                }(), z.on("scroll", ae).on("hashchange", Ee).blur(Me).resize(qe), Y.keydown(De).keyup(Ie).on("click touchstart", S + " a", Pe).on("click touchstart", P, je).on("click", ".fp-tooltip", Oe), e(v).on("click touchstart", H, Ne), j.normalScrollElements && (Y.on("mouseenter touchstart", j.normalScrollElements, function() {
                    K(!1)
                }), Y.on("mouseleave touchend", j.normalScrollElements, function() {
                    K(!0)
                })));
                var Ft = !1,
                    Rt = 0,
                    qt = 0,
                    Wt = 0,
                    zt = 0,
                    Yt = 0,
                    Bt = (new Date).getTime(),
                    Xt = 0,
                    Ut = 0,
                    Vt = xt
            }
        }
    }),
    function(e) {
        function t() {
            e(".single-select").select2(), e(".val-drop-btn").on("click", function(t) {
                e(this).parents(".custom-dropdown").toggleClass("active-drop"), e(this).parents(".custom-dropdown").find(".dropdown-list").stop().fadeToggle(400), t.preventDefault()
            }), e(document).click(function(t) {
                e(t.target).closest(".custom-dropdown").length || (e(".custom-dropdown").find(".dropdown-list").stop().fadeOut(400), e(".custom-dropdown").removeClass("active-drop"), t.stopPropagation())
            }), e('.custom-dropdown input[type="radio"]').on("change", function() {
                var t = e(this).val();
                console.log(t)
                    , e(this).parents(".custom-dropdown").find(".val-drop-btn").text(t), e(".custom-dropdown").find(".dropdown-list").stop().fadeOut(400), e(".custom-dropdown").removeClass("active-drop"),

                    ReloaderBets.reupdate(this);




            });
            var t = 1;
            e(".dropdown-list").on("click", ".create-btn", function(n) {
                if ("" != e(this).parents(".create-playlist").find("input").val()) {
                    var i = e(this).parents(".create-playlist").find("input").val(),
                        o = e(this).parents(".custom-dropdown").find(".play-list .drop-item").length + 1;
                    e(this).parents(".custom-dropdown").find(".play-list").append('<div class="drop-item"><div class="check-drop"><input name="playlist" type="radio" id="playlist' + o + t + '" value="' + i + '"><label for="playlist' + o + '">' + i + "</label></div></div>"), e(this).parents(".create-playlist").find("input").val("")
                }
                t++, n.preventDefault()
            }), e(".delete-event").on("click", function(t) {
                e(this).parents(".event-item").remove(), t.preventDefault()
            })
        }

        function n() {
            e(".btn-tab").on("click", function() {
                var t = e(this).attr("data-target");
                return e(this).parents(".tab").find("li").removeClass("active"), e(this).parent().addClass("active"), e(t).parents(".tab-content").find(".tab-panel").stop().fadeOut(400, function() {}), clearTimeout(c), c = setTimeout(function() {
                    e(".tab-panel").removeClass("active"), e(t).stop().fadeIn(400).addClass("active")
                }, 400), !1
            })
        }

        function i() {
            var t, n, i = e(".rev-slider .slick-slide").length,
                o = 1;
            console.log(i), e(window).width() > 990 && (n = Math.round(i / 2)), e(window).width() < 990 && (n = i), e(window).resize(function() {
                n = e(window).width() > 990 ? Math.round(i / 2) : i
            }), e(".arrow-review").append('<div class="count-slides"><span class="cur-slide">' + o + '</span>/<span class="all-slides">' + n + "</span></div>"), e(".rev-slider").on("afterChange", function(n, i, r, s) {
                e(".rev-slider .slick-slide").removeClass("cpr_count"), e(".rev-slider .slick-current").prevAll(".slick-slide").addClass("cpr_count"), e(window).width() > 990 && (o = e(".cpr_count").length + 2, t = Math.round(o / 2)), e(window).width() < 990 && (o = e(".cpr_count").length + 1, t = o), console.log(t), e(".arrow-review .cur-slide").text(t)
            }), e(".line-list a").on("click", function() {
                var t = e(this).attr("data-index");
                return e.fn.fullpage.moveTo(t), !1
            })
        }

        function o() {
            var t;
            e("div").is("#home-scroll") && e("#home-scroll").fullpage({
                menu: "#menu-slide",
                anchors: ["mainScreen", "textScreen", "aboutScreen", "reviewScreen"],
                scrollingSpeed: 1100,
                verticalCentered: !0,
                onLeave: function(n, i, o) {
                    var r;
                    r = i <= 4 ? i : 4, e(".active-screen span").text(r);
                    var s = i - 1;
                    e(".line-list li").removeClass("active"), e(".line-list li").eq(s).addClass("active"), e(".image-background-section-" + n).removeClass("active"), clearTimeout(t), t = setTimeout(function() {
                        e(".image-background-section-" + i).addClass("active")
                    }, 500), 1 != i ? (e(".arrow-main-slider").addClass("two-arrows"), e(".arrow-up").fadeIn(400)) : (e(".arrow-main-slider").removeClass("two-arrows"), e(".arrow-up").fadeOut(400)), 1 == i ? e(".image-first-screen").addClass("active") : e(".image-first-screen").removeClass("active"), 5 == i ? (e(".fixed-footer").addClass("big-footer"), e(".arrow-main-slider").addClass("hide-bootm-arrow"), e(".header-main").addClass("scrolled-header"), e(".pagination-wrapper").addClass("scroll-pag")) : (e(".fixed-footer").removeClass("big-footer"), e(".arrow-main-slider").removeClass("hide-bootm-arrow"), e(".header-main").removeClass("scrolled-header"), e(".pagination-wrapper").removeClass("scroll-pag")), 2 != i && (e(".image-back").removeClass("animate-image"), e(".back-two-slide").removeClass("active-slide-back"))
                },
                afterLoad: function(t, n) {
                    console.log(n),
                    2 == n && (e(".back-two-slide").addClass("active-slide-back"), e(".image-back").addClass("animate-image"))
                }
            })
        }

        function r() {
            e("div").is("#home-scroll") && (e(window).width() < 768 ? 0 == l && (e.fn.fullpage.destroy("all"), l = !0) : 1 == l && (o(), l = !1))
        }

        function s() {
            e(".input-row input,.input-row textarea").each(function() {
                "" != e(this).val() && e(this).parents(".input-row").addClass("hasData")
            }), e(".input-row input,.input-row textarea").bind("blur", function() {
                "" != e(this).val() ? e(this).parents(".input-row").addClass("hasData") : e(this).parents(".input-row").removeClass("hasData"), e(this).parents(".input-row").removeClass("focus")
            }), e(".input-row input,.input-row textarea").bind("focus", function() {
                e(this).parents(".input-row").addClass("focus"), "" != e(this).val() ? e(this).parents(".input-row").addClass("hasData") : e(this).parents(".input-row").removeClass("hasData")
            }), e("#show-login").on("click", function(t) {
                e(".right-side-login").addClass("login-show"), e(".body-modal-inner").addClass("padding-left-form"), e(".login-block").removeClass("active"), e(".register-block").addClass("active"), t.preventDefault()
            }), e("#show-register").on("click", function(t) {
                e(".right-side-login").removeClass("login-show"), e(".body-modal-inner").removeClass("padding-left-form"), e(".login-block").addClass("active"), e(".register-block").removeClass("active"), t.preventDefault()
            }), e('[data-toggle="modal-dismiss"]').on("click", function() {
                return e(this).parents(".modal-wrapper").fadeOut(500).removeClass("active"), e("body").removeClass("noScroll"), !1
            }), e('[data-toggle="modal"]').on("click", function() {
                var t = e(this).attr("data-target");
                return e(t).fadeIn(500).addClass("active"), e("body").addClass("noScroll"), !1
            }), e(".chat-tab-trigger").on("click", function() {
                var t = e(this).attr("data-toggle");
                return e(".chat-content-item").stop().fadeOut(400, function() {
                    setTimeout(function() {
                        e(t).stop().fadeIn(400).addClass("active")
                    }, 400)
                }), e(".chat-tab-trigger").removeClass("active"), e(this).addClass("active"), e(window).width() < 768 && e(".left-chat").removeClass("active"), !1
            }), e(".button-trig-l-s").on("click", function() {
                e(".left-chat").toggleClass("active")
            }), e(window).width()
        }
        var a = 1,
            l = !0;
        e(document).ready(function() {
            if (e(".load-more-btn").on("click", function(t) {
                    e(this).parents(".search-list-items").find(".hide-s-r").stop().slideToggle(400), e(this).toggleClass("loaded-btn"), t.preventDefault()
                }), e('[data-toggle="collap"]').on("click", function(t) {
                    var n = e(this).attr("href");
                    e(this).toggleClass("active"), e(n).stop().slideToggle(500), t.preventDefault()
                }), e(".all-rate-btn").on("click", function(t) {
                    e(this).parents(".table-body").find(".hide-col").slideToggle(400), e(this).toggleClass("shown-rate"), t.preventDefault()
                }), e(".list-setting-massage button").on("click", function(t) {
                    e(this).toggleClass("active")
                }), e(".drop-trig-lay").on("click", function(t) {
                    e(this).parents(".play-list-drop").toggleClass("active"), e(this).parents(".play-list-drop").find(".drop-play").fadeToggle(400), t.preventDefault()
                }), e(".pl-item").on("click", function(t) {
                    var n = e(this).text();
                    e(this).parents(".play-list-drop").find(".drop-trig-lay").text(n), e(this).parents(".play-list-drop").removeClass("active"), e(this).parents(".play-list-drop").find(".drop-play").fadeOut(400), t.preventDefault()
                }), e(".search-inp-modal").change(function() {
                    "" != e(this).val() ? e(this).parents(".search-modal-block").find(".result-search").slideDown(400) : e(this).parents(".search-modal-block").find(".result-search").slideUp(400)
                }), e('[data-toggle="tooltip"]').tooltip(), e(".all-item-chat .favorite-btn").on("click", function(t) {
                    var n = e('.chat-item input[name="chat"]:checked').length,
                        i = e(".favorite-list-chat .chat-item").length + 1;
                    n > 1 ? (e('.chat-item input[name="chat"]:checked').parents(".chat-item").find(".favorite-btn").addClass("active"), e(".favorite-list-chat").prepend(e('.chat-item input[name="chat"]:checked').parents(".chat-item")), e('.chat-item input[name="chat"]:checked').prop("checked", !1), e(".favorite-list-chat .chat-item").removeClass("selected-item")) : e(".favorite-list-chat").prepend(e(this).parents(".chat-item")), i >= 1 ? e(".list-chat-item h3").fadeIn(400) : e(".list-chat-item h3").fadeOut(400), t.preventDefault()
                }), e(".favorite-list-chat").on("click", ".favorite-btn", function(t) {
                    var n = e('.favorite-list-chat .chat-item input[name="chat"]:checked').length,
                        i = e(".favorite-list-chat .chat-item").length;
                    n > 1 ? (e('.chat-item input[name="chat"]:checked').parents(".chat-item").find(".favorite-btn").removeClass("active"), e(".all-item-chat").prepend(e('.chat-item input[name="chat"]:checked').parents(".chat-item")), e('.chat-item input[name="chat"]:checked').prop("checked", !1), e(".all-item-chat .chat-item").removeClass("selected-item")) : e(".all-item-chat").prepend(e(this).parents(".chat-item")), i >= 1 ? e(".list-chat-item h3").fadeIn(400) : e(".list-chat-item h3").fadeOut(400), t.preventDefault()
                }), e(".create-groupe").on("click", function(t) {
                    e(".groupe-block").addClass("active"), t.preventDefault()
                }), e(".new_c").on("click", function(t) {
                    e(".groupe-block").removeClass("active"), e(".chanel-block").addClass("active"), t.preventDefault()
                }), e(".new_g").on("click", function(t) {
                    e(".chanel-block").removeClass("active"), e(".groupe-block").addClass("active"), t.preventDefault()
                }), e(".shared").on("click", function(t) {
                    e(this).parents(".shared-block").toggleClass("active"), t.preventDefault()
                }), e(".delete-btn").on("click", function(t) {
                    e(this).parents(".chat-item").remove(), e(".favorite-list-chat .chat-item").length >= 1 ? e(".list-chat-item h3").fadeIn(400) : e(".list-chat-item h3").fadeOut(400), t.preventDefault()
                }), e('input[name="chat"]').on("change", function() {
                    e(this).parents(".chat-item").toggleClass("selected-item")
                }), e(".save-btn").on("click", function() {
                    return e(this).addClass("saved-btn"), setTimeout(function() {
                        e(".modal-wrapper").fadeOut(500).removeClass("active"), e("body").removeClass("noScroll")
                    }, 2e3), !1
                }), e(".event-subscribe-btn").on("click", function(t) {
                    e(this).toggleClass("subscribed-btn"), t.preventDefault()
                }), e(".search-trigger").on("click", function() {
                    return e(".search-block").addClass("active"), !1
                }), e(".close-search").on("click", function() {
                    return e(".search-block").removeClass("active"), !1
                }), e(".trig-filter").on("click", function() {
                    return e(this).parents(".for-mobile-drop").find(".head-tabs").fadeToggle(400), !1
                }), s(), r(), t(), e(window).resize(function() {
                    r()
                }), e(".btn-hover").on("mouseenter", function(t) {
                    var n = e(this).offset(),
                        i = t.pageX - n.left,
                        o = t.pageY - n.top;
                    e(this).find("span").css({
                        top: o,
                        left: i
                    })
                }).on("mouseout", function(t) {
                    var n = e(this).offset(),
                        i = t.pageX - n.left,
                        o = t.pageY - n.top;
                    e(this).find("span").css({
                        top: o,
                        left: i
                    })
                }), e(".arrow-down").on("click", function() {
                    return e.fn.fullpage.moveSectionDown(), !1
                }), e(".arrow-up").on("click", function() {
                    return e.fn.fullpage.moveSectionUp(), !1
                }), e(".pagination-wrapper").css({
                    right: (e("body").width() - 1060) / 2
                }), e(window).resize(function() {
                    e(".pagination-wrapper").css({
                        right: (e("body").width() - 1060) / 2
                    })
                }), e("div").is("#scene")) {
                var o = document.getElementById("scene");
                new Parallax(o)
            }
            e(".forgot-btn").on("click", function() {
                return e(".forgot-inner").addClass("show-reset"), e(".login-inner").addClass("hide-login"), !1
            }), e(".auth-btn").on("click", function() {
                return e(".forgot-inner").removeClass("show-reset"), e(".login-inner").removeClass("hide-login"), !1
            }), n(), e(".rev-slider").slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                rows: 2,
                infinite: !1,
                appendArrows: e(".arrow-review"),
                prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
                nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
                responsive: [{
                    breakpoint: 990,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }), e(".wins-slider").slick({
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: !1,
                dots: !0,
                dotsClass: "slick-dots winner-dots",
                appendArrows: e("#winner-nav .slider-navigation-inner"),
                appendDots: e("#winner-nav .slider-navigation-inner"),
                prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
                nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                }, {
                    breakpoint: 990,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            }), e(".bets-slider").slick({
                slidesToShow: 9,
                slidesToScroll: 9,
                infinite: !1,
                dots: !0,
                dotsClass: "slick-dots winner-dots",
                appendArrows: e("#bets-nav .slider-navigation-inner"),
                appendDots: e("#bets-nav .slider-navigation-inner"),
                prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
                nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 7,
                        slidesToScroll: 7
                    }
                }, {
                    breakpoint: 990,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            }), i(), e(".close-text").on("click", function() {
                return e(this).parent().fadeOut(400), !1
            }), e(".toggle-tabs-mobile").on("click", function() {
                return e(this).toggleClass("active"), e(this).parents(".tab-panel").find(".tab-panel-inner").stop().slideToggle(400), !1
            }), e(".circle-wrapper").each(function() {
                var t, n = e(this).find(".circle"),
                    i = e(this).attr("data-ptc"),
                    o = 4.76190476 * i / 100;
                1 == i && (t = "#FEFF01"), 2 == i && (t = "#B9FF00"), 3 == i && (t = "#72FF00"), 4 == i && (t = "#00FF0D"), 5 == i && (t = "#119300"), 6 == i && (t = "#01FE6D"), 7 == i && (t = "#02FEC1"), 8 == i && (t = "#00D8FF"), 9 == i && (t = "#0190FF"), 10 == i && (t = "#0053FF"), 11 == i && (t = "#0000FE"), 12 == i && (t = "#0500A4"), 13 == i && (t = "#772A9E"), 14 == i && (t = "#BA27C8"), 15 == i && (t = "#D912A3"), 16 == i && (t = "#FD018A"), 17 == i && (t = "#FE722B"), 18 == i && (t = "#FE4E00"), 19 == i && (t = "#FFFFFF"), 20 == i && (t = "#454545"), 21 == i && (t = "#1A1A1A"), e(n).circleProgress({
                    value: o,
                    fill: t,
                    animation: !1,
                    size: 74,
                    thickness: 2,
                    emptyFill: "rgba(255, 255, 255, .07)"
                })
            }), e(".big-circle-wrapper").each(function() {
                var t, n = e(this).find(".big-circle"),
                    i = e(this).attr("data-ptc"),
                    o = 4.76190476 * i / 100;
                1 == i && (t = "#FEFF01"), 2 == i && (t = "#B9FF00"), 3 == i && (t = "#72FF00"), 4 == i && (t = "#00FF0D"), 5 == i && (t = "#119300"), 6 == i && (t = "#01FE6D"), 7 == i && (t = "#02FEC1"), 8 == i && (t = "#00D8FF"), 9 == i && (t = "#0190FF"), 10 == i && (t = "#0053FF"), 11 == i && (t = "#0000FE"), 12 == i && (t = "#0500A4"), 13 == i && (t = "#772A9E"), 14 == i && (t = "#BA27C8"), 15 == i && (t = "#D912A3"), 16 == i && (t = "#FD018A"), 17 == i && (t = "#FE722B"), 18 == i && (t = "#FE4E00"), 19 == i && (t = "#FFFFFF"), 20 == i && (t = "#454545"), 21 == i && (t = "#1A1A1A"), e(n).circleProgress({
                    value: o,
                    fill: t,
                    size: 160,
                    thickness: 5,
                    emptyFill: "rgba(255, 255, 255, .07)"
                })
            }), e(".like").on("click", function() {
                return e(this).toggleClass("liked"), !1
            }), e("#top-btn").on("click", function() {
                return e("html, body").animate({
                    scrollTop: 0
                }, 1500), !1
            }), e(".drop-menu-trigger").on("click", function() {
                return e(".drop-wrapper").stop().fadeOut(400), e(this).parents(".drop-menu").find(".drop-wrapper").stop().fadeToggle(400), !1
            }), e(document).click(function(t) {
                e(t.target).closest(".drop-wrapper").length || (e(".drop-wrapper").fadeOut(400), t.stopPropagation())
            }), e(".ancor").on("click", function() {
                event.preventDefault();
                var t = e(this).attr("href"),
                    n = e(t).offset().top;
                "" != t && e("body,html").animate({
                    scrollTop: n
                }, 1500)
            }), e(".back-two-slide").css({
                height: e(window).height(),
                width: e(window).height()
            }), e(".chose-item input").on("change", function() {
                e(".chose-item input:checked").length > 3 && (this.checked = !1)
            }), e(".add-event-btn").on("click", function(n) {
                var i = '<div class="event-item"><div class="row delete-row"><div class="column-12"><a href="#" class="delete-event">- Удалить</a></div></div><div class="row"><div class="input-row column-6"><div class="input-row-inner"><select name="Вид спорта" class="single-select"><option value="1">Вид спорта</option><option value="1">Вид спорта 1</option><option value="1">Вид спорта 2</option></select></div></div><div class="input-row column-6"><div class="input-row-inner"><div class="custom-dropdown">\n<div class="custom-dropdown-inner">\n    <div class="val-drop">\n        <button class="val-drop-btn">Плейлист #A</button>\n    </div>\n    <div class="dropdown-list">\n        <div class="play-list">\n            <div class="drop-item">\n                <div class="check-drop">\n                    <input name="playlist" type="radio" id="playlist1' + a + '" checked="checked" value="Плейлист #A">\n                    <label for="playlist1' + a + '">Плейлист #A</label>\n                </div>\n            </div>\n            <div class="drop-item">\n                <div class="check-drop">\n                    <input name="playlist" type="radio" id="playlist2' + a + '" value="Лига Чемпионов">\n                    <label for="playlist2' + a + '">Лига Чемпионов</label>\n                </div>\n            </div>\n            <div class="drop-item">\n                <div class="check-drop">\n                    <input name="playlist" type="radio" id="playlist3' + a + '" value="НБА">\n                    <label for="playlist3' + a + '">НБА</label>\n                </div>\n            </div>\n        </div>\n        <div class="drop-item">\n            <div class="create-playlist">\n                <div class="input-create">\n                    <input type="text" placeholder="Новый плейлист">\n                </div>\n                <div class="btn-create">\n                    <button class="btn-primary btn btn-hover create-btn">Создать</button>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n</div></div></div></div><div class="row">\n    <div class="input-row column-6">\n        <div class="input-row-inner">\n            <input type="text" placeholder="Название матча">\n        </div>\n    </div>\n    <div class="input-row column-6">\n        <div class="input-row-inner">\n            <input type="text" placeholder="Прогноз">\n        </div>\n    </div>\n</div>\n<div class="row">\n    <div class="input-row column-3">\n        <div class="input-row-inner">\n            <input type="text" placeholder="Коэффициент">\n        </div>\n    </div>\n    <div class="input-row column-3">\n        <div class="input-row-inner">\n            <input type="text" placeholder="Процент от банка (%)">\n        </div>\n    </div>\n    <div class="input-row column-6 column-m-12">\n        <div class="input-row-inner date-drop">\n            <input type="text" placeholder="Дата">\n            <span class="icon-calendar"></span>\n        </div>\n    </div>\n</div></div>';
                a++, e(".event-block").append(i), e(".event-item").length > 1 ? e(".delete-row").slideDown(400) : e(".delete-row").slideUp(400), t(), n.preventDefault()
            }), e(".delete-event").on("click", function(t) {
                e(this).parents(".event-item").remove(), t.preventDefault()
            }), e("#menu-slide li a").on("click", function() {})
        });
        var c
    }(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var n = 0; n < t.length; n++) {
            var i = t[n];
            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
    }
    return function(t, n, i) {
        return n && e(t.prototype, n), i && e(t, i), t
    }
}();
! function(e) {
    var t = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(e) {
            setTimeout(e, 10)
        },
        n = void 0,
        i = void 0,
        o = void 0,
        r = void 0,
        s = void 0,
        a = void 0,
        l = void 0,
        c = void 0,
        u = void 0,
        d = void 0,
        h = void 0,
        p = void 0,
        f = void 0,
        m = void 0,
        g = void 0,
        v = void 0,
        y = void 0,
        b = void 0,
        w = void 0,
        _ = void 0,
        x = void 0,
        T = void 0,
        S = void 0,
        C = void 0,
        k = void 0,
        E = void 0,
        A = void 0,
        D = void 0,
        O = function() {
            function e(t) {
                _classCallCheck(this, e);
                var n = {};
                t && (t.nodeName ? (n = JSON.parse(JSON.stringify(t.dataset)), "IMG" === t.nodeName ? n.image = t : n.wrapperElement = t) : n = t), this.state = "stopped", this.touches = [], this.on("imageLoaded", this._onImageLoaded), this._initImage(n)
            }
            return _createClass(e, [{
                key: "on",
                value: function(e, t) {
                    this.events = this.events || {}, this.events[e] = this.events[e] || [], this.events[e].push(t)
                }
            }, {
                key: "emit",
                value: function(e, t) {
                    var n = this.events[e];
                    if (n && n.length)
                        for (var i = 0; i < n.length; i++) {
                            var o = n[i];
                            o.call(this, t)
                        }
                }
            }, {
                key: "start",
                value: function(e) {
                    var t = e || {};
                    this.initPosition = t.initPosition || this.initPosition, this.initDirection = t.initDirection || this.initDirection, this.canvas && (this.canvas.width = this.width, this.canvas.height = this.height, this.canvas.style.display = ""), this._initOrigins(), this._initParticles(), "running" !== this.state && (this.state = "running", this.disableInteraction || ("ontouchstart" in window || window.navigator.msPointerEnabled ? (document.body.addEventListener("touchstart", this._touchHandler), document.body.addEventListener("touchmove", this._touchHandler), document.body.addEventListener("touchend", this._clearTouches), document.body.addEventListener("touchcancel", this._clearTouches)) : (this.canvas.addEventListener("mousemove", this._mouseHandler), this.canvas.addEventListener("mouseout", this._clearTouches))), this._animate())
                }
            }, {
                key: "stop",
                value: function(e) {
                    var t = e || {};
                    this.fadePosition = t.fadePosition || this.fadePosition, this.fadeDirection = t.fadeDirection || this.fadeDirection, this._fade(), document.body.removeEventListener("touchstart", this._touchHandler), document.body.removeEventListener("touchmove", this._touchHandler), document.body.removeEventListener("touchend", this._clearTouches), document.body.removeEventListener("touchcancel", this._clearTouches), this.canvas.removeEventListener("mousemove", this._mouseHandler), this.canvas.removeEventListener("mouseout", this._clearTouches)
                }
            }, {
                key: "_animate",
                value: function() {
                    var e = this;
                    "stopped" !== this.state ? (this._calculate(), this._draw(), t(function() {
                        return e._animate()
                    })) : this.emit("stopped")
                }
            }, {
                key: "_onImageLoaded",
                value: function(e) {
                    this.imageWidth = this.image.naturalWidth || this.image.width, this.imageHeight = this.image.naturalHeight || this.image.height, this.imageRatio = this.imageWidth / this.imageHeight, this.width = this.width || this.imageWidth, this.height = this.height || this.imageHeight, this.renderSize = (this.width + this.height) / 4, this.srcImage && (this.srcImage.style.display = "none"), this._initSettings(e), this._initContext(e), this._initResponsive(e), this.start()
                }
            }, {
                key: "_initImage",
                value: function(e) {
                    var t = this;
                    this.srcImage = e.image, !this.srcImage && e.imageId && (this.srcImage = document.getElementById(e.imageId)), this.imageUrl = e.imageUrl || this.srcImage.src, this.image = document.createElement("img"), this.wrapperElement = e.wrapperElement || this.srcImage.parentElement, this.image.onload = function() {
                        return t.emit("imageLoaded", e)
                    }, this.image.crossOrigin = "Anonymous", e.addTimestamp && (/\?/.test(this.imageUrl) ? this.imageUrl += "&d=" + Date.now() : this.imageUrl += "?d=" + Date.now()), this.image.src = this.imageUrl
                }
            }, {
                key: "_initContext",
                value: function(e) {
                    this.canvas = e.canvas, this.canvas || this.context || !this.wrapperElement || (this.canvas = document.createElement("canvas"), this.wrapperElement.appendChild(this.canvas)), this.convas && (this.convas.style.display = "none"), this.context = e.context, this.renderer = e.renderer || "default"
                }
            }, {
                key: "_defaultInitContext",
                value: function(e) {
                    this.context = this.context || this.canvas.getContext("2d")
                }
            }, {
                key: "_webglInitContext",
                value: function() {
                    this.context = this.context || this.canvas.getContext("webgl") || this.canvas.getContext("experimental-webgl"), this.fragmentShaderScript = "\n        void main(void) {\n         gl_FragColor = vec4(1, 1, 1, 0.7);\n        }\n      ", this.vertexShaderScript = "\n        attribute vec3 vertexPosition;\n        vec3 offset = vec3(-5, 3, 100);\n        vec3 mirror = vec3(0.01, -0.01, 1);\n\n        uniform mat4 modelViewMatrix;\n        uniform mat4 perspectiveMatrix;\n\n        void main(void) {\n          gl_Position = perspectiveMatrix * modelViewMatrix * vec4(mirror * vertexPosition + offset, 1.0);\n          gl_PointSize = 1.0;\n        }\n      ", this.context.viewport(0, 0, this.width, this.height);
                    var e = this.context.createShader(this.context.VERTEX_SHADER);
                    this.context.shaderSource(e, this.vertexShaderScript), this.context.compileShader(e);
                    var t = this.context.createShader(this.context.FRAGMENT_SHADER);
                    this.context.shaderSource(t, this.fragmentShaderScript), this.context.compileShader(t), this.program = this.context.createProgram(), this.context.attachShader(this.program, e), this.context.attachShader(this.program, t), this.context.linkProgram(this.program), this.context.useProgram(this.program), this.vertexPosition = this.context.getAttribLocation(this.program, "vertexPosition"), this.context.enableVertexAttribArray(this.vertexPosition), this.context.clearColor(0, 0, 0, 1), this.context.clearDepth(1), this.context.enable(this.context.BLEND), this.context.disable(this.context.DEPTH_TEST), this.context.blendFunc(this.context.SRC_ALPHA, this.context.ONE), this.vertexBuffer = this.context.createBuffer(), this.context.bindBuffer(this.context.ARRAY_BUFFER, this.vertexBuffer), this.context.clear(this.context.COLOR_BUFFER_BIT | this.context.DEPTH_BUFFER_BIT);
                    var n = this.width / this.height,
                        i = 1 * Math.tan(1 * Math.PI / 360),
                        o = -i,
                        r = i * n,
                        s = -r,
                        a = (r + s) / (r - s),
                        l = (i + o) / (i - o),
                        c = 2 / (r - s),
                        u = 2 / (i - o),
                        d = [c, 0, a, 0, 0, u, l, 0, 0, 0, 10001 / 9999, 2e4 / 9999, 0, 0, -1, 0],
                        h = [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                        p = this.context.getAttribLocation(this.program, "vertexPosition");
                    this.context.vertexAttribPointer(p, 3, this.context.FLOAT, !1, 0, 0);
                    var f = this.context.getUniformLocation(this.program, "modelViewMatrix"),
                        m = this.context.getUniformLocation(this.program, "perspectiveMatrix");
                    this.context.uniformMatrix4fv(f, !1, new Float32Array(d)), this.context.uniformMatrix4fv(m, !1, new Float32Array(h))
                }
            }, {
                key: "_initSettings",
                value: function(e) {
                    this.width = 1 * e.width || this.width, this.height = 1 * e.height || this.height, this.maxWidth = e.maxWidth, this.maxHeight = e.maxHeight, this.minWidth = e.minWidth, this.minHeight = e.minHeight, this.maxWidth && (/%$/.test(this.maxWidth) ? this.maxWidth = this.width * this.maxWidth.replace("%", "") / 100 : this.maxWidth *= 1), this.maxHeight && (/%$/.test(this.maxHeight) ? this.maxHeight = this.height * this.maxHeight.replace("%", "") / 100 : this.maxHeight *= 1), this.minWidth && (/%$/.test(this.minWidth) ? this.minWidth = this.width * this.minWidth.replace("%", "") / 100 : this.minWidth *= 1), this.minHeight && (/%$/.test(this.minHeight) ? this.minHeight = this.height * this.minHeight.replace("%", "") / 100 : this.minHeight *= 1), this.alphaFade = .4, this.gravity = 1 * e.gravity || .08, this.particleGap = 1 * e.particleGap || 3, this.layerCount = e.layerCount || 1, this.layerDistance = e.layerDistance || this.particleGap, this.initPosition = e.initPosition || "random", this.initDirection = e.initDirection || "random", this.fadePosition = e.fadePosition || "none", this.fadeDirection = e.fadeDirection || "none", this.noise = isNaN(1 * e.noise) ? 10 : 1 * e.noise, this.disableInteraction = e.disableInteraction, this.mouseForce = 1 * e.mouseForce || 30, this.color = e.color, this.colorArr = e.colorArr || this.colorArr
                }
            }, {
                key: "_initResponsive",
                value: function(e) {
                    var t = this;
                    this.responsiveWidth = this.wrapperElement && e.responsiveWidth, this.responsiveWidth && (this.on("stopped", function() {
                        t.width = t.wrapperElement.clientWidth, t.start()
                    }), this.wrapperElement.addEventListener("resize", function() {
                        t.width !== t.wrapperElement.clientWidth && t.stop()
                    }), this.width = this.wrapperElement.clientWidth)
                }
            }, {
                key: "_calculate",
                value: function() {
                    for (this.vertices = [], i = 0, o = 0; o < this.particles.length; o++) {
                        for (a = this.origins[o], l = this.particles[o], m = a.x - l.x + (Math.random() - .5) * this.noise, g = a.y - l.y + (Math.random() - .5) * this.noise, v = a.z - l.z + (Math.random() - .5) * this.noise / 1e3, y = Math.sqrt(m * m + g * g + v * v), b = .01 * y, l.vx += b * (m / y) * this.speed, l.vy += b * (g / y) * this.speed, l.vz += b * (v / y) * this.speed, u = 0; u < this.touches.length; u++) c = this.touches[u], m = l.x - c.x, g = l.y - c.y, v = l.z - c.z, y = Math.sqrt(m * m + g * g + v * v), b = this.mouseForce * c.force / y, l.vx += b * (m / y) * this.speed, l.vy += b * (g / y) * this.speed, l.vz += b * (v / y) * this.speed;
                        l.vx *= this.gravityFactor, l.vy *= this.gravityFactor, l.vz *= this.gravityFactor, l.x += l.vx, l.y += l.vy, l.z += l.vz, 0 > l.x || l.x >= this.width || 0 > l.y || l.y >= this.height ? (l.isHidden = !0, "stopping" === this.state && (l.isDead = !0)) : ("stopping" !== this.state || l.isDead || i++, l.isHidden = !1), this.vertices.push(l.x, l.y, l.z)
                    }
                    "stopping" === this.state && 0 === i && (this.state = "stopped")
                }
            }, {
                key: "_defaultRenderer",
                value: function() {
                    for (this.depth = Math.max(this.layerDistance * this.layerCount / 2, this.mouseForce), this.minZ = -this.depth, this.maxZ = this.depth, n = this.context.createImageData(this.width, this.height), o = 0; o < this.origins.length; o++) a = this.origins[o], l = this.particles[o], l.isDead || l.isHidden || (h = ~~l.x, p = ~~l.y, D = a.color[3], this.alphaFade > 0 && this.layerCount > 1 && (f = Math.max(Math.min(l.z, this.maxZ), this.minZ) - this.minZ, D = D * (1 - this.alphaFade) + D * this.alphaFade * (f / (this.maxZ - this.minZ)), D = Math.max(Math.min(~~D, 255), 0)), r = 4 * (h + p * this.width), n.data[r + 0] = a.color[0], n.data[r + 1] = a.color[1], n.data[r + 2] = a.color[2], n.data[r + 3] = D);
                    this.context.putImageData(n, 0, 0)
                }
            }, {
                key: "_webglRenderer",
                value: function() {
                    x = new Float32Array(this.vertices), this.context.lineWidth(2.6), this.context.bufferData(this.context.ARRAY_BUFFER, x, this.context.DYNAMIC_DRAW), this.context.clear(this.context.COLOR_BUFFER_BIT | this.context.DEPTH_BUFFER_BIT), this.context.drawArrays(this.context.POINTS, 0, this.particles.length), this.context.flush()
                }
            }, {
                key: "_initParticles",
                value: function() {
                    for (this.particles = void 0, this.particles = [], o = 0; o < this.origins.length; o++) a = this.origins[o], l = {}, this._initParticlePosition(a, l), this._initParticleDirection(l), this.particles.push(l)
                }
            }, {
                key: "_initParticlePosition",
                value: function(e, t) {
                    switch (t.z = 0, this.initPosition) {
                        case "random":
                            t.x = Math.random() * this.width, t.y = Math.random() * this.height;
                            break;
                        case "top":
                            t.x = Math.random() * this.width * 3 - this.width, t.y = -Math.random() * this.height;
                            break;
                        case "left":
                            t.x = -Math.random() * this.width, t.y = Math.random() * this.height * 3 - this.height;
                            break;
                        case "bottom":
                            t.x = Math.random() * this.width * 3 - this.width, t.y = this.height + Math.random() * this.height;
                            break;
                        case "right":
                            t.x = this.width + Math.random() * this.width, t.y = Math.random() * this.height * 3 - this.height;
                            break;
                        case "misplaced":
                            t.x = e.x + Math.random() * this.width * .3 - .1 * this.width, t.y = e.y + Math.random() * this.height * .3 - .1 * this.height;
                            break;
                        default:
                            t.x = e.x, t.y = e.y
                    }
                }
            }, {
                key: "_fade",
                value: function() {
                    for ("explode" === this.fadePosition || "top" === this.fadePosition || "left" === this.fadePosition || "bottom" === this.fadePosition || "right" === this.fadePosition ? this.state = "stopping" : this.state = "stopped", o = 0; o < this.origins.length; o++) a = origins[o], this._fadeOriginPosition(this.origins[o]), this._fadeOriginDirection(this.particles[o])
                }
            }, {
                key: "_fadeOriginPosition",
                value: function(e) {
                    switch (this.fadePosition) {
                        case "random":
                            e.x = Math.random() * this.width * 2 - this.width, e.y = Math.random() * this.height * 2 - this.height, e.x > 0 && (e.x += this.width), e.y > 0 && (e.y += this.height);
                            break;
                        case "top":
                            e.x = Math.random() * this.width * 3 - this.width, e.y = -Math.random() * this.height;
                            break;
                        case "left":
                            e.x = -Math.random() * this.width, e.y = Math.random() * this.height * 3 - this.height;
                            break;
                        case "bottom":
                            e.x = Math.random() * this.width * 3 - this.width, e.y = this.height + Math.random() * this.height;
                            break;
                        case "right":
                            e.x = this.width + Math.random() * this.width, e.y = Math.random() * this.height * 3 - this.height
                    }
                }
            }, {
                key: "_initParticleDirection",
                value: function(e) {
                    switch (e.vz = 0, this.initDirection) {
                        case "random":
                            w = Math.random() * Math.PI * 2, _ = Math.random(), e.vx = this.width * _ * Math.sin(w) * .1, e.vy = this.height * _ * Math.cos(w) * .1;
                            break;
                        case "top":
                            w = Math.random() * Math.PI - Math.PI / 2, _ = Math.random(), e.vx = this.width * _ * Math.sin(w) * .1, e.vy = this.height * _ * Math.cos(w) * .1;
                            break;
                        case "left":
                            w = Math.random() * Math.PI + Math.PI, _ = Math.random(), e.vx = this.width * _ * Math.sin(w) * .1, e.vy = this.height * _ * Math.cos(w) * .1;
                            break;
                        case "bottom":
                            w = Math.random() * Math.PI + Math.PI / 2, _ = Math.random(), e.vx = this.width * _ * Math.sin(w) * .1, e.vy = this.height * _ * Math.cos(w) * .1;
                            break;
                        case "right":
                            w = Math.random() * Math.PI, _ = Math.random(), e.vx = this.width * _ * Math.sin(w) * .1, e.vy = this.height * _ * Math.cos(w) * .1;
                            break;
                        default:
                            e.vx = 0, e.vy = 0
                    }
                }
            }, {
                key: "_fadeOriginDirection",
                value: function(e) {
                    switch (this.fadeDirection) {
                        case "random":
                            w = Math.random() * Math.PI * 2, _ = Math.random(), e.vx += this.width * _ * Math.sin(w) * .1, e.vy += this.height * _ * Math.cos(w) * .1;
                            break;
                        case "top":
                            w = Math.random() * Math.PI - Math.PI / 2, _ = Math.random(), e.vx += this.width * _ * Math.sin(w) * .1, e.vy += this.height * _ * Math.cos(w) * .1;
                            break;
                        case "left":
                            w = Math.random() * Math.PI + Math.PI, _ = Math.random(), e.vx += this.width * _ * Math.sin(w) * .1, e.vy += this.height * _ * Math.cos(w) * .1;
                            break;
                        case "bottom":
                            w = Math.random() * Math.PI + Math.PI / 2, _ = Math.random(), e.vx += this.width * _ * Math.sin(w) * .1, e.vy += this.height * _ * Math.cos(w) * .1;
                            break;
                        case "right":
                            w = Math.random() * Math.PI, _ = Math.random(), e.vx += this.width * _ * Math.sin(w) * .1, e.vy += this.height * _ * Math.cos(w) * .1;
                            break;
                        default:
                            e.vx = 0, e.vy = 0
                    }
                }
            }, {
                key: "_initOrigins",
                value: function() {
                    for (T = document.createElement("canvas"), this.responsiveWidth && (this.width = this.wrapperElement.clientWidth), this.ratio = Math.min(this.width, this.maxWidth || Number.POSITIVE_INFINITY) / Math.min(this.height, this.maxHeight || Number.POSITIVE_INFINITY), this.ratio < this.imageRatio ? (this.renderWidth = ~~Math.min(this.width || Number.POSITIVE_INFINITY, this.minWidth || this.imageWidth || Number.POSITIVE_INFINITY, this.maxWidth || Number.POSITIVE_INFINITY), this.renderHeight = ~~(this.renderWidth / this.imageRatio)) : (this.renderHeight = ~~Math.min(this.height || Number.POSITIVE_INFINITY, this.minHeight || this.imageHeight || Number.POSITIVE_INFINITY, this.maxHeight || Number.POSITIVE_INFINITY), this.renderWidth = ~~(this.renderHeight * this.imageRatio)), this.offsetX = ~~((this.width - this.renderWidth) / 2), this.offsetY = ~~((this.height - this.renderHeight) / 2), T.width = this.renderWidth, T.height = this.renderHeight, S = T.getContext("2d"), S.drawImage(this.image, 0, 0, this.renderWidth, this.renderHeight), C = S.getImageData(0, 0, this.renderWidth, this.renderHeight).data, this.origins = void 0, this.origins = [], h = 0; h < this.renderWidth; h += this.particleGap)
                        for (p = 0; p < this.renderHeight; p += this.particleGap)
                            if (o = 4 * (h + p * this.renderWidth), (D = C[o + 3]) > 0)
                                if (this.colorArr)
                                    for (s = 0; s < this.layerCount; s++) this.origins.push({
                                        x: this.offsetX + h,
                                        y: this.offsetY + p,
                                        z: s * this.layerDistance - this.layerCount * this.layerDistance / 2,
                                        color: this.colorArr
                                    });
                                else
                                    for (k = C[o], E = C[o + 1], A = C[o + 2], s = 0; s < this.layerCount; s++) this.origins.push({
                                        x: this.offsetX + h,
                                        y: this.offsetY + p,
                                        z: s * this.layerDistance - this.layerCount * this.layerDistance / 2,
                                        color: [k, E, A, D]
                                    });
                    this.speed = Math.log(this.origins.length) / 10, this.gravityFactor = 1 - this.gravity * this.speed
                }
            }, {
                key: "_parseColor",
                value: function(e) {
                    var t = void 0;
                    if ("string" == typeof e) {
                        var n = e.replace(" ", "");
                        if (t = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})/.exec(n)) t = [parseInt(t[1], 16), parseInt(t[2], 16), parseInt(t[3], 16)];
                        else if (t = /^#([\da-fA-F])([\da-fA-F])([\da-fA-F])/.exec(n)) t = [17 * parseInt(t[1], 16), 17 * parseInt(t[2], 16), 17 * parseInt(t[3], 16)];
                        else if (t = /^rgba\(([\d]+),([\d]+),([\d]+),([\d]+|[\d]*.[\d]+)\)/.exec(n)) t = [+t[1], +t[2], +t[3], +t[4]];
                        else {
                            if (!(t = /^rgb\(([\d]+),([\d]+),([\d]+)\)/.exec(n))) return;
                            t = [+t[1], +t[2], +t[3]]
                        }
                        return t
                    }
                }
            }, {
                key: "renderer",
                get: function() {
                    return this._renderer
                },
                set: function(e) {
                    this._renderer = e, this._draw = this["_" + e + "Renderer"];
                    try {
                        this["_" + e + "InitContext"]()
                    } catch (t) {
                        console.log(t), "default" !== e && (this.renderer = "default")
                    }
                }
            }, {
                key: "color",
                set: function(e) {
                    this.colorArr = this._parseColor(e), this.colorArr && (isNaN(this.colorArr[3]) && (this.colorArr[3] = 255), 0 < this.colorArr[3] && this.colorArr[3] <= 1 && (this.colorArr[3] *= 255))
                }
            }, {
                key: "_mouseHandler",
                get: function() {
                    var e = this;
                    return function(t) {
                        e.touches = [{
                            x: t.offsetX,
                            y: t.offsetY,
                            z: 0,
                            force: 1
                        }]
                    }
                }
            }, {
                key: "_touchHandler",
                get: function() {
                    var e = this;
                    return function(t) {
                        for (e.touches = [], d = e.canvas.getBoundingClientRect(), u = 0; u < t.changedTouches.length; u++) c = t.changedTouches[u], c.target === e.canvas && (e.touches.push({
                            x: c.pageX - d.left,
                            y: c.pageY - d.top,
                            z: 0,
                            force: c.force || 1
                        }), t.preventDefault())
                    }
                }
            }, {
                key: "_clearTouches",
                get: function() {
                    var e = this;
                    return function(t) {
                        e.touches = []
                    }
                }
            }]), e
        }();
    e.NextParticle = O;
    for (var I = document.getElementsByClassName("next-particle"), $ = 0; $ < I.length; $++) {
        var L = I[$];
        L.nextParticle = new O(L)
    }
}(window),
    function(e) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).Parallax = e()
    }(function() {
        return function e(t, n, i) {
            function o(s, a) {
                if (!n[s]) {
                    if (!t[s]) {
                        var l = "function" == typeof require && require;
                        if (!a && l) return l(s, !0);
                        if (r) return r(s, !0);
                        var c = new Error("Cannot find module '" + s + "'");
                        throw c.code = "MODULE_NOT_FOUND", c
                    }
                    var u = n[s] = {
                        exports: {}
                    };
                    t[s][0].call(u.exports, function(e) {
                        return o(t[s][1][e] || e)
                    }, u, u.exports, e, t, n, i)
                }
                return n[s].exports
            }
            for (var r = "function" == typeof require && require, s = 0; s < i.length; s++) o(i[s]);
            return o
        }({
            1: [function(e, t, n) {
                "use strict";

                function i(e) {
                    if (null === e || void 0 === e) throw new TypeError("Object.assign cannot be called with null or undefined");
                    return Object(e)
                }
                var o = Object.getOwnPropertySymbols,
                    r = Object.prototype.hasOwnProperty,
                    s = Object.prototype.propertyIsEnumerable;
                t.exports = function() {
                    try {
                        if (!Object.assign) return !1;
                        var e = new String("abc");
                        if (e[5] = "de", "5" === Object.getOwnPropertyNames(e)[0]) return !1;
                        for (var t = {}, n = 0; n < 10; n++) t["_" + String.fromCharCode(n)] = n;
                        if ("0123456789" !== Object.getOwnPropertyNames(t).map(function(e) {
                                return t[e]
                            }).join("")) return !1;
                        var i = {};
                        return "abcdefghijklmnopqrst".split("").forEach(function(e) {
                            i[e] = e
                        }), "abcdefghijklmnopqrst" === Object.keys(Object.assign({}, i)).join("")
                    } catch (e) {
                        return !1
                    }
                }() ? Object.assign : function(e, t) {
                    for (var n, a, l = i(e), c = 1; c < arguments.length; c++) {
                        n = Object(arguments[c]);
                        for (var u in n) r.call(n, u) && (l[u] = n[u]);
                        if (o) {
                            a = o(n);
                            for (var d = 0; d < a.length; d++) s.call(n, a[d]) && (l[a[d]] = n[a[d]])
                        }
                    }
                    return l
                }
            }, {}],
            2: [function(e, t, n) {
                (function(e) {
                    (function() {
                        var n, i, o, r, s, a;
                        "undefined" != typeof performance && null !== performance && performance.now ? t.exports = function() {
                            return performance.now()
                        } : void 0 !== e && null !== e && e.hrtime ? (t.exports = function() {
                            return (n() - s) / 1e6
                        }, i = e.hrtime, r = (n = function() {
                            var e;
                            return 1e9 * (e = i())[0] + e[1]
                        })(), a = 1e9 * e.uptime(), s = r - a) : Date.now ? (t.exports = function() {
                            return Date.now() - o
                        }, o = Date.now()) : (t.exports = function() {
                            return (new Date).getTime() - o
                        }, o = (new Date).getTime())
                    }).call(this)
                }).call(this, e("_process"))
            }, {
                _process: 3
            }],
            3: [function(e, t, n) {
                function i() {
                    throw new Error("setTimeout has not been defined")
                }

                function o() {
                    throw new Error("clearTimeout has not been defined")
                }

                function r(e) {
                    if (d === setTimeout) return setTimeout(e, 0);
                    if ((d === i || !d) && setTimeout) return d = setTimeout, setTimeout(e, 0);
                    try {
                        return d(e, 0)
                    } catch (t) {
                        try {
                            return d.call(null, e, 0)
                        } catch (t) {
                            return d.call(this, e, 0)
                        }
                    }
                }

                function s(e) {
                    if (h === clearTimeout) return clearTimeout(e);
                    if ((h === o || !h) && clearTimeout) return h = clearTimeout, clearTimeout(e);
                    try {
                        return h(e)
                    } catch (t) {
                        try {
                            return h.call(null, e)
                        } catch (t) {
                            return h.call(this, e)
                        }
                    }
                }

                function a() {
                    g && f && (g = !1, f.length ? m = f.concat(m) : v = -1, m.length && l())
                }

                function l() {
                    if (!g) {
                        var e = r(a);
                        g = !0;
                        for (var t = m.length; t;) {
                            for (f = m, m = []; ++v < t;) f && f[v].run();
                            v = -1, t = m.length
                        }
                        f = null, g = !1, s(e)
                    }
                }

                function c(e, t) {
                    this.fun = e, this.array = t
                }

                function u() {}
                var d, h, p = t.exports = {};
                ! function() {
                    try {
                        d = "function" == typeof setTimeout ? setTimeout : i
                    } catch (e) {
                        d = i
                    }
                    try {
                        h = "function" == typeof clearTimeout ? clearTimeout : o
                    } catch (e) {
                        h = o
                    }
                }();
                var f, m = [],
                    g = !1,
                    v = -1;
                p.nextTick = function(e) {
                    var t = new Array(arguments.length - 1);
                    if (arguments.length > 1)
                        for (var n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
                    m.push(new c(e, t)), 1 !== m.length || g || r(l)
                }, c.prototype.run = function() {
                    this.fun.apply(null, this.array)
                }, p.title = "browser", p.browser = !0, p.env = {}, p.argv = [], p.version = "", p.versions = {}, p.on = u, p.addListener = u, p.once = u, p.off = u, p.removeListener = u, p.removeAllListeners = u, p.emit = u, p.prependListener = u, p.prependOnceListener = u, p.listeners = function(e) {
                    return []
                }, p.binding = function(e) {
                    throw new Error("process.binding is not supported")
                }, p.cwd = function() {
                    return "/"
                }, p.chdir = function(e) {
                    throw new Error("process.chdir is not supported")
                }, p.umask = function() {
                    return 0
                }
            }, {}],
            4: [function(e, t, n) {
                (function(n) {
                    for (var i = e("performance-now"), o = "undefined" == typeof window ? n : window, r = ["moz", "webkit"], s = "AnimationFrame", a = o["request" + s], l = o["cancel" + s] || o["cancelRequest" + s], c = 0; !a && c < r.length; c++) a = o[r[c] + "Request" + s], l = o[r[c] + "Cancel" + s] || o[r[c] + "CancelRequest" + s];
                    if (!a || !l) {
                        var u = 0,
                            d = 0,
                            h = [];
                        a = function(e) {
                            if (0 === h.length) {
                                var t = i(),
                                    n = Math.max(0, 1e3 / 60 - (t - u));
                                u = n + t, setTimeout(function() {
                                    var e = h.slice(0);
                                    h.length = 0;
                                    for (var t = 0; t < e.length; t++)
                                        if (!e[t].cancelled) try {
                                            e[t].callback(u)
                                        } catch (e) {
                                            setTimeout(function() {
                                                throw e
                                            }, 0)
                                        }
                                }, Math.round(n))
                            }
                            return h.push({
                                handle: ++d,
                                callback: e,
                                cancelled: !1
                            }), d
                        }, l = function(e) {
                            for (var t = 0; t < h.length; t++) h[t].handle === e && (h[t].cancelled = !0)
                        }
                    }
                    t.exports = function(e) {
                        return a.call(o, e)
                    }, t.exports.cancel = function() {
                        l.apply(o, arguments)
                    }, t.exports.polyfill = function() {
                        o.requestAnimationFrame = a, o.cancelAnimationFrame = l
                    }
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
            }, {
                "performance-now": 2
            }],
            5: [function(e, t, n) {
                "use strict";

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }
                var o = function() {
                        function e(e, t) {
                            for (var n = 0; n < t.length; n++) {
                                var i = t[n];
                                i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                            }
                        }
                        return function(t, n, i) {
                            return n && e(t.prototype, n), i && e(t, i), t
                        }
                    }(),
                    r = e("raf"),
                    s = e("object-assign"),
                    a = {
                        propertyCache: {},
                        vendors: [null, ["-webkit-", "webkit"],
                            ["-moz-", "Moz"],
                            ["-o-", "O"],
                            ["-ms-", "ms"]
                        ],
                        clamp: function(e, t, n) {
                            return t < n ? e < t ? t : e > n ? n : e : e < n ? n : e > t ? t : e
                        },
                        data: function(e, t) {
                            return a.deserialize(e.getAttribute("data-" + t))
                        },
                        deserialize: function(e) {
                            return "true" === e || "false" !== e && ("null" === e ? null : !isNaN(parseFloat(e)) && isFinite(e) ? parseFloat(e) : e)
                        },
                        camelCase: function(e) {
                            return e.replace(/-+(.)?/g, function(e, t) {
                                return t ? t.toUpperCase() : ""
                            })
                        },
                        accelerate: function(e) {
                            a.css(e, "transform", "translate3d(0,0,0) rotate(0.0001deg)"), a.css(e, "transform-style", "preserve-3d"), a.css(e, "backface-visibility", "hidden")
                        },
                        transformSupport: function(e) {
                            for (var t = document.createElement("div"), n = !1, i = null, o = !1, r = null, s = null, l = 0, c = a.vendors.length; l < c; l++)
                                if (null !== a.vendors[l] ? (r = a.vendors[l][0] + "transform", s = a.vendors[l][1] + "Transform") : (r = "transform", s = "transform"), void 0 !== t.style[s]) {
                                    n = !0;
                                    break
                                }
                            switch (e) {
                                case "2D":
                                    o = n;
                                    break;
                                case "3D":
                                    if (n) {
                                        var u = document.body || document.createElement("body"),
                                            d = document.documentElement,
                                            h = d.style.overflow,
                                            p = !1;
                                        document.body || (p = !0, d.style.overflow = "hidden", d.appendChild(u), u.style.overflow = "hidden", u.style.background = ""), u.appendChild(t), t.style[s] = "translate3d(1px,1px,1px)", o = void 0 !== (i = window.getComputedStyle(t).getPropertyValue(r)) && i.length > 0 && "none" !== i, d.style.overflow = h, u.removeChild(t), p && (u.removeAttribute("style"), u.parentNode.removeChild(u))
                                    }
                            }
                            return o
                        },
                        css: function(e, t, n) {
                            var i = a.propertyCache[t];
                            if (!i)
                                for (var o = 0, r = a.vendors.length; o < r; o++)
                                    if (i = null !== a.vendors[o] ? a.camelCase(a.vendors[o][1] + "-" + t) : t, void 0 !== e.style[i]) {
                                        a.propertyCache[t] = i;
                                        break
                                    }
                            e.style[i] = n
                        }
                    },
                    l = {
                        relativeInput: !1,
                        clipRelativeInput: !1,
                        inputElement: null,
                        hoverOnly: !1,
                        calibrationThreshold: 100,
                        calibrationDelay: 500,
                        supportDelay: 500,
                        calibrateX: !1,
                        calibrateY: !0,
                        invertX: !0,
                        invertY: !0,
                        limitX: !1,
                        limitY: !1,
                        scalarX: 10,
                        scalarY: 10,
                        frictionX: .1,
                        frictionY: .1,
                        originX: .5,
                        originY: .5,
                        pointerEvents: !1,
                        precision: 1,
                        onReady: null,
                        selector: null
                    },
                    c = function() {
                        function e(t, n) {
                            i(this, e), this.element = t;
                            var o = {
                                calibrateX: a.data(this.element, "calibrate-x"),
                                calibrateY: a.data(this.element, "calibrate-y"),
                                invertX: a.data(this.element, "invert-x"),
                                invertY: a.data(this.element, "invert-y"),
                                limitX: a.data(this.element, "limit-x"),
                                limitY: a.data(this.element, "limit-y"),
                                scalarX: a.data(this.element, "scalar-x"),
                                scalarY: a.data(this.element, "scalar-y"),
                                frictionX: a.data(this.element, "friction-x"),
                                frictionY: a.data(this.element, "friction-y"),
                                originX: a.data(this.element, "origin-x"),
                                originY: a.data(this.element, "origin-y"),
                                pointerEvents: a.data(this.element, "pointer-events"),
                                precision: a.data(this.element, "precision"),
                                relativeInput: a.data(this.element, "relative-input"),
                                clipRelativeInput: a.data(this.element, "clip-relative-input"),
                                hoverOnly: a.data(this.element, "hover-only"),
                                inputElement: document.querySelector(a.data(this.element, "input-element")),
                                selector: a.data(this.element, "selector")
                            };
                            for (var r in o) null === o[r] && delete o[r];
                            s(this, l, o, n), this.inputElement || (this.inputElement = this.element), this.calibrationTimer = null, this.calibrationFlag = !0, this.enabled = !1, this.depthsX = [], this.depthsY = [], this.raf = null, this.bounds = null, this.elementPositionX = 0, this.elementPositionY = 0, this.elementWidth = 0, this.elementHeight = 0, this.elementCenterX = 0, this.elementCenterY = 0, this.elementRangeX = 0, this.elementRangeY = 0, this.calibrationX = 0, this.calibrationY = 0, this.inputX = 0, this.inputY = 0, this.motionX = 0, this.motionY = 0, this.velocityX = 0, this.velocityY = 0, this.onMouseMove = this.onMouseMove.bind(this), this.onDeviceOrientation = this.onDeviceOrientation.bind(this), this.onDeviceMotion = this.onDeviceMotion.bind(this), this.onOrientationTimer = this.onOrientationTimer.bind(this), this.onMotionTimer = this.onMotionTimer.bind(this), this.onCalibrationTimer = this.onCalibrationTimer.bind(this), this.onAnimationFrame = this.onAnimationFrame.bind(this), this.onWindowResize = this.onWindowResize.bind(this), this.windowWidth = null, this.windowHeight = null, this.windowCenterX = null, this.windowCenterY = null, this.windowRadiusX = null, this.windowRadiusY = null, this.portrait = !1, this.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i), this.motionSupport = !!window.DeviceMotionEvent && !this.desktop, this.orientationSupport = !!window.DeviceOrientationEvent && !this.desktop, this.orientationStatus = 0, this.motionStatus = 0, this.initialise()
                        }
                        return o(e, [{
                            key: "initialise",
                            value: function() {
                                void 0 === this.transform2DSupport && (this.transform2DSupport = a.transformSupport("2D"), this.transform3DSupport = a.transformSupport("3D")), this.transform3DSupport && a.accelerate(this.element), "static" === window.getComputedStyle(this.element).getPropertyValue("position") && (this.element.style.position = "relative"), this.pointerEvents || (this.element.style.pointerEvents = "none"), this.updateLayers(), this.updateDimensions(), this.enable(), this.queueCalibration(this.calibrationDelay)
                            }
                        }, {
                            key: "doReadyCallback",
                            value: function() {
                                this.onReady && this.onReady()
                            }
                        }, {
                            key: "updateLayers",
                            value: function() {
                                this.selector ? this.layers = this.element.querySelectorAll(this.selector) : this.layers = this.element.children, this.layers.length || console.warn("ParallaxJS: Your scene does not have any layers."), this.depthsX = [], this.depthsY = [];
                                for (var e = 0; e < this.layers.length; e++) {
                                    var t = this.layers[e];
                                    this.transform3DSupport && a.accelerate(t), t.style.position = e ? "absolute" : "relative", t.style.display = "block", t.style.left = 0, t.style.top = 0;
                                    var n = a.data(t, "depth") || 0;
                                    this.depthsX.push(a.data(t, "depth-x") || n), this.depthsY.push(a.data(t, "depth-y") || n)
                                }
                            }
                        }, {
                            key: "updateDimensions",
                            value: function() {
                                this.windowWidth = window.innerWidth, this.windowHeight = window.innerHeight, this.windowCenterX = this.windowWidth * this.originX, this.windowCenterY = this.windowHeight * this.originY, this.windowRadiusX = Math.max(this.windowCenterX, this.windowWidth - this.windowCenterX), this.windowRadiusY = Math.max(this.windowCenterY, this.windowHeight - this.windowCenterY)
                            }
                        }, {
                            key: "updateBounds",
                            value: function() {
                                this.bounds = this.inputElement.getBoundingClientRect(), this.elementPositionX = this.bounds.left, this.elementPositionY = this.bounds.top, this.elementWidth = this.bounds.width, this.elementHeight = this.bounds.height, this.elementCenterX = this.elementWidth * this.originX, this.elementCenterY = this.elementHeight * this.originY, this.elementRangeX = Math.max(this.elementCenterX, this.elementWidth - this.elementCenterX), this.elementRangeY = Math.max(this.elementCenterY, this.elementHeight - this.elementCenterY)
                            }
                        }, {
                            key: "queueCalibration",
                            value: function(e) {
                                clearTimeout(this.calibrationTimer), this.calibrationTimer = setTimeout(this.onCalibrationTimer, e)
                            }
                        }, {
                            key: "enable",
                            value: function() {
                                this.enabled || (this.enabled = !0, this.orientationSupport ? (this.portrait = !1, window.addEventListener("deviceorientation", this.onDeviceOrientation), this.detectionTimer = setTimeout(this.onOrientationTimer, this.supportDelay)) : this.motionSupport ? (this.portrait = !1, window.addEventListener("devicemotion", this.onDeviceMotion), this.detectionTimer = setTimeout(this.onMotionTimer, this.supportDelay)) : (this.calibrationX = 0, this.calibrationY = 0, this.portrait = !1, window.addEventListener("mousemove", this.onMouseMove), this.doReadyCallback()), window.addEventListener("resize", this.onWindowResize), this.raf = r(this.onAnimationFrame))
                            }
                        }, {
                            key: "disable",
                            value: function() {
                                this.enabled && (this.enabled = !1, this.orientationSupport ? window.removeEventListener("deviceorientation", this.onDeviceOrientation) : this.motionSupport ? window.removeEventListener("devicemotion", this.onDeviceMotion) : window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("resize", this.onWindowResize), r.cancel(this.raf))
                            }
                        }, {
                            key: "calibrate",
                            value: function(e, t) {
                                this.calibrateX = void 0 === e ? this.calibrateX : e, this.calibrateY = void 0 === t ? this.calibrateY : t
                            }
                        }, {
                            key: "invert",
                            value: function(e, t) {
                                this.invertX = void 0 === e ? this.invertX : e, this.invertY = void 0 === t ? this.invertY : t
                            }
                        }, {
                            key: "friction",
                            value: function(e, t) {
                                this.frictionX = void 0 === e ? this.frictionX : e, this.frictionY = void 0 === t ? this.frictionY : t
                            }
                        }, {
                            key: "scalar",
                            value: function(e, t) {
                                this.scalarX = void 0 === e ? this.scalarX : e, this.scalarY = void 0 === t ? this.scalarY : t
                            }
                        }, {
                            key: "limit",
                            value: function(e, t) {
                                this.limitX = void 0 === e ? this.limitX : e, this.limitY = void 0 === t ? this.limitY : t
                            }
                        }, {
                            key: "origin",
                            value: function(e, t) {
                                this.originX = void 0 === e ? this.originX : e, this.originY = void 0 === t ? this.originY : t
                            }
                        }, {
                            key: "setInputElement",
                            value: function(e) {
                                this.inputElement = e, this.updateDimensions()
                            }
                        }, {
                            key: "setPosition",
                            value: function(e, t, n) {
                                t = t.toFixed(this.precision) + "px", n = n.toFixed(this.precision) + "px", this.transform3DSupport ? a.css(e, "transform", "translate3d(" + t + "," + n + ",0)") : this.transform2DSupport ? a.css(e, "transform", "translate(" + t + "," + n + ")") : (e.style.left = t, e.style.top = n)
                            }
                        }, {
                            key: "onOrientationTimer",
                            value: function() {
                                this.orientationSupport && 0 === this.orientationStatus ? (this.disable(), this.orientationSupport = !1, this.enable()) : this.doReadyCallback()
                            }
                        }, {
                            key: "onMotionTimer",
                            value: function() {
                                this.motionSupport && 0 === this.motionStatus ? (this.disable(), this.motionSupport = !1, this.enable()) : this.doReadyCallback()
                            }
                        }, {
                            key: "onCalibrationTimer",
                            value: function() {
                                this.calibrationFlag = !0
                            }
                        }, {
                            key: "onWindowResize",
                            value: function() {
                                this.updateDimensions()
                            }
                        }, {
                            key: "onAnimationFrame",
                            value: function() {
                                this.updateBounds();
                                var e = this.inputX - this.calibrationX,
                                    t = this.inputY - this.calibrationY;
                                (Math.abs(e) > this.calibrationThreshold || Math.abs(t) > this.calibrationThreshold) && this.queueCalibration(0), this.portrait ? (this.motionX = this.calibrateX ? t : this.inputY, this.motionY = this.calibrateY ? e : this.inputX) : (this.motionX = this.calibrateX ? e : this.inputX, this.motionY = this.calibrateY ? t : this.inputY), this.motionX *= this.elementWidth * (this.scalarX / 100), this.motionY *= this.elementHeight * (this.scalarY / 100), isNaN(parseFloat(this.limitX)) || (this.motionX = a.clamp(this.motionX, -this.limitX, this.limitX)), isNaN(parseFloat(this.limitY)) || (this.motionY = a.clamp(this.motionY, -this.limitY, this.limitY)), this.velocityX += (this.motionX - this.velocityX) * this.frictionX, this.velocityY += (this.motionY - this.velocityY) * this.frictionY;
                                for (var n = 0; n < this.layers.length; n++) {
                                    var i = this.layers[n],
                                        o = this.depthsX[n],
                                        s = this.depthsY[n],
                                        l = this.velocityX * (o * (this.invertX ? -1 : 1)),
                                        c = this.velocityY * (s * (this.invertY ? -1 : 1));
                                    this.setPosition(i, l, c)
                                }
                                this.raf = r(this.onAnimationFrame)
                            }
                        }, {
                            key: "rotate",
                            value: function(e, t) {
                                var n = (e || 0) / 30,
                                    i = (t || 0) / 30,
                                    o = this.windowHeight > this.windowWidth;
                                this.portrait !== o && (this.portrait = o, this.calibrationFlag = !0), this.calibrationFlag && (this.calibrationFlag = !1, this.calibrationX = n, this.calibrationY = i), this.inputX = n, this.inputY = i
                            }
                        }, {
                            key: "onDeviceOrientation",
                            value: function(e) {
                                var t = e.beta,
                                    n = e.gamma;
                                null !== t && null !== n && (this.orientationStatus = 1, this.rotate(t, n))
                            }
                        }, {
                            key: "onDeviceMotion",
                            value: function(e) {
                                var t = e.rotationRate.beta,
                                    n = e.rotationRate.gamma;
                                null !== t && null !== n && (this.motionStatus = 1, this.rotate(t, n))
                            }
                        }, {
                            key: "onMouseMove",
                            value: function(e) {
                                var t = e.clientX,
                                    n = e.clientY;
                                if (this.hoverOnly && (t < this.elementPositionX || t > this.elementPositionX + this.elementWidth || n < this.elementPositionY || n > this.elementPositionY + this.elementHeight)) return this.inputX = 0, void(this.inputY = 0);
                                this.relativeInput ? (this.clipRelativeInput && (t = Math.max(t, this.elementPositionX), t = Math.min(t, this.elementPositionX + this.elementWidth), n = Math.max(n, this.elementPositionY), n = Math.min(n, this.elementPositionY + this.elementHeight)), this.elementRangeX && this.elementRangeY && (this.inputX = (t - this.elementPositionX - this.elementCenterX) / this.elementRangeX, this.inputY = (n - this.elementPositionY - this.elementCenterY) / this.elementRangeY)) : this.windowRadiusX && this.windowRadiusY && (this.inputX = (t - this.windowCenterX) / this.windowRadiusX, this.inputY = (n - this.windowCenterY) / this.windowRadiusY)
                            }
                        }, {
                            key: "destroy",
                            value: function() {
                                this.disable(), clearTimeout(this.calibrationTimer), clearTimeout(this.detectionTimer), this.element.removeAttribute("style");
                                for (var e = 0; e < this.layers.length; e++) this.layers[e].removeAttribute("style");
                                delete this.element, delete this.layers
                            }
                        }, {
                            key: "version",
                            value: function() {
                                return "3.1.0"
                            }
                        }]), e
                    }();
                t.exports = c
            }, {
                "object-assign": 1,
                raf: 4
            }]
        }, {}, [5])(5)
    }),
    function(e) {
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? module.exports = function(t, n) {
            return void 0 === n && (n = "undefined" != typeof window ? require("jquery") : require("jquery")(t)), e(n), n
        } : e(jQuery)
    }(function(e) {
        var t = function() {
                if (e && e.fn && e.fn.select2 && e.fn.select2.amd) var t = e.fn.select2.amd;
                var t;
                return function() {
                    if (!t || !t.requirejs) {
                        t ? n = t : t = {};
                        var e, n, i;
                        ! function(t) {
                            function o(e, t) {
                                return _.call(e, t)
                            }

                            function r(e, t) {
                                var n, i, o, r, s, a, l, c, u, d, h, p, f = t && t.split("/"),
                                    m = b.map,
                                    g = m && m["*"] || {};
                                if (e) {
                                    for (e = e.split("/"), s = e.length - 1, b.nodeIdCompat && T.test(e[s]) && (e[s] = e[s].replace(T, "")), "." === e[0].charAt(0) && f && (p = f.slice(0, f.length - 1), e = p.concat(e)), u = 0; u < e.length; u++)
                                        if ("." === (h = e[u])) e.splice(u, 1), u -= 1;
                                        else if (".." === h) {
                                            if (0 === u || 1 === u && ".." === e[2] || ".." === e[u - 1]) continue;
                                            u > 0 && (e.splice(u - 1, 2), u -= 2)
                                        }
                                    e = e.join("/")
                                }
                                if ((f || g) && m) {
                                    for (n = e.split("/"), u = n.length; u > 0; u -= 1) {
                                        if (i = n.slice(0, u).join("/"), f)
                                            for (d = f.length; d > 0; d -= 1)
                                                if ((o = m[f.slice(0, d).join("/")]) && (o = o[i])) {
                                                    r = o, a = u;
                                                    break
                                                }
                                        if (r) break;
                                        !l && g && g[i] && (l = g[i], c = u)
                                    }!r && l && (r = l, a = c), r && (n.splice(0, a, r), e = n.join("/"))
                                }
                                return e
                            }

                            function s(e, n) {
                                return function() {
                                    var i = x.call(arguments, 0);
                                    return "string" != typeof i[0] && 1 === i.length && i.push(null), f.apply(t, i.concat([e, n]))
                                }
                            }

                            function a(e) {
                                return function(t) {
                                    return r(t, e)
                                }
                            }

                            function l(e) {
                                return function(t) {
                                    v[e] = t
                                }
                            }

                            function c(e) {
                                if (o(y, e)) {
                                    var n = y[e];
                                    delete y[e], w[e] = !0, p.apply(t, n)
                                }
                                if (!o(v, e) && !o(w, e)) throw new Error("No " + e);
                                return v[e]
                            }

                            function u(e) {
                                var t, n = e ? e.indexOf("!") : -1;
                                return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)), [t, e]
                            }

                            function d(e) {
                                return e ? u(e) : []
                            }

                            function h(e) {
                                return function() {
                                    return b && b.config && b.config[e] || {}
                                }
                            }
                            var p, f, m, g, v = {},
                                y = {},
                                b = {},
                                w = {},
                                _ = Object.prototype.hasOwnProperty,
                                x = [].slice,
                                T = /\.js$/;
                            m = function(e, t) {
                                var n, i = u(e),
                                    o = i[0],
                                    s = t[1];
                                return e = i[1], o && (o = r(o, s), n = c(o)), o ? e = n && n.normalize ? n.normalize(e, a(s)) : r(e, s) : (e = r(e, s), i = u(e), o = i[0], e = i[1], o && (n = c(o))), {
                                    f: o ? o + "!" + e : e,
                                    n: e,
                                    pr: o,
                                    p: n
                                }
                            }, g = {
                                require: function(e) {
                                    return s(e)
                                },
                                exports: function(e) {
                                    var t = v[e];
                                    return void 0 !== t ? t : v[e] = {}
                                },
                                module: function(e) {
                                    return {
                                        id: e,
                                        uri: "",
                                        exports: v[e],
                                        config: h(e)
                                    }
                                }
                            }, p = function(e, n, i, r) {
                                var a, u, h, p, f, b, _, x = [],
                                    T = typeof i;
                                if (r = r || e, b = d(r), "undefined" === T || "function" === T) {
                                    for (n = !n.length && i.length ? ["require", "exports", "module"] : n, f = 0; f < n.length; f += 1)
                                        if (p = m(n[f], b), "require" === (u = p.f)) x[f] = g.require(e);
                                        else if ("exports" === u) x[f] = g.exports(e), _ = !0;
                                        else if ("module" === u) a = x[f] = g.module(e);
                                        else if (o(v, u) || o(y, u) || o(w, u)) x[f] = c(u);
                                        else {
                                            if (!p.p) throw new Error(e + " missing " + u);
                                            p.p.load(p.n, s(r, !0), l(u), {}), x[f] = v[u]
                                        }
                                    h = i ? i.apply(v[e], x) : void 0, e && (a && a.exports !== t && a.exports !== v[e] ? v[e] = a.exports : h === t && _ || (v[e] = h))
                                } else e && (v[e] = i)
                            }, e = n = f = function(e, n, i, o, r) {
                                if ("string" == typeof e) return g[e] ? g[e](n) : c(m(e, d(n)).f);
                                if (!e.splice) {
                                    if (b = e, b.deps && f(b.deps, b.callback), !n) return;
                                    n.splice ? (e = n, n = i, i = null) : e = t
                                }
                                return n = n || function() {}, "function" == typeof i && (i = o, o = r), o ? p(t, e, n, i) : setTimeout(function() {
                                    p(t, e, n, i)
                                }, 4), f
                            }, f.config = function(e) {
                                return f(e)
                            }, e._defined = v, i = function(e, t, n) {
                                if ("string" != typeof e) throw new Error("See almond README: incorrect module build, no module name");
                                t.splice || (n = t, t = []), o(v, e) || o(y, e) || (y[e] = [e, t, n])
                            }, i.amd = {
                                jQuery: !0
                            }
                        }(), t.requirejs = e, t.require = n, t.define = i
                    }
                }(), t.define("almond", function() {}), t.define("jquery", [], function() {
                    var t = e || $;
                    return null == t && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), t
                }), t.define("select2/utils", ["jquery"], function(e) {
                    function t(e) {
                        var t = e.prototype,
                            n = [];
                        for (var i in t) "function" == typeof t[i] && "constructor" !== i && n.push(i);
                        return n
                    }
                    var n = {};
                    n.Extend = function(e, t) {
                        function n() {
                            this.constructor = e
                        }
                        var i = {}.hasOwnProperty;
                        for (var o in t) i.call(t, o) && (e[o] = t[o]);
                        return n.prototype = t.prototype, e.prototype = new n, e.__super__ = t.prototype, e
                    }, n.Decorate = function(e, n) {
                        function i() {
                            var t = Array.prototype.unshift,
                                i = n.prototype.constructor.length,
                                o = e.prototype.constructor;
                            i > 0 && (t.call(arguments, e.prototype.constructor), o = n.prototype.constructor), o.apply(this, arguments)
                        }

                        function o() {
                            this.constructor = i
                        }
                        var r = t(n),
                            s = t(e);
                        n.displayName = e.displayName, i.prototype = new o;
                        for (var a = 0; a < s.length; a++) {
                            var l = s[a];
                            i.prototype[l] = e.prototype[l]
                        }
                        for (var c = 0; c < r.length; c++) {
                            var u = r[c];
                            i.prototype[u] = function(e) {
                                var t = function() {};
                                e in i.prototype && (t = i.prototype[e]);
                                var o = n.prototype[e];
                                return function() {
                                    return Array.prototype.unshift.call(arguments, t), o.apply(this, arguments)
                                }
                            }(u)
                        }
                        return i
                    };
                    var i = function() {
                        this.listeners = {}
                    };
                    i.prototype.on = function(e, t) {
                        this.listeners = this.listeners || {}, e in this.listeners ? this.listeners[e].push(t) : this.listeners[e] = [t]
                    }, i.prototype.trigger = function(e) {
                        var t = Array.prototype.slice,
                            n = t.call(arguments, 1);
                        this.listeners = this.listeners || {}, null == n && (n = []), 0 === n.length && n.push({}), n[0]._type = e, e in this.listeners && this.invoke(this.listeners[e], t.call(arguments, 1)), "*" in this.listeners && this.invoke(this.listeners["*"], arguments)
                    }, i.prototype.invoke = function(e, t) {
                        for (var n = 0, i = e.length; n < i; n++) e[n].apply(this, t)
                    }, n.Observable = i, n.generateChars = function(e) {
                        for (var t = "", n = 0; n < e; n++) t += Math.floor(36 * Math.random()).toString(36);
                        return t
                    }, n.bind = function(e, t) {
                        return function() {
                            e.apply(t, arguments)
                        }
                    }, n._convertData = function(e) {
                        for (var t in e) {
                            var n = t.split("-"),
                                i = e;
                            if (1 !== n.length) {
                                for (var o = 0; o < n.length; o++) {
                                    var r = n[o];
                                    r = r.substring(0, 1).toLowerCase() + r.substring(1), r in i || (i[r] = {}), o == n.length - 1 && (i[r] = e[t]), i = i[r]
                                }
                                delete e[t]
                            }
                        }
                        return e
                    }, n.hasScroll = function(t, n) {
                        var i = e(n),
                            o = n.style.overflowX,
                            r = n.style.overflowY;
                        return (o !== r || "hidden" !== r && "visible" !== r) && ("scroll" === o || "scroll" === r || i.innerHeight() < n.scrollHeight || i.innerWidth() < n.scrollWidth)
                    }, n.escapeMarkup = function(e) {
                        var t = {
                            "\\": "&#92;",
                            "&": "&amp;",
                            "<": "&lt;",
                            ">": "&gt;",
                            '"': "&quot;",
                            "'": "&#39;",
                            "/": "&#47;"
                        };
                        return "string" != typeof e ? e : String(e).replace(/[&<>"'\/\\]/g, function(e) {
                            return t[e]
                        })
                    }, n.appendMany = function(t, n) {
                        if ("1.7" === e.fn.jquery.substr(0, 3)) {
                            var i = e();
                            e.map(n, function(e) {
                                i = i.add(e)
                            }), n = i
                        }
                        t.append(n)
                    }, n.__cache = {};
                    var o = 0;
                    return n.GetUniqueElementId = function(e) {
                        var t = e.getAttribute("data-select2-id");
                        return null == t && (e.id ? (t = e.id, e.setAttribute("data-select2-id", t)) : (e.setAttribute("data-select2-id", ++o), t = o.toString())), t
                    }, n.StoreData = function(e, t, i) {
                        var o = n.GetUniqueElementId(e);
                        n.__cache[o] || (n.__cache[o] = {}), n.__cache[o][t] = i
                    }, n.GetData = function(t, i) {
                        var o = n.GetUniqueElementId(t);
                        return i ? n.__cache[o] && null != n.__cache[o][i] ? n.__cache[o][i] : e(t).data(i) : n.__cache[o]
                    }, n.RemoveData = function(e) {
                        var t = n.GetUniqueElementId(e);
                        null != n.__cache[t] && delete n.__cache[t]
                    }, n
                }), t.define("select2/results", ["jquery", "./utils"], function(e, t) {
                    function n(e, t, i) {
                        this.$element = e, this.data = i, this.options = t, n.__super__.constructor.call(this)
                    }
                    return t.Extend(n, t.Observable), n.prototype.render = function() {
                        var t = e('<ul class="select2-results__options" role="tree"></ul>');
                        return this.options.get("multiple") && t.attr("aria-multiselectable", "true"), this.$results = t, t
                    }, n.prototype.clear = function() {
                        this.$results.empty()
                    }, n.prototype.displayMessage = function(t) {
                        var n = this.options.get("escapeMarkup");
                        this.clear(), this.hideLoading();
                        var i = e('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),
                            o = this.options.get("translations").get(t.message);
                        i.append(n(o(t.args))), i[0].className += " select2-results__message", this.$results.append(i)
                    }, n.prototype.hideMessages = function() {
                        this.$results.find(".select2-results__message").remove()
                    }, n.prototype.append = function(e) {
                        this.hideLoading();
                        var t = [];
                        if (null == e.results || 0 === e.results.length) return void(0 === this.$results.children().length && this.trigger("results:message", {
                            message: "noResults"
                        }));
                        e.results = this.sort(e.results);
                        for (var n = 0; n < e.results.length; n++) {
                            var i = e.results[n],
                                o = this.option(i);
                            t.push(o)
                        }
                        this.$results.append(t)
                    }, n.prototype.position = function(e, t) {
                        t.find(".select2-results").append(e)
                    }, n.prototype.sort = function(e) {
                        return this.options.get("sorter")(e)
                    }, n.prototype.highlightFirstItem = function() {
                        var e = this.$results.find(".select2-results__option[aria-selected]"),
                            t = e.filter("[aria-selected=true]");
                        t.length > 0 ? t.first().trigger("mouseenter") : e.first().trigger("mouseenter"), this.ensureHighlightVisible()
                    }, n.prototype.setClasses = function() {
                        var n = this;
                        this.data.current(function(i) {
                            var o = e.map(i, function(e) {
                                return e.id.toString()
                            });
                            n.$results.find(".select2-results__option[aria-selected]").each(function() {
                                var n = e(this),
                                    i = t.GetData(this, "data"),
                                    r = "" + i.id;
                                null != i.element && i.element.selected || null == i.element && e.inArray(r, o) > -1 ? n.attr("aria-selected", "true") : n.attr("aria-selected", "false")
                            })
                        })
                    }, n.prototype.showLoading = function(e) {
                        this.hideLoading();
                        var t = this.options.get("translations").get("searching"),
                            n = {
                                disabled: !0,
                                loading: !0,
                                text: t(e)
                            },
                            i = this.option(n);
                        i.className += " loading-results", this.$results.prepend(i)
                    }, n.prototype.hideLoading = function() {
                        this.$results.find(".loading-results").remove()
                    }, n.prototype.option = function(n) {
                        var i = document.createElement("li");
                        i.className = "select2-results__option";
                        var o = {
                            role: "treeitem",
                            "aria-selected": "false"
                        };
                        n.disabled && (delete o["aria-selected"], o["aria-disabled"] = "true"), null == n.id && delete o["aria-selected"], null != n._resultId && (i.id = n._resultId), n.title && (i.title = n.title), n.children && (o.role = "group", o["aria-label"] = n.text, delete o["aria-selected"]);
                        for (var r in o) {
                            var s = o[r];
                            i.setAttribute(r, s)
                        }
                        if (n.children) {
                            var a = e(i),
                                l = document.createElement("strong");
                            l.className = "select2-results__group", e(l), this.template(n, l);
                            for (var c = [], u = 0; u < n.children.length; u++) {
                                var d = n.children[u],
                                    h = this.option(d);
                                c.push(h)
                            }
                            var p = e("<ul></ul>", {
                                class: "select2-results__options select2-results__options--nested"
                            });
                            p.append(c), a.append(l), a.append(p)
                        } else this.template(n, i);
                        return t.StoreData(i, "data", n), i
                    }, n.prototype.bind = function(n, i) {
                        var o = this,
                            r = n.id + "-results";
                        this.$results.attr("id", r), n.on("results:all", function(e) {
                            o.clear(), o.append(e.data), n.isOpen() && (o.setClasses(), o.highlightFirstItem())
                        }), n.on("results:append", function(e) {
                            o.append(e.data), n.isOpen() && o.setClasses()
                        }), n.on("query", function(e) {
                            o.hideMessages(), o.showLoading(e)
                        }), n.on("select", function() {
                            n.isOpen() && (o.setClasses(), o.highlightFirstItem())
                        }), n.on("unselect", function() {
                            n.isOpen() && (o.setClasses(), o.highlightFirstItem())
                        }), n.on("open", function() {
                            o.$results.attr("aria-expanded", "true"), o.$results.attr("aria-hidden", "false"), o.setClasses(), o.ensureHighlightVisible()
                        }), n.on("close", function() {
                            o.$results.attr("aria-expanded", "false"), o.$results.attr("aria-hidden", "true"), o.$results.removeAttr("aria-activedescendant")
                        }), n.on("results:toggle", function() {
                            var e = o.getHighlightedResults();
                            0 !== e.length && e.trigger("mouseup")
                        }), n.on("results:select", function() {
                            var e = o.getHighlightedResults();
                            if (0 !== e.length) {
                                var n = t.GetData(e[0], "data");
                                "true" == e.attr("aria-selected") ? o.trigger("close", {}) : o.trigger("select", {
                                    data: n
                                })
                            }
                        }), n.on("results:previous", function() {
                            var e = o.getHighlightedResults(),
                                t = o.$results.find("[aria-selected]"),
                                n = t.index(e);
                            if (!(n <= 0)) {
                                var i = n - 1;
                                0 === e.length && (i = 0);
                                var r = t.eq(i);
                                r.trigger("mouseenter");
                                var s = o.$results.offset().top,
                                    a = r.offset().top,
                                    l = o.$results.scrollTop() + (a - s);
                                0 === i ? o.$results.scrollTop(0) : a - s < 0 && o.$results.scrollTop(l)
                            }
                        }), n.on("results:next", function() {
                            var e = o.getHighlightedResults(),
                                t = o.$results.find("[aria-selected]"),
                                n = t.index(e),
                                i = n + 1;
                            if (!(i >= t.length)) {
                                var r = t.eq(i);
                                r.trigger("mouseenter");
                                var s = o.$results.offset().top + o.$results.outerHeight(!1),
                                    a = r.offset().top + r.outerHeight(!1),
                                    l = o.$results.scrollTop() + a - s;
                                0 === i ? o.$results.scrollTop(0) : a > s && o.$results.scrollTop(l)
                            }
                        }), n.on("results:focus", function(e) {
                            e.element.addClass("select2-results__option--highlighted")
                        }), n.on("results:message", function(e) {
                            o.displayMessage(e)
                        }), e.fn.mousewheel && this.$results.on("mousewheel", function(e) {
                            var t = o.$results.scrollTop(),
                                n = o.$results.get(0).scrollHeight - t + e.deltaY,
                                i = e.deltaY > 0 && t - e.deltaY <= 0,
                                r = e.deltaY < 0 && n <= o.$results.height();
                            i ? (o.$results.scrollTop(0), e.preventDefault(), e.stopPropagation()) : r && (o.$results.scrollTop(o.$results.get(0).scrollHeight - o.$results.height()), e.preventDefault(), e.stopPropagation())
                        }), this.$results.on("mouseup", ".select2-results__option[aria-selected]", function(n) {
                            var i = e(this),
                                r = t.GetData(this, "data");
                            if ("true" === i.attr("aria-selected")) return void(o.options.get("multiple") ? o.trigger("unselect", {
                                originalEvent: n,
                                data: r
                            }) : o.trigger("close", {}));
                            o.trigger("select", {
                                originalEvent: n,
                                data: r
                            })
                        }), this.$results.on("mouseenter", ".select2-results__option[aria-selected]", function(n) {
                            var i = t.GetData(this, "data");
                            o.getHighlightedResults().removeClass("select2-results__option--highlighted"), o.trigger("results:focus", {
                                data: i,
                                element: e(this)
                            })
                        })
                    }, n.prototype.getHighlightedResults = function() {
                        return this.$results.find(".select2-results__option--highlighted")
                    }, n.prototype.destroy = function() {
                        this.$results.remove()
                    }, n.prototype.ensureHighlightVisible = function() {
                        var e = this.getHighlightedResults();
                        if (0 !== e.length) {
                            var t = this.$results.find("[aria-selected]"),
                                n = t.index(e),
                                i = this.$results.offset().top,
                                o = e.offset().top,
                                r = this.$results.scrollTop() + (o - i),
                                s = o - i;
                            r -= 2 * e.outerHeight(!1), n <= 2 ? this.$results.scrollTop(0) : (s > this.$results.outerHeight() || s < 0) && this.$results.scrollTop(r)
                        }
                    }, n.prototype.template = function(t, n) {
                        var i = this.options.get("templateResult"),
                            o = this.options.get("escapeMarkup"),
                            r = i(t, n);
                        null == r ? n.style.display = "none" : "string" == typeof r ? n.innerHTML = o(r) : e(n).append(r)
                    }, n
                }), t.define("select2/keys", [], function() {
                    return {
                        BACKSPACE: 8,
                        TAB: 9,
                        ENTER: 13,
                        SHIFT: 16,
                        CTRL: 17,
                        ALT: 18,
                        ESC: 27,
                        SPACE: 32,
                        PAGE_UP: 33,
                        PAGE_DOWN: 34,
                        END: 35,
                        HOME: 36,
                        LEFT: 37,
                        UP: 38,
                        RIGHT: 39,
                        DOWN: 40,
                        DELETE: 46
                    }
                }), t.define("select2/selection/base", ["jquery", "../utils", "../keys"], function(e, t, n) {
                    function i(e, t) {
                        this.$element = e, this.options = t, i.__super__.constructor.call(this)
                    }
                    return t.Extend(i, t.Observable), i.prototype.render = function() {
                        var n = e('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');
                        return this._tabindex = 0, null != t.GetData(this.$element[0], "old-tabindex") ? this._tabindex = t.GetData(this.$element[0], "old-tabindex") : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")), n.attr("title", this.$element.attr("title")), n.attr("tabindex", this._tabindex), this.$selection = n, n
                    }, i.prototype.bind = function(e, t) {
                        var i = this,
                            o = (e.id, e.id + "-results");
                        this.container = e, this.$selection.on("focus", function(e) {
                            i.trigger("focus", e)
                        }), this.$selection.on("blur", function(e) {
                            i._handleBlur(e)
                        }), this.$selection.on("keydown", function(e) {
                            i.trigger("keypress", e), e.which === n.SPACE && e.preventDefault()
                        }), e.on("results:focus", function(e) {
                            i.$selection.attr("aria-activedescendant", e.data._resultId)
                        }), e.on("selection:update", function(e) {
                            i.update(e.data)
                        }), e.on("open", function() {
                            i.$selection.attr("aria-expanded", "true"), i.$selection.attr("aria-owns", o), i._attachCloseHandler(e)
                        }), e.on("close", function() {
                            i.$selection.attr("aria-expanded", "false"), i.$selection.removeAttr("aria-activedescendant"), i.$selection.removeAttr("aria-owns"), i.$selection.focus(), window.setTimeout(function() {
                                i.$selection.focus()
                            }, 0), i._detachCloseHandler(e)
                        }), e.on("enable", function() {
                            i.$selection.attr("tabindex", i._tabindex)
                        }), e.on("disable", function() {
                            i.$selection.attr("tabindex", "-1")
                        })
                    }, i.prototype._handleBlur = function(t) {
                        var n = this;
                        window.setTimeout(function() {
                            document.activeElement == n.$selection[0] || e.contains(n.$selection[0], document.activeElement) || n.trigger("blur", t)
                        }, 1)
                    }, i.prototype._attachCloseHandler = function(n) {
                        e(document.body).on("mousedown.select2." + n.id, function(n) {
                            var i = e(n.target),
                                o = i.closest(".select2");
                            e(".select2.select2-container--open").each(function() {
                                e(this), this != o[0] && t.GetData(this, "element").select2("close")
                            })
                        })
                    }, i.prototype._detachCloseHandler = function(t) {
                        e(document.body).off("mousedown.select2." + t.id)
                    }, i.prototype.position = function(e, t) {
                        t.find(".selection").append(e)
                    }, i.prototype.destroy = function() {
                        this._detachCloseHandler(this.container)
                    }, i.prototype.update = function(e) {
                        throw new Error("The `update` method must be defined in child classes.")
                    }, i
                }), t.define("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], function(e, t, n, i) {
                    function o() {
                        o.__super__.constructor.apply(this, arguments)
                    }
                    return n.Extend(o, t), o.prototype.render = function() {
                        var e = o.__super__.render.call(this);
                        return e.addClass("select2-selection--single"), e.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), e
                    }, o.prototype.bind = function(e, t) {
                        var n = this;
                        o.__super__.bind.apply(this, arguments);
                        var i = e.id + "-container";
                        this.$selection.find(".select2-selection__rendered").attr("id", i).attr("role", "textbox").attr("aria-readonly", "true"), this.$selection.attr("aria-labelledby", i), this.$selection.on("mousedown", function(e) {
                            1 === e.which && n.trigger("toggle", {
                                originalEvent: e
                            })
                        }), this.$selection.on("focus", function(e) {}), this.$selection.on("blur", function(e) {}), e.on("focus", function(t) {
                            e.isOpen() || n.$selection.focus()
                        })
                    }, o.prototype.clear = function() {
                        var e = this.$selection.find(".select2-selection__rendered");
                        e.empty(), e.removeAttr("title")
                    }, o.prototype.display = function(e, t) {
                        var n = this.options.get("templateSelection");
                        return this.options.get("escapeMarkup")(n(e, t))
                    }, o.prototype.selectionContainer = function() {
                        return e("<span></span>")
                    }, o.prototype.update = function(e) {
                        if (0 === e.length) return void this.clear();
                        var t = e[0],
                            n = this.$selection.find(".select2-selection__rendered"),
                            i = this.display(t, n);
                        n.empty().append(i), n.attr("title", t.title || t.text)
                    }, o
                }), t.define("select2/selection/multiple", ["jquery", "./base", "../utils"], function(e, t, n) {
                    function i(e, t) {
                        i.__super__.constructor.apply(this, arguments)
                    }
                    return n.Extend(i, t), i.prototype.render = function() {
                        var e = i.__super__.render.call(this);
                        return e.addClass("select2-selection--multiple"), e.html('<ul class="select2-selection__rendered"></ul>'), e
                    }, i.prototype.bind = function(t, o) {
                        var r = this;
                        i.__super__.bind.apply(this, arguments), this.$selection.on("click", function(e) {
                            r.trigger("toggle", {
                                originalEvent: e
                            })
                        }), this.$selection.on("click", ".select2-selection__choice__remove", function(t) {
                            if (!r.options.get("disabled")) {
                                var i = e(this),
                                    o = i.parent(),
                                    s = n.GetData(o[0], "data");
                                r.trigger("unselect", {
                                    originalEvent: t,
                                    data: s
                                })
                            }
                        })
                    }, i.prototype.clear = function() {
                        var e = this.$selection.find(".select2-selection__rendered");
                        e.empty(), e.removeAttr("title")
                    }, i.prototype.display = function(e, t) {
                        var n = this.options.get("templateSelection");
                        return this.options.get("escapeMarkup")(n(e, t))
                    }, i.prototype.selectionContainer = function() {
                        return e('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>')
                    }, i.prototype.update = function(e) {
                        if (this.clear(), 0 !== e.length) {
                            for (var t = [], i = 0; i < e.length; i++) {
                                var o = e[i],
                                    r = this.selectionContainer(),
                                    s = this.display(o, r);
                                r.append(s), r.attr("title", o.title || o.text), n.StoreData(r[0], "data", o), t.push(r)
                            }
                            var a = this.$selection.find(".select2-selection__rendered");
                            n.appendMany(a, t)
                        }
                    }, i
                }), t.define("select2/selection/placeholder", ["../utils"], function(e) {
                    function t(e, t, n) {
                        this.placeholder = this.normalizePlaceholder(n.get("placeholder")), e.call(this, t, n)
                    }
                    return t.prototype.normalizePlaceholder = function(e, t) {
                        return "string" == typeof t && (t = {
                            id: "",
                            text: t
                        }), t
                    }, t.prototype.createPlaceholder = function(e, t) {
                        var n = this.selectionContainer();
                        return n.html(this.display(t)), n.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), n
                    }, t.prototype.update = function(e, t) {
                        var n = 1 == t.length && t[0].id != this.placeholder.id;
                        if (t.length > 1 || n) return e.call(this, t);
                        this.clear();
                        var i = this.createPlaceholder(this.placeholder);
                        this.$selection.find(".select2-selection__rendered").append(i)
                    }, t
                }), t.define("select2/selection/allowClear", ["jquery", "../keys", "../utils"], function(e, t, n) {
                    function i() {}
                    return i.prototype.bind = function(e, t, n) {
                        var i = this;
                        e.call(this, t, n), null == this.placeholder && this.options.get("debug") && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."), this.$selection.on("mousedown", ".select2-selection__clear", function(e) {
                            i._handleClear(e)
                        }), t.on("keypress", function(e) {
                            i._handleKeyboardClear(e, t)
                        })
                    }, i.prototype._handleClear = function(e, t) {
                        if (!this.options.get("disabled")) {
                            var i = this.$selection.find(".select2-selection__clear");
                            if (0 !== i.length) {
                                t.stopPropagation();
                                var o = n.GetData(i[0], "data"),
                                    r = this.$element.val();
                                this.$element.val(this.placeholder.id);
                                var s = {
                                    data: o
                                };
                                if (this.trigger("clear", s), s.prevented) return void this.$element.val(r);
                                for (var a = 0; a < o.length; a++)
                                    if (s = {
                                            data: o[a]
                                        }, this.trigger("unselect", s), s.prevented) return void this.$element.val(r);
                                this.$element.trigger("change"), this.trigger("toggle", {})
                            }
                        }
                    }, i.prototype._handleKeyboardClear = function(e, n, i) {
                        i.isOpen() || n.which != t.DELETE && n.which != t.BACKSPACE || this._handleClear(n)
                    }, i.prototype.update = function(t, i) {
                        if (t.call(this, i), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === i.length)) {
                            var o = e('<span class="select2-selection__clear">&times;</span>');
                            n.StoreData(o[0], "data", i), this.$selection.find(".select2-selection__rendered").prepend(o)
                        }
                    }, i
                }), t.define("select2/selection/search", ["jquery", "../utils", "../keys"], function(e, t, n) {
                    function i(e, t, n) {
                        e.call(this, t, n)
                    }
                    return i.prototype.render = function(t) {
                        var n = e('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');
                        this.$searchContainer = n, this.$search = n.find("input");
                        var i = t.call(this);
                        return this._transferTabIndex(), i
                    }, i.prototype.bind = function(e, i, o) {
                        var r = this;
                        e.call(this, i, o), i.on("open", function() {
                            r.$search.trigger("focus")
                        }), i.on("close", function() {
                            r.$search.val(""), r.$search.removeAttr("aria-activedescendant"), r.$search.trigger("focus")
                        }), i.on("enable", function() {
                            r.$search.prop("disabled", !1), r._transferTabIndex()
                        }), i.on("disable", function() {
                            r.$search.prop("disabled", !0)
                        }), i.on("focus", function(e) {
                            r.$search.trigger("focus")
                        }), i.on("results:focus", function(e) {
                            r.$search.attr("aria-activedescendant", e.id)
                        }), this.$selection.on("focusin", ".select2-search--inline", function(e) {
                            r.trigger("focus", e)
                        }), this.$selection.on("focusout", ".select2-search--inline", function(e) {
                            r._handleBlur(e)
                        }), this.$selection.on("keydown", ".select2-search--inline", function(e) {
                            if (e.stopPropagation(), r.trigger("keypress", e), r._keyUpPrevented = e.isDefaultPrevented(), e.which === n.BACKSPACE && "" === r.$search.val()) {
                                var i = r.$searchContainer.prev(".select2-selection__choice");
                                if (i.length > 0) {
                                    var o = t.GetData(i[0], "data");
                                    r.searchRemoveChoice(o), e.preventDefault()
                                }
                            }
                        });
                        var s = document.documentMode,
                            a = s && s <= 11;
                        this.$selection.on("input.searchcheck", ".select2-search--inline", function(e) {
                            if (a) return void r.$selection.off("input.search input.searchcheck");
                            r.$selection.off("keyup.search")
                        }), this.$selection.on("keyup.search input.search", ".select2-search--inline", function(e) {
                            if (a && "input" === e.type) return void r.$selection.off("input.search input.searchcheck");
                            var t = e.which;
                            t != n.SHIFT && t != n.CTRL && t != n.ALT && t != n.TAB && r.handleSearch(e)
                        })
                    }, i.prototype._transferTabIndex = function(e) {
                        this.$search.attr("tabindex", this.$selection.attr("tabindex")), this.$selection.attr("tabindex", "-1")
                    }, i.prototype.createPlaceholder = function(e, t) {
                        this.$search.attr("placeholder", t.text)
                    }, i.prototype.update = function(e, t) {
                        var n = this.$search[0] == document.activeElement;
                        this.$search.attr("placeholder", ""), e.call(this, t), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch(), n && (this.$element.find("[data-select2-tag]").length ? this.$element.focus() : this.$search.focus())
                    }, i.prototype.handleSearch = function() {
                        if (this.resizeSearch(), !this._keyUpPrevented) {
                            var e = this.$search.val();
                            this.trigger("query", {
                                term: e
                            })
                        }
                        this._keyUpPrevented = !1
                    }, i.prototype.searchRemoveChoice = function(e, t) {
                        this.trigger("unselect", {
                            data: t
                        }), this.$search.val(t.text), this.handleSearch()
                    }, i.prototype.resizeSearch = function() {
                        this.$search.css("width", "25px");
                        var e = "";
                        e = "" !== this.$search.attr("placeholder") ? this.$selection.find(".select2-selection__rendered").innerWidth() : .75 * (this.$search.val().length + 1) + "em", this.$search.css("width", e)
                    }, i
                }), t.define("select2/selection/eventRelay", ["jquery"], function(e) {
                    function t() {}
                    return t.prototype.bind = function(t, n, i) {
                        var o = this,
                            r = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting", "clear", "clearing"],
                            s = ["opening", "closing", "selecting", "unselecting", "clearing"];
                        t.call(this, n, i), n.on("*", function(t, n) {
                            if (-1 !== e.inArray(t, r)) {
                                n = n || {};
                                var i = e.Event("select2:" + t, {
                                    params: n
                                });
                                o.$element.trigger(i), -1 !== e.inArray(t, s) && (n.prevented = i.isDefaultPrevented())
                            }
                        })
                    }, t
                }), t.define("select2/translation", ["jquery", "require"], function(e, t) {
                    function n(e) {
                        this.dict = e || {}
                    }
                    return n.prototype.all = function() {
                        return this.dict
                    }, n.prototype.get = function(e) {
                        return this.dict[e]
                    }, n.prototype.extend = function(t) {
                        this.dict = e.extend({}, t.all(), this.dict)
                    }, n._cache = {}, n.loadPath = function(e) {
                        if (!(e in n._cache)) {
                            var i = t(e);
                            n._cache[e] = i
                        }
                        return new n(n._cache[e])
                    }, n
                }), t.define("select2/diacritics", [], function() {
                    return {
                        "Ⓐ": "A",
                        "Ａ": "A",
                        "À": "A",
                        "Á": "A",
                        "Â": "A",
                        "Ầ": "A",
                        "Ấ": "A",
                        "Ẫ": "A",
                        "Ẩ": "A",
                        "Ã": "A",
                        "Ā": "A",
                        "Ă": "A",
                        "Ằ": "A",
                        "Ắ": "A",
                        "Ẵ": "A",
                        "Ẳ": "A",
                        "Ȧ": "A",
                        "Ǡ": "A",
                        "Ä": "A",
                        "Ǟ": "A",
                        "Ả": "A",
                        "Å": "A",
                        "Ǻ": "A",
                        "Ǎ": "A",
                        "Ȁ": "A",
                        "Ȃ": "A",
                        "Ạ": "A",
                        "Ậ": "A",
                        "Ặ": "A",
                        "Ḁ": "A",
                        "Ą": "A",
                        "Ⱥ": "A",
                        "Ɐ": "A",
                        "Ꜳ": "AA",
                        "Æ": "AE",
                        "Ǽ": "AE",
                        "Ǣ": "AE",
                        "Ꜵ": "AO",
                        "Ꜷ": "AU",
                        "Ꜹ": "AV",
                        "Ꜻ": "AV",
                        "Ꜽ": "AY",
                        "Ⓑ": "B",
                        "Ｂ": "B",
                        "Ḃ": "B",
                        "Ḅ": "B",
                        "Ḇ": "B",
                        "Ƀ": "B",
                        "Ƃ": "B",
                        "Ɓ": "B",
                        "Ⓒ": "C",
                        "Ｃ": "C",
                        "Ć": "C",
                        "Ĉ": "C",
                        "Ċ": "C",
                        "Č": "C",
                        "Ç": "C",
                        "Ḉ": "C",
                        "Ƈ": "C",
                        "Ȼ": "C",
                        "Ꜿ": "C",
                        "Ⓓ": "D",
                        "Ｄ": "D",
                        "Ḋ": "D",
                        "Ď": "D",
                        "Ḍ": "D",
                        "Ḑ": "D",
                        "Ḓ": "D",
                        "Ḏ": "D",
                        "Đ": "D",
                        "Ƌ": "D",
                        "Ɗ": "D",
                        "Ɖ": "D",
                        "Ꝺ": "D",
                        "Ǳ": "DZ",
                        "Ǆ": "DZ",
                        "ǲ": "Dz",
                        "ǅ": "Dz",
                        "Ⓔ": "E",
                        "Ｅ": "E",
                        "È": "E",
                        "É": "E",
                        "Ê": "E",
                        "Ề": "E",
                        "Ế": "E",
                        "Ễ": "E",
                        "Ể": "E",
                        "Ẽ": "E",
                        "Ē": "E",
                        "Ḕ": "E",
                        "Ḗ": "E",
                        "Ĕ": "E",
                        "Ė": "E",
                        "Ë": "E",
                        "Ẻ": "E",
                        "Ě": "E",
                        "Ȅ": "E",
                        "Ȇ": "E",
                        "Ẹ": "E",
                        "Ệ": "E",
                        "Ȩ": "E",
                        "Ḝ": "E",
                        "Ę": "E",
                        "Ḙ": "E",
                        "Ḛ": "E",
                        "Ɛ": "E",
                        "Ǝ": "E",
                        "Ⓕ": "F",
                        "Ｆ": "F",
                        "Ḟ": "F",
                        "Ƒ": "F",
                        "Ꝼ": "F",
                        "Ⓖ": "G",
                        "Ｇ": "G",
                        "Ǵ": "G",
                        "Ĝ": "G",
                        "Ḡ": "G",
                        "Ğ": "G",
                        "Ġ": "G",
                        "Ǧ": "G",
                        "Ģ": "G",
                        "Ǥ": "G",
                        "Ɠ": "G",
                        "Ꞡ": "G",
                        "Ᵹ": "G",
                        "Ꝿ": "G",
                        "Ⓗ": "H",
                        "Ｈ": "H",
                        "Ĥ": "H",
                        "Ḣ": "H",
                        "Ḧ": "H",
                        "Ȟ": "H",
                        "Ḥ": "H",
                        "Ḩ": "H",
                        "Ḫ": "H",
                        "Ħ": "H",
                        "Ⱨ": "H",
                        "Ⱶ": "H",
                        "Ɥ": "H",
                        "Ⓘ": "I",
                        "Ｉ": "I",
                        "Ì": "I",
                        "Í": "I",
                        "Î": "I",
                        "Ĩ": "I",
                        "Ī": "I",
                        "Ĭ": "I",
                        "İ": "I",
                        "Ï": "I",
                        "Ḯ": "I",
                        "Ỉ": "I",
                        "Ǐ": "I",
                        "Ȉ": "I",
                        "Ȋ": "I",
                        "Ị": "I",
                        "Į": "I",
                        "Ḭ": "I",
                        "Ɨ": "I",
                        "Ⓙ": "J",
                        "Ｊ": "J",
                        "Ĵ": "J",
                        "Ɉ": "J",
                        "Ⓚ": "K",
                        "Ｋ": "K",
                        "Ḱ": "K",
                        "Ǩ": "K",
                        "Ḳ": "K",
                        "Ķ": "K",
                        "Ḵ": "K",
                        "Ƙ": "K",
                        "Ⱪ": "K",
                        "Ꝁ": "K",
                        "Ꝃ": "K",
                        "Ꝅ": "K",
                        "Ꞣ": "K",
                        "Ⓛ": "L",
                        "Ｌ": "L",
                        "Ŀ": "L",
                        "Ĺ": "L",
                        "Ľ": "L",
                        "Ḷ": "L",
                        "Ḹ": "L",
                        "Ļ": "L",
                        "Ḽ": "L",
                        "Ḻ": "L",
                        "Ł": "L",
                        "Ƚ": "L",
                        "Ɫ": "L",
                        "Ⱡ": "L",
                        "Ꝉ": "L",
                        "Ꝇ": "L",
                        "Ꞁ": "L",
                        "Ǉ": "LJ",
                        "ǈ": "Lj",
                        "Ⓜ": "M",
                        "Ｍ": "M",
                        "Ḿ": "M",
                        "Ṁ": "M",
                        "Ṃ": "M",
                        "Ɱ": "M",
                        "Ɯ": "M",
                        "Ⓝ": "N",
                        "Ｎ": "N",
                        "Ǹ": "N",
                        "Ń": "N",
                        "Ñ": "N",
                        "Ṅ": "N",
                        "Ň": "N",
                        "Ṇ": "N",
                        "Ņ": "N",
                        "Ṋ": "N",
                        "Ṉ": "N",
                        "Ƞ": "N",
                        "Ɲ": "N",
                        "Ꞑ": "N",
                        "Ꞥ": "N",
                        "Ǌ": "NJ",
                        "ǋ": "Nj",
                        "Ⓞ": "O",
                        "Ｏ": "O",
                        "Ò": "O",
                        "Ó": "O",
                        "Ô": "O",
                        "Ồ": "O",
                        "Ố": "O",
                        "Ỗ": "O",
                        "Ổ": "O",
                        "Õ": "O",
                        "Ṍ": "O",
                        "Ȭ": "O",
                        "Ṏ": "O",
                        "Ō": "O",
                        "Ṑ": "O",
                        "Ṓ": "O",
                        "Ŏ": "O",
                        "Ȯ": "O",
                        "Ȱ": "O",
                        "Ö": "O",
                        "Ȫ": "O",
                        "Ỏ": "O",
                        "Ő": "O",
                        "Ǒ": "O",
                        "Ȍ": "O",
                        "Ȏ": "O",
                        "Ơ": "O",
                        "Ờ": "O",
                        "Ớ": "O",
                        "Ỡ": "O",
                        "Ở": "O",
                        "Ợ": "O",
                        "Ọ": "O",
                        "Ộ": "O",
                        "Ǫ": "O",
                        "Ǭ": "O",
                        "Ø": "O",
                        "Ǿ": "O",
                        "Ɔ": "O",
                        "Ɵ": "O",
                        "Ꝋ": "O",
                        "Ꝍ": "O",
                        "Ƣ": "OI",
                        "Ꝏ": "OO",
                        "Ȣ": "OU",
                        "Ⓟ": "P",
                        "Ｐ": "P",
                        "Ṕ": "P",
                        "Ṗ": "P",
                        "Ƥ": "P",
                        "Ᵽ": "P",
                        "Ꝑ": "P",
                        "Ꝓ": "P",
                        "Ꝕ": "P",
                        "Ⓠ": "Q",
                        "Ｑ": "Q",
                        "Ꝗ": "Q",
                        "Ꝙ": "Q",
                        "Ɋ": "Q",
                        "Ⓡ": "R",
                        "Ｒ": "R",
                        "Ŕ": "R",
                        "Ṙ": "R",
                        "Ř": "R",
                        "Ȑ": "R",
                        "Ȓ": "R",
                        "Ṛ": "R",
                        "Ṝ": "R",
                        "Ŗ": "R",
                        "Ṟ": "R",
                        "Ɍ": "R",
                        "Ɽ": "R",
                        "Ꝛ": "R",
                        "Ꞧ": "R",
                        "Ꞃ": "R",
                        "Ⓢ": "S",
                        "Ｓ": "S",
                        "ẞ": "S",
                        "Ś": "S",
                        "Ṥ": "S",
                        "Ŝ": "S",
                        "Ṡ": "S",
                        "Š": "S",
                        "Ṧ": "S",
                        "Ṣ": "S",
                        "Ṩ": "S",
                        "Ș": "S",
                        "Ş": "S",
                        "Ȿ": "S",
                        "Ꞩ": "S",
                        "Ꞅ": "S",
                        "Ⓣ": "T",
                        "Ｔ": "T",
                        "Ṫ": "T",
                        "Ť": "T",
                        "Ṭ": "T",
                        "Ț": "T",
                        "Ţ": "T",
                        "Ṱ": "T",
                        "Ṯ": "T",
                        "Ŧ": "T",
                        "Ƭ": "T",
                        "Ʈ": "T",
                        "Ⱦ": "T",
                        "Ꞇ": "T",
                        "Ꜩ": "TZ",
                        "Ⓤ": "U",
                        "Ｕ": "U",
                        "Ù": "U",
                        "Ú": "U",
                        "Û": "U",
                        "Ũ": "U",
                        "Ṹ": "U",
                        "Ū": "U",
                        "Ṻ": "U",
                        "Ŭ": "U",
                        "Ü": "U",
                        "Ǜ": "U",
                        "Ǘ": "U",
                        "Ǖ": "U",
                        "Ǚ": "U",
                        "Ủ": "U",
                        "Ů": "U",
                        "Ű": "U",
                        "Ǔ": "U",
                        "Ȕ": "U",
                        "Ȗ": "U",
                        "Ư": "U",
                        "Ừ": "U",
                        "Ứ": "U",
                        "Ữ": "U",
                        "Ử": "U",
                        "Ự": "U",
                        "Ụ": "U",
                        "Ṳ": "U",
                        "Ų": "U",
                        "Ṷ": "U",
                        "Ṵ": "U",
                        "Ʉ": "U",
                        "Ⓥ": "V",
                        "Ｖ": "V",
                        "Ṽ": "V",
                        "Ṿ": "V",
                        "Ʋ": "V",
                        "Ꝟ": "V",
                        "Ʌ": "V",
                        "Ꝡ": "VY",
                        "Ⓦ": "W",
                        "Ｗ": "W",
                        "Ẁ": "W",
                        "Ẃ": "W",
                        "Ŵ": "W",
                        "Ẇ": "W",
                        "Ẅ": "W",
                        "Ẉ": "W",
                        "Ⱳ": "W",
                        "Ⓧ": "X",
                        "Ｘ": "X",
                        "Ẋ": "X",
                        "Ẍ": "X",
                        "Ⓨ": "Y",
                        "Ｙ": "Y",
                        "Ỳ": "Y",
                        "Ý": "Y",
                        "Ŷ": "Y",
                        "Ỹ": "Y",
                        "Ȳ": "Y",
                        "Ẏ": "Y",
                        "Ÿ": "Y",
                        "Ỷ": "Y",
                        "Ỵ": "Y",
                        "Ƴ": "Y",
                        "Ɏ": "Y",
                        "Ỿ": "Y",
                        "Ⓩ": "Z",
                        "Ｚ": "Z",
                        "Ź": "Z",
                        "Ẑ": "Z",
                        "Ż": "Z",
                        "Ž": "Z",
                        "Ẓ": "Z",
                        "Ẕ": "Z",
                        "Ƶ": "Z",
                        "Ȥ": "Z",
                        "Ɀ": "Z",
                        "Ⱬ": "Z",
                        "Ꝣ": "Z",
                        "ⓐ": "a",
                        "ａ": "a",
                        "ẚ": "a",
                        "à": "a",
                        "á": "a",
                        "â": "a",
                        "ầ": "a",
                        "ấ": "a",
                        "ẫ": "a",
                        "ẩ": "a",
                        "ã": "a",
                        "ā": "a",
                        "ă": "a",
                        "ằ": "a",
                        "ắ": "a",
                        "ẵ": "a",
                        "ẳ": "a",
                        "ȧ": "a",
                        "ǡ": "a",
                        "ä": "a",
                        "ǟ": "a",
                        "ả": "a",
                        "å": "a",
                        "ǻ": "a",
                        "ǎ": "a",
                        "ȁ": "a",
                        "ȃ": "a",
                        "ạ": "a",
                        "ậ": "a",
                        "ặ": "a",
                        "ḁ": "a",
                        "ą": "a",
                        "ⱥ": "a",
                        "ɐ": "a",
                        "ꜳ": "aa",
                        "æ": "ae",
                        "ǽ": "ae",
                        "ǣ": "ae",
                        "ꜵ": "ao",
                        "ꜷ": "au",
                        "ꜹ": "av",
                        "ꜻ": "av",
                        "ꜽ": "ay",
                        "ⓑ": "b",
                        "ｂ": "b",
                        "ḃ": "b",
                        "ḅ": "b",
                        "ḇ": "b",
                        "ƀ": "b",
                        "ƃ": "b",
                        "ɓ": "b",
                        "ⓒ": "c",
                        "ｃ": "c",
                        "ć": "c",
                        "ĉ": "c",
                        "ċ": "c",
                        "č": "c",
                        "ç": "c",
                        "ḉ": "c",
                        "ƈ": "c",
                        "ȼ": "c",
                        "ꜿ": "c",
                        "ↄ": "c",
                        "ⓓ": "d",
                        "ｄ": "d",
                        "ḋ": "d",
                        "ď": "d",
                        "ḍ": "d",
                        "ḑ": "d",
                        "ḓ": "d",
                        "ḏ": "d",
                        "đ": "d",
                        "ƌ": "d",
                        "ɖ": "d",
                        "ɗ": "d",
                        "ꝺ": "d",
                        "ǳ": "dz",
                        "ǆ": "dz",
                        "ⓔ": "e",
                        "ｅ": "e",
                        "è": "e",
                        "é": "e",
                        "ê": "e",
                        "ề": "e",
                        "ế": "e",
                        "ễ": "e",
                        "ể": "e",
                        "ẽ": "e",
                        "ē": "e",
                        "ḕ": "e",
                        "ḗ": "e",
                        "ĕ": "e",
                        "ė": "e",
                        "ë": "e",
                        "ẻ": "e",
                        "ě": "e",
                        "ȅ": "e",
                        "ȇ": "e",
                        "ẹ": "e",
                        "ệ": "e",
                        "ȩ": "e",
                        "ḝ": "e",
                        "ę": "e",
                        "ḙ": "e",
                        "ḛ": "e",
                        "ɇ": "e",
                        "ɛ": "e",
                        "ǝ": "e",
                        "ⓕ": "f",
                        "ｆ": "f",
                        "ḟ": "f",
                        "ƒ": "f",
                        "ꝼ": "f",
                        "ⓖ": "g",
                        "ｇ": "g",
                        "ǵ": "g",
                        "ĝ": "g",
                        "ḡ": "g",
                        "ğ": "g",
                        "ġ": "g",
                        "ǧ": "g",
                        "ģ": "g",
                        "ǥ": "g",
                        "ɠ": "g",
                        "ꞡ": "g",
                        "ᵹ": "g",
                        "ꝿ": "g",
                        "ⓗ": "h",
                        "ｈ": "h",
                        "ĥ": "h",
                        "ḣ": "h",
                        "ḧ": "h",
                        "ȟ": "h",
                        "ḥ": "h",
                        "ḩ": "h",
                        "ḫ": "h",
                        "ẖ": "h",
                        "ħ": "h",
                        "ⱨ": "h",
                        "ⱶ": "h",
                        "ɥ": "h",
                        "ƕ": "hv",
                        "ⓘ": "i",
                        "ｉ": "i",
                        "ì": "i",
                        "í": "i",
                        "î": "i",
                        "ĩ": "i",
                        "ī": "i",
                        "ĭ": "i",
                        "ï": "i",
                        "ḯ": "i",
                        "ỉ": "i",
                        "ǐ": "i",
                        "ȉ": "i",
                        "ȋ": "i",
                        "ị": "i",
                        "į": "i",
                        "ḭ": "i",
                        "ɨ": "i",
                        "ı": "i",
                        "ⓙ": "j",
                        "ｊ": "j",
                        "ĵ": "j",
                        "ǰ": "j",
                        "ɉ": "j",
                        "ⓚ": "k",
                        "ｋ": "k",
                        "ḱ": "k",
                        "ǩ": "k",
                        "ḳ": "k",
                        "ķ": "k",
                        "ḵ": "k",
                        "ƙ": "k",
                        "ⱪ": "k",
                        "ꝁ": "k",
                        "ꝃ": "k",
                        "ꝅ": "k",
                        "ꞣ": "k",
                        "ⓛ": "l",
                        "ｌ": "l",
                        "ŀ": "l",
                        "ĺ": "l",
                        "ľ": "l",
                        "ḷ": "l",
                        "ḹ": "l",
                        "ļ": "l",
                        "ḽ": "l",
                        "ḻ": "l",
                        "ſ": "l",
                        "ł": "l",
                        "ƚ": "l",
                        "ɫ": "l",
                        "ⱡ": "l",
                        "ꝉ": "l",
                        "ꞁ": "l",
                        "ꝇ": "l",
                        "ǉ": "lj",
                        "ⓜ": "m",
                        "ｍ": "m",
                        "ḿ": "m",
                        "ṁ": "m",
                        "ṃ": "m",
                        "ɱ": "m",
                        "ɯ": "m",
                        "ⓝ": "n",
                        "ｎ": "n",
                        "ǹ": "n",
                        "ń": "n",
                        "ñ": "n",
                        "ṅ": "n",
                        "ň": "n",
                        "ṇ": "n",
                        "ņ": "n",
                        "ṋ": "n",
                        "ṉ": "n",
                        "ƞ": "n",
                        "ɲ": "n",
                        "ŉ": "n",
                        "ꞑ": "n",
                        "ꞥ": "n",
                        "ǌ": "nj",
                        "ⓞ": "o",
                        "ｏ": "o",
                        "ò": "o",
                        "ó": "o",
                        "ô": "o",
                        "ồ": "o",
                        "ố": "o",
                        "ỗ": "o",
                        "ổ": "o",
                        "õ": "o",
                        "ṍ": "o",
                        "ȭ": "o",
                        "ṏ": "o",
                        "ō": "o",
                        "ṑ": "o",
                        "ṓ": "o",
                        "ŏ": "o",
                        "ȯ": "o",
                        "ȱ": "o",
                        "ö": "o",
                        "ȫ": "o",
                        "ỏ": "o",
                        "ő": "o",
                        "ǒ": "o",
                        "ȍ": "o",
                        "ȏ": "o",
                        "ơ": "o",
                        "ờ": "o",
                        "ớ": "o",
                        "ỡ": "o",
                        "ở": "o",
                        "ợ": "o",
                        "ọ": "o",
                        "ộ": "o",
                        "ǫ": "o",
                        "ǭ": "o",
                        "ø": "o",
                        "ǿ": "o",
                        "ɔ": "o",
                        "ꝋ": "o",
                        "ꝍ": "o",
                        "ɵ": "o",
                        "ƣ": "oi",
                        "ȣ": "ou",
                        "ꝏ": "oo",
                        "ⓟ": "p",
                        "ｐ": "p",
                        "ṕ": "p",
                        "ṗ": "p",
                        "ƥ": "p",
                        "ᵽ": "p",
                        "ꝑ": "p",
                        "ꝓ": "p",
                        "ꝕ": "p",
                        "ⓠ": "q",
                        "ｑ": "q",
                        "ɋ": "q",
                        "ꝗ": "q",
                        "ꝙ": "q",
                        "ⓡ": "r",
                        "ｒ": "r",
                        "ŕ": "r",
                        "ṙ": "r",
                        "ř": "r",
                        "ȑ": "r",
                        "ȓ": "r",
                        "ṛ": "r",
                        "ṝ": "r",
                        "ŗ": "r",
                        "ṟ": "r",
                        "ɍ": "r",
                        "ɽ": "r",
                        "ꝛ": "r",
                        "ꞧ": "r",
                        "ꞃ": "r",
                        "ⓢ": "s",
                        "ｓ": "s",
                        "ß": "s",
                        "ś": "s",
                        "ṥ": "s",
                        "ŝ": "s",
                        "ṡ": "s",
                        "š": "s",
                        "ṧ": "s",
                        "ṣ": "s",
                        "ṩ": "s",
                        "ș": "s",
                        "ş": "s",
                        "ȿ": "s",
                        "ꞩ": "s",
                        "ꞅ": "s",
                        "ẛ": "s",
                        "ⓣ": "t",
                        "ｔ": "t",
                        "ṫ": "t",
                        "ẗ": "t",
                        "ť": "t",
                        "ṭ": "t",
                        "ț": "t",
                        "ţ": "t",
                        "ṱ": "t",
                        "ṯ": "t",
                        "ŧ": "t",
                        "ƭ": "t",
                        "ʈ": "t",
                        "ⱦ": "t",
                        "ꞇ": "t",
                        "ꜩ": "tz",
                        "ⓤ": "u",
                        "ｕ": "u",
                        "ù": "u",
                        "ú": "u",
                        "û": "u",
                        "ũ": "u",
                        "ṹ": "u",
                        "ū": "u",
                        "ṻ": "u",
                        "ŭ": "u",
                        "ü": "u",
                        "ǜ": "u",
                        "ǘ": "u",
                        "ǖ": "u",
                        "ǚ": "u",
                        "ủ": "u",
                        "ů": "u",
                        "ű": "u",
                        "ǔ": "u",
                        "ȕ": "u",
                        "ȗ": "u",
                        "ư": "u",
                        "ừ": "u",
                        "ứ": "u",
                        "ữ": "u",
                        "ử": "u",
                        "ự": "u",
                        "ụ": "u",
                        "ṳ": "u",
                        "ų": "u",
                        "ṷ": "u",
                        "ṵ": "u",
                        "ʉ": "u",
                        "ⓥ": "v",
                        "ｖ": "v",
                        "ṽ": "v",
                        "ṿ": "v",
                        "ʋ": "v",
                        "ꝟ": "v",
                        "ʌ": "v",
                        "ꝡ": "vy",
                        "ⓦ": "w",
                        "ｗ": "w",
                        "ẁ": "w",
                        "ẃ": "w",
                        "ŵ": "w",
                        "ẇ": "w",
                        "ẅ": "w",
                        "ẘ": "w",
                        "ẉ": "w",
                        "ⱳ": "w",
                        "ⓧ": "x",
                        "ｘ": "x",
                        "ẋ": "x",
                        "ẍ": "x",
                        "ⓨ": "y",
                        "ｙ": "y",
                        "ỳ": "y",
                        "ý": "y",
                        "ŷ": "y",
                        "ỹ": "y",
                        "ȳ": "y",
                        "ẏ": "y",
                        "ÿ": "y",
                        "ỷ": "y",
                        "ẙ": "y",
                        "ỵ": "y",
                        "ƴ": "y",
                        "ɏ": "y",
                        "ỿ": "y",
                        "ⓩ": "z",
                        "ｚ": "z",
                        "ź": "z",
                        "ẑ": "z",
                        "ż": "z",
                        "ž": "z",
                        "ẓ": "z",
                        "ẕ": "z",
                        "ƶ": "z",
                        "ȥ": "z",
                        "ɀ": "z",
                        "ⱬ": "z",
                        "ꝣ": "z",
                        "Ά": "Α",
                        "Έ": "Ε",
                        "Ή": "Η",
                        "Ί": "Ι",
                        "Ϊ": "Ι",
                        "Ό": "Ο",
                        "Ύ": "Υ",
                        "Ϋ": "Υ",
                        "Ώ": "Ω",
                        "ά": "α",
                        "έ": "ε",
                        "ή": "η",
                        "ί": "ι",
                        "ϊ": "ι",
                        "ΐ": "ι",
                        "ό": "ο",
                        "ύ": "υ",
                        "ϋ": "υ",
                        "ΰ": "υ",
                        "ω": "ω",
                        "ς": "σ"
                    }
                }), t.define("select2/data/base", ["../utils"], function(e) {
                    function t(e, n) {
                        t.__super__.constructor.call(this)
                    }
                    return e.Extend(t, e.Observable), t.prototype.current = function(e) {
                        throw new Error("The `current` method must be defined in child classes.")
                    }, t.prototype.query = function(e, t) {
                        throw new Error("The `query` method must be defined in child classes.")
                    }, t.prototype.bind = function(e, t) {}, t.prototype.destroy = function() {}, t.prototype.generateResultId = function(t, n) {
                        var i = t.id + "-result-";
                        return i += e.generateChars(4), null != n.id ? i += "-" + n.id.toString() : i += "-" + e.generateChars(4), i
                    }, t
                }), t.define("select2/data/select", ["./base", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        this.$element = e, this.options = t, i.__super__.constructor.call(this)
                    }
                    return t.Extend(i, e), i.prototype.current = function(e) {
                        var t = [],
                            i = this;
                        this.$element.find(":selected").each(function() {
                            var e = n(this),
                                o = i.item(e);
                            t.push(o)
                        }), e(t)
                    }, i.prototype.select = function(e) {
                        var t = this;
                        if (e.selected = !0, n(e.element).is("option")) return e.element.selected = !0, void this.$element.trigger("change");
                        if (this.$element.prop("multiple")) this.current(function(i) {
                            var o = [];
                            e = [e], e.push.apply(e, i);
                            for (var r = 0; r < e.length; r++) {
                                var s = e[r].id; - 1 === n.inArray(s, o) && o.push(s)
                            }
                            t.$element.val(o), t.$element.trigger("change")
                        });
                        else {
                            var i = e.id;
                            this.$element.val(i), this.$element.trigger("change")
                        }
                    }, i.prototype.unselect = function(e) {
                        var t = this;
                        if (this.$element.prop("multiple")) {
                            if (e.selected = !1, n(e.element).is("option")) return e.element.selected = !1, void this.$element.trigger("change");
                            this.current(function(i) {
                                for (var o = [], r = 0; r < i.length; r++) {
                                    var s = i[r].id;
                                    s !== e.id && -1 === n.inArray(s, o) && o.push(s)
                                }
                                t.$element.val(o), t.$element.trigger("change")
                            })
                        }
                    }, i.prototype.bind = function(e, t) {
                        var n = this;
                        this.container = e, e.on("select", function(e) {
                            n.select(e.data)
                        }), e.on("unselect", function(e) {
                            n.unselect(e.data)
                        })
                    }, i.prototype.destroy = function() {
                        this.$element.find("*").each(function() {
                            t.RemoveData(this)
                        })
                    }, i.prototype.query = function(e, t) {
                        var i = [],
                            o = this;
                        this.$element.children().each(function() {
                            var t = n(this);
                            if (t.is("option") || t.is("optgroup")) {
                                var r = o.item(t),
                                    s = o.matches(e, r);
                                null !== s && i.push(s)
                            }
                        }), t({
                            results: i
                        })
                    }, i.prototype.addOptions = function(e) {
                        t.appendMany(this.$element, e)
                    }, i.prototype.option = function(e) {
                        var i;
                        e.children ? (i = document.createElement("optgroup"), i.label = e.text) : (i = document.createElement("option"), void 0 !== i.textContent ? i.textContent = e.text : i.innerText = e.text), void 0 !== e.id && (i.value = e.id), e.disabled && (i.disabled = !0), e.selected && (i.selected = !0), e.title && (i.title = e.title);
                        var o = n(i),
                            r = this._normalizeItem(e);
                        return r.element = i, t.StoreData(i, "data", r), o
                    }, i.prototype.item = function(e) {
                        var i = {};
                        if (null != (i = t.GetData(e[0], "data"))) return i;
                        if (e.is("option")) i = {
                            id: e.val(),
                            text: e.text(),
                            disabled: e.prop("disabled"),
                            selected: e.prop("selected"),
                            title: e.prop("title")
                        };
                        else if (e.is("optgroup")) {
                            i = {
                                text: e.prop("label"),
                                children: [],
                                title: e.prop("title")
                            };
                            for (var o = e.children("option"), r = [], s = 0; s < o.length; s++) {
                                var a = n(o[s]),
                                    l = this.item(a);
                                r.push(l)
                            }
                            i.children = r
                        }
                        return i = this._normalizeItem(i), i.element = e[0], t.StoreData(e[0], "data", i), i
                    }, i.prototype._normalizeItem = function(e) {
                        e !== Object(e) && (e = {
                            id: e,
                            text: e
                        }), e = n.extend({}, {
                            text: ""
                        }, e);
                        var t = {
                            selected: !1,
                            disabled: !1
                        };
                        return null != e.id && (e.id = e.id.toString()), null != e.text && (e.text = e.text.toString()), null == e._resultId && e.id && null != this.container && (e._resultId = this.generateResultId(this.container, e)), n.extend({}, t, e)
                    }, i.prototype.matches = function(e, t) {
                        return this.options.get("matcher")(e, t)
                    }, i
                }), t.define("select2/data/array", ["./select", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        var n = t.get("data") || [];
                        i.__super__.constructor.call(this, e, t), this.addOptions(this.convertToOptions(n))
                    }
                    return t.Extend(i, e), i.prototype.select = function(e) {
                        var t = this.$element.find("option").filter(function(t, n) {
                            return n.value == e.id.toString()
                        });
                        0 === t.length && (t = this.option(e), this.addOptions(t)), i.__super__.select.call(this, e)
                    }, i.prototype.convertToOptions = function(e) {
                        for (var i = this, o = this.$element.find("option"), r = o.map(function() {
                            return i.item(n(this)).id
                        }).get(), s = [], a = 0; a < e.length; a++) {
                            var l = this._normalizeItem(e[a]);
                            if (n.inArray(l.id, r) >= 0) {
                                var c = o.filter(function(e) {
                                        return function() {
                                            return n(this).val() == e.id
                                        }
                                    }(l)),
                                    u = this.item(c),
                                    d = n.extend(!0, {}, l, u),
                                    h = this.option(d);
                                c.replaceWith(h)
                            } else {
                                var p = this.option(l);
                                if (l.children) {
                                    var f = this.convertToOptions(l.children);
                                    t.appendMany(p, f)
                                }
                                s.push(p)
                            }
                        }
                        return s
                    }, i
                }), t.define("select2/data/ajax", ["./array", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        this.ajaxOptions = this._applyDefaults(t.get("ajax")), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), i.__super__.constructor.call(this, e, t)
                    }
                    return t.Extend(i, e), i.prototype._applyDefaults = function(e) {
                        var t = {
                            data: function(e) {
                                return n.extend({}, e, {
                                    q: e.term
                                })
                            },
                            transport: function(e, t, i) {
                                var o = n.ajax(e);
                                return o.then(t), o.fail(i), o
                            }
                        };
                        return n.extend({}, t, e, !0)
                    }, i.prototype.processResults = function(e) {
                        return e
                    }, i.prototype.query = function(e, t) {
                        function i() {
                            var i = r.transport(r, function(i) {
                                var r = o.processResults(i, e);
                                o.options.get("debug") && window.console && console.error && (r && r.results && n.isArray(r.results) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")), t(r)
                            }, function() {
                                "status" in i && (0 === i.status || "0" === i.status) || o.trigger("results:message", {
                                    message: "errorLoading"
                                })
                            });
                            o._request = i
                        }
                        var o = this;
                        null != this._request && (n.isFunction(this._request.abort) && this._request.abort(), this._request = null);
                        var r = n.extend({
                            type: "GET"
                        }, this.ajaxOptions);
                        "function" == typeof r.url && (r.url = r.url.call(this.$element, e)), "function" == typeof r.data && (r.data = r.data.call(this.$element, e)), this.ajaxOptions.delay && null != e.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), this._queryTimeout = window.setTimeout(i, this.ajaxOptions.delay)) : i()
                    }, i
                }), t.define("select2/data/tags", ["jquery"], function(e) {
                    function t(t, n, i) {
                        var o = i.get("tags"),
                            r = i.get("createTag");
                        void 0 !== r && (this.createTag = r);
                        var s = i.get("insertTag");
                        if (void 0 !== s && (this.insertTag = s), t.call(this, n, i), e.isArray(o))
                            for (var a = 0; a < o.length; a++) {
                                var l = o[a],
                                    c = this._normalizeItem(l),
                                    u = this.option(c);
                                this.$element.append(u)
                            }
                    }
                    return t.prototype.query = function(e, t, n) {
                        function i(e, r) {
                            for (var s = e.results, a = 0; a < s.length; a++) {
                                var l = s[a],
                                    c = null != l.children && !i({
                                        results: l.children
                                    }, !0);
                                if ((l.text || "").toUpperCase() === (t.term || "").toUpperCase() || c) return !r && (e.data = s, void n(e))
                            }
                            if (r) return !0;
                            var u = o.createTag(t);
                            if (null != u) {
                                var d = o.option(u);
                                d.attr("data-select2-tag", !0), o.addOptions([d]), o.insertTag(s, u)
                            }
                            e.results = s, n(e)
                        }
                        var o = this;
                        if (this._removeOldTags(), null == t.term || null != t.page) return void e.call(this, t, n);
                        e.call(this, t, i)
                    }, t.prototype.createTag = function(t, n) {
                        var i = e.trim(n.term);
                        return "" === i ? null : {
                            id: i,
                            text: i
                        }
                    }, t.prototype.insertTag = function(e, t, n) {
                        t.unshift(n)
                    }, t.prototype._removeOldTags = function(t) {
                        this._lastTag, this.$element.find("option[data-select2-tag]").each(function() {
                            this.selected || e(this).remove()
                        })
                    }, t
                }), t.define("select2/data/tokenizer", ["jquery"], function(e) {
                    function t(e, t, n) {
                        var i = n.get("tokenizer");
                        void 0 !== i && (this.tokenizer = i), e.call(this, t, n)
                    }
                    return t.prototype.bind = function(e, t, n) {
                        e.call(this, t, n), this.$search = t.dropdown.$search || t.selection.$search || n.find(".select2-search__field")
                    }, t.prototype.query = function(t, n, i) {
                        function o(t) {
                            var n = s._normalizeItem(t);
                            if (!s.$element.find("option").filter(function() {
                                    return e(this).val() === n.id
                                }).length) {
                                var i = s.option(n);
                                i.attr("data-select2-tag", !0), s._removeOldTags(), s.addOptions([i])
                            }
                            r(n)
                        }

                        function r(e) {
                            s.trigger("select", {
                                data: e
                            })
                        }
                        var s = this;
                        n.term = n.term || "";
                        var a = this.tokenizer(n, this.options, o);
                        a.term !== n.term && (this.$search.length && (this.$search.val(a.term), this.$search.focus()), n.term = a.term), t.call(this, n, i)
                    }, t.prototype.tokenizer = function(t, n, i, o) {
                        for (var r = i.get("tokenSeparators") || [], s = n.term, a = 0, l = this.createTag || function(e) {
                            return {
                                id: e.term,
                                text: e.term
                            }
                        }; a < s.length;) {
                            var c = s[a];
                            if (-1 !== e.inArray(c, r)) {
                                var u = s.substr(0, a),
                                    d = e.extend({}, n, {
                                        term: u
                                    }),
                                    h = l(d);
                                null != h ? (o(h), s = s.substr(a + 1) || "", a = 0) : a++
                            } else a++
                        }
                        return {
                            term: s
                        }
                    }, t
                }), t.define("select2/data/minimumInputLength", [], function() {
                    function e(e, t, n) {
                        this.minimumInputLength = n.get("minimumInputLength"), e.call(this, t, n)
                    }
                    return e.prototype.query = function(e, t, n) {
                        if (t.term = t.term || "", t.term.length < this.minimumInputLength) return void this.trigger("results:message", {
                            message: "inputTooShort",
                            args: {
                                minimum: this.minimumInputLength,
                                input: t.term,
                                params: t
                            }
                        });
                        e.call(this, t, n)
                    }, e
                }), t.define("select2/data/maximumInputLength", [], function() {
                    function e(e, t, n) {
                        this.maximumInputLength = n.get("maximumInputLength"), e.call(this, t, n)
                    }
                    return e.prototype.query = function(e, t, n) {
                        if (t.term = t.term || "", this.maximumInputLength > 0 && t.term.length > this.maximumInputLength) return void this.trigger("results:message", {
                            message: "inputTooLong",
                            args: {
                                maximum: this.maximumInputLength,
                                input: t.term,
                                params: t
                            }
                        });
                        e.call(this, t, n)
                    }, e
                }), t.define("select2/data/maximumSelectionLength", [], function() {
                    function e(e, t, n) {
                        this.maximumSelectionLength = n.get("maximumSelectionLength"), e.call(this, t, n)
                    }
                    return e.prototype.query = function(e, t, n) {
                        var i = this;
                        this.current(function(o) {
                            var r = null != o ? o.length : 0;
                            if (i.maximumSelectionLength > 0 && r >= i.maximumSelectionLength) return void i.trigger("results:message", {
                                message: "maximumSelected",
                                args: {
                                    maximum: i.maximumSelectionLength
                                }
                            });
                            e.call(i, t, n)
                        })
                    }, e
                }), t.define("select2/dropdown", ["jquery", "./utils"], function(e, t) {
                    function n(e, t) {
                        this.$element = e, this.options = t, n.__super__.constructor.call(this)
                    }
                    return t.Extend(n, t.Observable), n.prototype.render = function() {
                        var t = e('<span class="select2-dropdown"><span class="select2-results"></span></span>');
                        return t.attr("dir", this.options.get("dir")), this.$dropdown = t, t
                    }, n.prototype.bind = function() {}, n.prototype.position = function(e, t) {}, n.prototype.destroy = function() {
                        this.$dropdown.remove()
                    }, n
                }), t.define("select2/dropdown/search", ["jquery", "../utils"], function(e, t) {
                    function n() {}
                    return n.prototype.render = function(t) {
                        var n = t.call(this),
                            i = e('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" /></span>');
                        return this.$searchContainer = i, this.$search = i.find("input"), n.prepend(i), n
                    }, n.prototype.bind = function(t, n, i) {
                        var o = this;
                        t.call(this, n, i), this.$search.on("keydown", function(e) {
                            o.trigger("keypress", e), o._keyUpPrevented = e.isDefaultPrevented()
                        }), this.$search.on("input", function(t) {
                            e(this).off("keyup")
                        }), this.$search.on("keyup input", function(e) {
                            o.handleSearch(e)
                        }), n.on("open", function() {
                            o.$search.attr("tabindex", 0), o.$search.focus(), window.setTimeout(function() {
                                o.$search.focus()
                            }, 0)
                        }), n.on("close", function() {
                            o.$search.attr("tabindex", -1), o.$search.val(""), o.$search.blur()
                        }), n.on("focus", function() {
                            n.isOpen() || o.$search.focus()
                        }), n.on("results:all", function(e) {
                            null != e.query.term && "" !== e.query.term || (o.showSearch(e) ? o.$searchContainer.removeClass("select2-search--hide") : o.$searchContainer.addClass("select2-search--hide"))
                        })
                    }, n.prototype.handleSearch = function(e) {
                        if (!this._keyUpPrevented) {
                            var t = this.$search.val();
                            this.trigger("query", {
                                term: t
                            })
                        }
                        this._keyUpPrevented = !1
                    }, n.prototype.showSearch = function(e, t) {
                        return !0
                    }, n
                }), t.define("select2/dropdown/hidePlaceholder", [], function() {
                    function e(e, t, n, i) {
                        this.placeholder = this.normalizePlaceholder(n.get("placeholder")), e.call(this, t, n, i)
                    }
                    return e.prototype.append = function(e, t) {
                        t.results = this.removePlaceholder(t.results), e.call(this, t)
                    }, e.prototype.normalizePlaceholder = function(e, t) {
                        return "string" == typeof t && (t = {
                            id: "",
                            text: t
                        }), t
                    }, e.prototype.removePlaceholder = function(e, t) {
                        for (var n = t.slice(0), i = t.length - 1; i >= 0; i--) {
                            var o = t[i];
                            this.placeholder.id === o.id && n.splice(i, 1)
                        }
                        return n
                    }, e
                }), t.define("select2/dropdown/infiniteScroll", ["jquery"], function(e) {
                    function t(e, t, n, i) {
                        this.lastParams = {}, e.call(this, t, n, i), this.$loadingMore = this.createLoadingMore(), this.loading = !1
                    }
                    return t.prototype.append = function(e, t) {
                        this.$loadingMore.remove(), this.loading = !1, e.call(this, t), this.showLoadingMore(t) && this.$results.append(this.$loadingMore)
                    }, t.prototype.bind = function(t, n, i) {
                        var o = this;
                        t.call(this, n, i), n.on("query", function(e) {
                            o.lastParams = e, o.loading = !0
                        }), n.on("query:append", function(e) {
                            o.lastParams = e, o.loading = !0
                        }), this.$results.on("scroll", function() {
                            var t = e.contains(document.documentElement, o.$loadingMore[0]);
                            !o.loading && t && o.$results.offset().top + o.$results.outerHeight(!1) + 50 >= o.$loadingMore.offset().top + o.$loadingMore.outerHeight(!1) && o.loadMore()
                        })
                    }, t.prototype.loadMore = function() {
                        this.loading = !0;
                        var t = e.extend({}, {
                            page: 1
                        }, this.lastParams);
                        t.page++, this.trigger("query:append", t)
                    }, t.prototype.showLoadingMore = function(e, t) {
                        return t.pagination && t.pagination.more
                    }, t.prototype.createLoadingMore = function() {
                        var t = e('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),
                            n = this.options.get("translations").get("loadingMore");
                        return t.html(n(this.lastParams)), t
                    }, t
                }), t.define("select2/dropdown/attachBody", ["jquery", "../utils"], function(e, t) {
                    function n(t, n, i) {
                        this.$dropdownParent = i.get("dropdownParent") || e(document.body), t.call(this, n, i)
                    }
                    return n.prototype.bind = function(e, t, n) {
                        var i = this,
                            o = !1;
                        e.call(this, t, n), t.on("open", function() {
                            i._showDropdown(), i._attachPositioningHandler(t), o || (o = !0, t.on("results:all", function() {
                                i._positionDropdown(), i._resizeDropdown()
                            }), t.on("results:append", function() {
                                i._positionDropdown(), i._resizeDropdown()
                            }))
                        }), t.on("close", function() {
                            i._hideDropdown(), i._detachPositioningHandler(t)
                        }), this.$dropdownContainer.on("mousedown", function(e) {
                            e.stopPropagation()
                        })
                    }, n.prototype.destroy = function(e) {
                        e.call(this), this.$dropdownContainer.remove()
                    }, n.prototype.position = function(e, t, n) {
                        t.attr("class", n.attr("class")), t.removeClass("select2"), t.addClass("select2-container--open"), t.css({
                            position: "absolute",
                            top: -999999
                        }), this.$container = n
                    }, n.prototype.render = function(t) {
                        var n = e("<span></span>"),
                            i = t.call(this);
                        return n.append(i), this.$dropdownContainer = n, n
                    }, n.prototype._hideDropdown = function(e) {
                        this.$dropdownContainer.detach()
                    }, n.prototype._attachPositioningHandler = function(n, i) {
                        var o = this,
                            r = "scroll.select2." + i.id,
                            s = "resize.select2." + i.id,
                            a = "orientationchange.select2." + i.id,
                            l = this.$container.parents().filter(t.hasScroll);
                        l.each(function() {
                            t.StoreData(this, "select2-scroll-position", {
                                x: e(this).scrollLeft(),
                                y: e(this).scrollTop()
                            })
                        }), l.on(r, function(n) {
                            var i = t.GetData(this, "select2-scroll-position");
                            e(this).scrollTop(i.y)
                        }), e(window).on(r + " " + s + " " + a, function(e) {
                            o._positionDropdown(), o._resizeDropdown()
                        })
                    }, n.prototype._detachPositioningHandler = function(n, i) {
                        var o = "scroll.select2." + i.id,
                            r = "resize.select2." + i.id,
                            s = "orientationchange.select2." + i.id;
                        this.$container.parents().filter(t.hasScroll).off(o), e(window).off(o + " " + r + " " + s)
                    }, n.prototype._positionDropdown = function() {
                        var t = e(window),
                            n = this.$dropdown.hasClass("select2-dropdown--above"),
                            i = this.$dropdown.hasClass("select2-dropdown--below"),
                            o = null,
                            r = this.$container.offset();
                        r.bottom = r.top + this.$container.outerHeight(!1);
                        var s = {
                            height: this.$container.outerHeight(!1)
                        };
                        s.top = r.top, s.bottom = r.top + s.height;
                        var a = {
                                height: this.$dropdown.outerHeight(!1)
                            },
                            l = {
                                top: t.scrollTop(),
                                bottom: t.scrollTop() + t.height()
                            },
                            c = l.top < r.top - a.height,
                            u = l.bottom > r.bottom + a.height,
                            d = {
                                left: r.left,
                                top: s.bottom
                            },
                            h = this.$dropdownParent;
                        "static" === h.css("position") && (h = h.offsetParent());
                        var p = h.offset();
                        d.top -= p.top, d.left -= p.left, n || i || (o = "below"), u || !c || n ? !c && u && n && (o = "below") : o = "above", ("above" == o || n && "below" !== o) && (d.top = s.top - p.top - a.height), null != o && (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + o), this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + o)), this.$dropdownContainer.css(d)
                    }, n.prototype._resizeDropdown = function() {
                        var e = {
                            width: this.$container.outerWidth(!1) + "px"
                        };
                        this.options.get("dropdownAutoWidth") && (e.minWidth = e.width, e.position = "relative", e.width = "auto"), this.$dropdown.css(e)
                    }, n.prototype._showDropdown = function(e) {
                        this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown()
                    }, n
                }), t.define("select2/dropdown/minimumResultsForSearch", [], function() {
                    function e(t) {
                        for (var n = 0, i = 0; i < t.length; i++) {
                            var o = t[i];
                            o.children ? n += e(o.children) : n++
                        }
                        return n
                    }

                    function t(e, t, n, i) {
                        this.minimumResultsForSearch = n.get("minimumResultsForSearch"), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), e.call(this, t, n, i)
                    }
                    return t.prototype.showSearch = function(t, n) {
                        return !(e(n.data.results) < this.minimumResultsForSearch) && t.call(this, n)
                    }, t
                }), t.define("select2/dropdown/selectOnClose", ["../utils"], function(e) {
                    function t() {}
                    return t.prototype.bind = function(e, t, n) {
                        var i = this;
                        e.call(this, t, n), t.on("close", function(e) {
                            i._handleSelectOnClose(e)
                        })
                    }, t.prototype._handleSelectOnClose = function(t, n) {
                        if (n && null != n.originalSelect2Event) {
                            var i = n.originalSelect2Event;
                            if ("select" === i._type || "unselect" === i._type) return
                        }
                        var o = this.getHighlightedResults();
                        if (!(o.length < 1)) {
                            var r = e.GetData(o[0], "data");
                            null != r.element && r.element.selected || null == r.element && r.selected || this.trigger("select", {
                                data: r
                            })
                        }
                    }, t
                }), t.define("select2/dropdown/closeOnSelect", [], function() {
                    function e() {}
                    return e.prototype.bind = function(e, t, n) {
                        var i = this;
                        e.call(this, t, n), t.on("select", function(e) {
                            i._selectTriggered(e)
                        }), t.on("unselect", function(e) {
                            i._selectTriggered(e)
                        })
                    }, e.prototype._selectTriggered = function(e, t) {
                        var n = t.originalEvent;
                        n && n.ctrlKey || this.trigger("close", {
                            originalEvent: n,
                            originalSelect2Event: t
                        })
                    }, e
                }), t.define("select2/i18n/en", [], function() {
                    return {
                        errorLoading: function() {
                            return "The results could not be loaded."
                        },
                        inputTooLong: function(e) {
                            var t = e.input.length - e.maximum,
                                n = "Please delete " + t + " character";
                            return 1 != t && (n += "s"), n
                        },
                        inputTooShort: function(e) {
                            return "Please enter " + (e.minimum - e.input.length) + " or more characters"
                        },
                        loadingMore: function() {
                            return "Loading more results…"
                        },
                        maximumSelected: function(e) {
                            var t = "You can only select " + e.maximum + " item";
                            return 1 != e.maximum && (t += "s"), t
                        },
                        noResults: function() {
                            return "No results found"
                        },
                        searching: function() {
                            return "Searching…"
                        }
                    }
                }), t.define("select2/defaults", ["jquery", "require", "./results", "./selection/single", "./selection/multiple", "./selection/placeholder", "./selection/allowClear", "./selection/search", "./selection/eventRelay", "./utils", "./translation", "./diacritics", "./data/select", "./data/array", "./data/ajax", "./data/tags", "./data/tokenizer", "./data/minimumInputLength", "./data/maximumInputLength", "./data/maximumSelectionLength", "./dropdown", "./dropdown/search", "./dropdown/hidePlaceholder", "./dropdown/infiniteScroll", "./dropdown/attachBody", "./dropdown/minimumResultsForSearch", "./dropdown/selectOnClose", "./dropdown/closeOnSelect", "./i18n/en"], function(e, t, n, i, o, r, s, a, l, c, u, d, h, p, f, m, g, v, y, b, w, _, x, T, S, C, k, E, A) {
                    function D() {
                        this.reset()
                    }
                    return D.prototype.apply = function(d) {
                        if (d = e.extend(!0, {}, this.defaults, d), null == d.dataAdapter) {
                            if (null != d.ajax ? d.dataAdapter = f : null != d.data ? d.dataAdapter = p : d.dataAdapter = h, d.minimumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, v)), d.maximumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, y)), d.maximumSelectionLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, b)), d.tags && (d.dataAdapter = c.Decorate(d.dataAdapter, m)), null == d.tokenSeparators && null == d.tokenizer || (d.dataAdapter = c.Decorate(d.dataAdapter, g)), null != d.query) {
                                var A = t(d.amdBase + "compat/query");
                                d.dataAdapter = c.Decorate(d.dataAdapter, A)
                            }
                            if (null != d.initSelection) {
                                var D = t(d.amdBase + "compat/initSelection");
                                d.dataAdapter = c.Decorate(d.dataAdapter, D)
                            }
                        }
                        if (null == d.resultsAdapter && (d.resultsAdapter = n, null != d.ajax && (d.resultsAdapter = c.Decorate(d.resultsAdapter, T)), null != d.placeholder && (d.resultsAdapter = c.Decorate(d.resultsAdapter, x)), d.selectOnClose && (d.resultsAdapter = c.Decorate(d.resultsAdapter, k))), null == d.dropdownAdapter) {
                            if (d.multiple) d.dropdownAdapter = w;
                            else {
                                var O = c.Decorate(w, _);
                                d.dropdownAdapter = O
                            }
                            if (0 !== d.minimumResultsForSearch && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, C)), d.closeOnSelect && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, E)), null != d.dropdownCssClass || null != d.dropdownCss || null != d.adaptDropdownCssClass) {
                                var I = t(d.amdBase + "compat/dropdownCss");
                                d.dropdownAdapter = c.Decorate(d.dropdownAdapter, I)
                            }
                            d.dropdownAdapter = c.Decorate(d.dropdownAdapter, S)
                        }
                        if (null == d.selectionAdapter) {
                            if (d.multiple ? d.selectionAdapter = o : d.selectionAdapter = i, null != d.placeholder && (d.selectionAdapter = c.Decorate(d.selectionAdapter, r)), d.allowClear && (d.selectionAdapter = c.Decorate(d.selectionAdapter, s)), d.multiple && (d.selectionAdapter = c.Decorate(d.selectionAdapter, a)), null != d.containerCssClass || null != d.containerCss || null != d.adaptContainerCssClass) {
                                var $ = t(d.amdBase + "compat/containerCss");
                                d.selectionAdapter = c.Decorate(d.selectionAdapter, $)
                            }
                            d.selectionAdapter = c.Decorate(d.selectionAdapter, l)
                        }
                        if ("string" == typeof d.language)
                            if (d.language.indexOf("-") > 0) {
                                var L = d.language.split("-"),
                                    N = L[0];
                                d.language = [d.language, N]
                            } else d.language = [d.language];
                        if (e.isArray(d.language)) {
                            var M = new u;
                            d.language.push("en");
                            for (var P = d.language, j = 0; j < P.length; j++) {
                                var H = P[j],
                                    F = {};
                                try {
                                    F = u.loadPath(H)
                                } catch (e) {
                                    try {
                                        H = this.defaults.amdLanguageBase + H, F = u.loadPath(H)
                                    } catch (e) {
                                        d.debug && window.console && console.warn && console.warn('Select2: The language file for "' + H + '" could not be automatically loaded. A fallback will be used instead.');
                                        continue
                                    }
                                }
                                M.extend(F)
                            }
                            d.translations = M
                        } else {
                            var R = u.loadPath(this.defaults.amdLanguageBase + "en"),
                                q = new u(d.language);
                            q.extend(R), d.translations = q
                        }
                        return d
                    }, D.prototype.reset = function() {
                        function t(e) {
                            function t(e) {
                                return d[e] || e
                            }
                            return e.replace(/[^\u0000-\u007E]/g, t)
                        }

                        function n(i, o) {
                            if ("" === e.trim(i.term)) return o;
                            if (o.children && o.children.length > 0) {
                                for (var r = e.extend(!0, {}, o), s = o.children.length - 1; s >= 0; s--) null == n(i, o.children[s]) && r.children.splice(s, 1);
                                return r.children.length > 0 ? r : n(i, r)
                            }
                            var a = t(o.text).toUpperCase(),
                                l = t(i.term).toUpperCase();
                            return a.indexOf(l) > -1 ? o : null
                        }
                        this.defaults = {
                            amdBase: "./",
                            amdLanguageBase: "./i18n/",
                            closeOnSelect: !0,
                            debug: !1,
                            dropdownAutoWidth: !1,
                            escapeMarkup: c.escapeMarkup,
                            language: A,
                            matcher: n,
                            minimumInputLength: 0,
                            maximumInputLength: 0,
                            maximumSelectionLength: 0,
                            minimumResultsForSearch: 0,
                            selectOnClose: !1,
                            sorter: function(e) {
                                return e
                            },
                            templateResult: function(e) {
                                return e.text
                            },
                            templateSelection: function(e) {
                                return e.text
                            },
                            theme: "default",
                            width: "resolve"
                        }
                    }, D.prototype.set = function(t, n) {
                        var i = e.camelCase(t),
                            o = {};
                        o[i] = n;
                        var r = c._convertData(o);
                        e.extend(!0, this.defaults, r)
                    }, new D
                }), t.define("select2/options", ["require", "jquery", "./defaults", "./utils"], function(e, t, n, i) {
                    function o(t, o) {
                        if (this.options = t, null != o && this.fromElement(o), this.options = n.apply(this.options), o && o.is("input")) {
                            var r = e(this.get("amdBase") + "compat/inputData");
                            this.options.dataAdapter = i.Decorate(this.options.dataAdapter, r)
                        }
                    }
                    return o.prototype.fromElement = function(e) {
                        var n = ["select2"];
                        null == this.options.multiple && (this.options.multiple = e.prop("multiple")), null == this.options.disabled && (this.options.disabled = e.prop("disabled")), null == this.options.language && (e.prop("lang") ? this.options.language = e.prop("lang").toLowerCase() : e.closest("[lang]").prop("lang") && (this.options.language = e.closest("[lang]").prop("lang"))), null == this.options.dir && (e.prop("dir") ? this.options.dir = e.prop("dir") : e.closest("[dir]").prop("dir") ? this.options.dir = e.closest("[dir]").prop("dir") : this.options.dir = "ltr"), e.prop("disabled", this.options.disabled), e.prop("multiple", this.options.multiple), i.GetData(e[0], "select2Tags") && (this.options.debug && window.console && console.warn && console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'), i.StoreData(e[0], "data", i.GetData(e[0], "select2Tags")), i.StoreData(e[0], "tags", !0)), i.GetData(e[0], "ajaxUrl") && (this.options.debug && window.console && console.warn && console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."), e.attr("ajax--url", i.GetData(e[0], "ajaxUrl")), i.StoreData(e[0], "ajax-Url", i.GetData(e[0], "ajaxUrl")));
                        var o = {};
                        o = t.fn.jquery && "1." == t.fn.jquery.substr(0, 2) && e[0].dataset ? t.extend(!0, {}, e[0].dataset, i.GetData(e[0])) : i.GetData(e[0]);
                        var r = t.extend(!0, {}, o);
                        r = i._convertData(r);
                        for (var s in r) t.inArray(s, n) > -1 || (t.isPlainObject(this.options[s]) ? t.extend(this.options[s], r[s]) : this.options[s] = r[s]);
                        return this
                    }, o.prototype.get = function(e) {
                        return this.options[e]
                    }, o.prototype.set = function(e, t) {
                        this.options[e] = t
                    }, o
                }), t.define("select2/core", ["jquery", "./options", "./utils", "./keys"], function(e, t, n, i) {
                    var o = function(e, i) {
                        null != n.GetData(e[0], "select2") && n.GetData(e[0], "select2").destroy(), this.$element = e, this.id = this._generateId(e), i = i || {}, this.options = new t(i, e), o.__super__.constructor.call(this);
                        var r = e.attr("tabindex") || 0;
                        n.StoreData(e[0], "old-tabindex", r), e.attr("tabindex", "-1");
                        var s = this.options.get("dataAdapter");
                        this.dataAdapter = new s(e, this.options);
                        var a = this.render();
                        this._placeContainer(a);
                        var l = this.options.get("selectionAdapter");
                        this.selection = new l(e, this.options), this.$selection = this.selection.render(), this.selection.position(this.$selection, a);
                        var c = this.options.get("dropdownAdapter");
                        this.dropdown = new c(e, this.options), this.$dropdown = this.dropdown.render(), this.dropdown.position(this.$dropdown, a);
                        var u = this.options.get("resultsAdapter");
                        this.results = new u(e, this.options, this.dataAdapter), this.$results = this.results.render(), this.results.position(this.$results, this.$dropdown);
                        var d = this;
                        this._bindAdapters(), this._registerDomEvents(), this._registerDataEvents(), this._registerSelectionEvents(), this._registerDropdownEvents(), this._registerResultsEvents(), this._registerEvents(), this.dataAdapter.current(function(e) {
                            d.trigger("selection:update", {
                                data: e
                            })
                        }), e.addClass("select2-hidden-accessible"), e.attr("aria-hidden", "true"), this._syncAttributes(), n.StoreData(e[0], "select2", this), e.data("select2", this)
                    };
                    return n.Extend(o, n.Observable), o.prototype._generateId = function(e) {
                        var t = "";
                        return t = null != e.attr("id") ? e.attr("id") : null != e.attr("name") ? e.attr("name") + "-" + n.generateChars(2) : n.generateChars(4), t = t.replace(/(:|\.|\[|\]|,)/g, ""), t = "select2-" + t
                    }, o.prototype._placeContainer = function(e) {
                        e.insertAfter(this.$element);
                        var t = this._resolveWidth(this.$element, this.options.get("width"));
                        null != t && e.css("width", t)
                    }, o.prototype._resolveWidth = function(e, t) {
                        var n = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
                        if ("resolve" == t) {
                            var i = this._resolveWidth(e, "style");
                            return null != i ? i : this._resolveWidth(e, "element")
                        }
                        if ("element" == t) {
                            var o = e.outerWidth(!1);
                            return o <= 0 ? "auto" : o + "px"
                        }
                        if ("style" == t) {
                            var r = e.attr("style");
                            if ("string" != typeof r) return null;
                            for (var s = r.split(";"), a = 0, l = s.length; a < l; a += 1) {
                                var c = s[a].replace(/\s/g, ""),
                                    u = c.match(n);
                                if (null !== u && u.length >= 1) return u[1]
                            }
                            return null
                        }
                        return t
                    }, o.prototype._bindAdapters = function() {
                        this.dataAdapter.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container)
                    }, o.prototype._registerDomEvents = function() {
                        var t = this;
                        this.$element.on("change.select2", function() {
                            t.dataAdapter.current(function(e) {
                                t.trigger("selection:update", {
                                    data: e
                                })
                            })
                        }), this.$element.on("focus.select2", function(e) {
                            t.trigger("focus", e)
                        }), this._syncA = n.bind(this._syncAttributes, this), this._syncS = n.bind(this._syncSubtree, this), this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._syncA);
                        var i = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
                        null != i ? (this._observer = new i(function(n) {
                            e.each(n, t._syncA), e.each(n, t._syncS)
                        }), this._observer.observe(this.$element[0], {
                            attributes: !0,
                            childList: !0,
                            subtree: !1
                        })) : this.$element[0].addEventListener && (this.$element[0].addEventListener("DOMAttrModified", t._syncA, !1), this.$element[0].addEventListener("DOMNodeInserted", t._syncS, !1), this.$element[0].addEventListener("DOMNodeRemoved", t._syncS, !1))
                    }, o.prototype._registerDataEvents = function() {
                        var e = this;
                        this.dataAdapter.on("*", function(t, n) {
                            e.trigger(t, n)
                        })
                    }, o.prototype._registerSelectionEvents = function() {
                        var t = this,
                            n = ["toggle", "focus"];
                        this.selection.on("toggle", function() {
                            t.toggleDropdown()
                        }), this.selection.on("focus", function(e) {
                            t.focus(e)
                        }), this.selection.on("*", function(i, o) {
                            -1 === e.inArray(i, n) && t.trigger(i, o)
                        })
                    }, o.prototype._registerDropdownEvents = function() {
                        var e = this;
                        this.dropdown.on("*", function(t, n) {
                            e.trigger(t, n)
                        })
                    }, o.prototype._registerResultsEvents = function() {
                        var e = this;
                        this.results.on("*", function(t, n) {
                            e.trigger(t, n)
                        })
                    }, o.prototype._registerEvents = function() {
                        var e = this;
                        this.on("open", function() {
                            e.$container.addClass("select2-container--open")
                        }), this.on("close", function() {
                            e.$container.removeClass("select2-container--open")
                        }), this.on("enable", function() {
                            e.$container.removeClass("select2-container--disabled")
                        }), this.on("disable", function() {
                            e.$container.addClass("select2-container--disabled")
                        }), this.on("blur", function() {
                            e.$container.removeClass("select2-container--focus")
                        }), this.on("query", function(t) {
                            e.isOpen() || e.trigger("open", {}), this.dataAdapter.query(t, function(n) {
                                e.trigger("results:all", {
                                    data: n,
                                    query: t
                                })
                            })
                        }), this.on("query:append", function(t) {
                            this.dataAdapter.query(t, function(n) {
                                e.trigger("results:append", {
                                    data: n,
                                    query: t
                                })
                            })
                        }), this.on("keypress", function(t) {
                            var n = t.which;
                            e.isOpen() ? n === i.ESC || n === i.TAB || n === i.UP && t.altKey ? (e.close(), t.preventDefault()) : n === i.ENTER ? (e.trigger("results:select", {}), t.preventDefault()) : n === i.SPACE && t.ctrlKey ? (e.trigger("results:toggle", {}), t.preventDefault()) : n === i.UP ? (e.trigger("results:previous", {}), t.preventDefault()) : n === i.DOWN && (e.trigger("results:next", {}), t.preventDefault()) : (n === i.ENTER || n === i.SPACE || n === i.DOWN && t.altKey) && (e.open(), t.preventDefault())
                        })
                    }, o.prototype._syncAttributes = function() {
                        this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable", {})) : this.trigger("enable", {})
                    }, o.prototype._syncSubtree = function(e, t) {
                        var n = !1,
                            i = this;
                        if (!e || !e.target || "OPTION" === e.target.nodeName || "OPTGROUP" === e.target.nodeName) {
                            if (t)
                                if (t.addedNodes && t.addedNodes.length > 0)
                                    for (var o = 0; o < t.addedNodes.length; o++) {
                                        var r = t.addedNodes[o];
                                        r.selected && (n = !0)
                                    } else t.removedNodes && t.removedNodes.length > 0 && (n = !0);
                            else n = !0;
                            n && this.dataAdapter.current(function(e) {
                                i.trigger("selection:update", {
                                    data: e
                                })
                            })
                        }
                    }, o.prototype.trigger = function(e, t) {
                        var n = o.__super__.trigger,
                            i = {
                                open: "opening",
                                close: "closing",
                                select: "selecting",
                                unselect: "unselecting",
                                clear: "clearing"
                            };
                        if (void 0 === t && (t = {}), e in i) {
                            var r = i[e],
                                s = {
                                    prevented: !1,
                                    name: e,
                                    args: t
                                };
                            if (n.call(this, r, s), s.prevented) return void(t.prevented = !0)
                        }
                        n.call(this, e, t)
                    }, o.prototype.toggleDropdown = function() {
                        this.options.get("disabled") || (this.isOpen() ? this.close() : this.open())
                    }, o.prototype.open = function() {
                        this.isOpen() || this.trigger("query", {})
                    }, o.prototype.close = function() {
                        this.isOpen() && this.trigger("close", {})
                    }, o.prototype.isOpen = function() {
                        return this.$container.hasClass("select2-container--open")
                    }, o.prototype.hasFocus = function() {
                        return this.$container.hasClass("select2-container--focus")
                    }, o.prototype.focus = function(e) {
                        this.hasFocus() || (this.$container.addClass("select2-container--focus"), this.trigger("focus", {}))
                    }, o.prototype.enable = function(e) {
                        this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'), null != e && 0 !== e.length || (e = [!0]);
                        var t = !e[0];
                        this.$element.prop("disabled", t)
                    }, o.prototype.data = function() {
                        this.options.get("debug") && arguments.length > 0 && window.console && console.warn && console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
                        var e = [];
                        return this.dataAdapter.current(function(t) {
                            e = t
                        }), e
                    }, o.prototype.val = function(t) {
                        if (this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'), null == t || 0 === t.length) return this.$element.val();
                        var n = t[0];
                        e.isArray(n) && (n = e.map(n, function(e) {
                            return e.toString()
                        })), this.$element.val(n).trigger("change")
                    }, o.prototype.destroy = function() {
                        this.$container.remove(), this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._syncA), null != this._observer ? (this._observer.disconnect(), this._observer = null) : this.$element[0].removeEventListener && (this.$element[0].removeEventListener("DOMAttrModified", this._syncA, !1), this.$element[0].removeEventListener("DOMNodeInserted", this._syncS, !1), this.$element[0].removeEventListener("DOMNodeRemoved", this._syncS, !1)), this._syncA = null, this._syncS = null, this.$element.off(".select2"), this.$element.attr("tabindex", n.GetData(this.$element[0], "old-tabindex")), this.$element.removeClass("select2-hidden-accessible"), this.$element.attr("aria-hidden", "false"), n.RemoveData(this.$element[0]), this.$element.removeData("select2"), this.dataAdapter.destroy(), this.selection.destroy(), this.dropdown.destroy(), this.results.destroy(), this.dataAdapter = null, this.selection = null, this.dropdown = null, this.results = null
                    }, o.prototype.render = function() {
                        var t = e('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
                        return t.attr("dir", this.options.get("dir")), this.$container = t, this.$container.addClass("select2-container--" + this.options.get("theme")), n.StoreData(t[0], "element", this.$element), t
                    }, o
                }), t.define("select2/compat/utils", ["jquery"], function(e) {
                    function t(t, n, i) {
                        var o, r, s = [];
                        o = e.trim(t.attr("class")), o && (o = "" + o, e(o.split(/\s+/)).each(function() {
                            0 === this.indexOf("select2-") && s.push(this)
                        })), o = e.trim(n.attr("class")), o && (o = "" + o, e(o.split(/\s+/)).each(function() {
                            0 !== this.indexOf("select2-") && null != (r = i(this)) && s.push(r)
                        })), t.attr("class", s.join(" "))
                    }
                    return {
                        syncCssClasses: t
                    }
                }), t.define("select2/compat/containerCss", ["jquery", "./utils"], function(e, t) {
                    function n(e) {
                        return null
                    }

                    function i() {}
                    return i.prototype.render = function(i) {
                        var o = i.call(this),
                            r = this.options.get("containerCssClass") || "";
                        e.isFunction(r) && (r = r(this.$element));
                        var s = this.options.get("adaptContainerCssClass");
                        if (s = s || n, -1 !== r.indexOf(":all:")) {
                            r = r.replace(":all:", "");
                            var a = s;
                            s = function(e) {
                                var t = a(e);
                                return null != t ? t + " " + e : e
                            }
                        }
                        var l = this.options.get("containerCss") || {};
                        return e.isFunction(l) && (l = l(this.$element)), t.syncCssClasses(o, this.$element, s), o.css(l), o.addClass(r), o
                    }, i
                }), t.define("select2/compat/dropdownCss", ["jquery", "./utils"], function(e, t) {
                    function n(e) {
                        return null
                    }

                    function i() {}
                    return i.prototype.render = function(i) {
                        var o = i.call(this),
                            r = this.options.get("dropdownCssClass") || "";
                        e.isFunction(r) && (r = r(this.$element));
                        var s = this.options.get("adaptDropdownCssClass");
                        if (s = s || n, -1 !== r.indexOf(":all:")) {
                            r = r.replace(":all:", "");
                            var a = s;
                            s = function(e) {
                                var t = a(e);
                                return null != t ? t + " " + e : e
                            }
                        }
                        var l = this.options.get("dropdownCss") || {};
                        return e.isFunction(l) && (l = l(this.$element)), t.syncCssClasses(o, this.$element, s), o.css(l), o.addClass(r), o
                    }, i
                }), t.define("select2/compat/initSelection", ["jquery"], function(e) {
                    function t(e, t, n) {
                        n.get("debug") && window.console && console.warn && console.warn("Select2: The `initSelection` option has been deprecated in favor of a custom data adapter that overrides the `current` method. This method is now called multiple times instead of a single time when the instance is initialized. Support will be removed for the `initSelection` option in future versions of Select2"), this.initSelection = n.get("initSelection"), this._isInitialized = !1, e.call(this, t, n)
                    }
                    return t.prototype.current = function(t, n) {
                        var i = this;
                        if (this._isInitialized) return void t.call(this, n);
                        this.initSelection.call(null, this.$element, function(t) {
                            i._isInitialized = !0, e.isArray(t) || (t = [t]), n(t)
                        })
                    }, t
                }), t.define("select2/compat/inputData", ["jquery", "../utils"], function(e, t) {
                    function n(e, t, n) {
                        this._currentData = [], this._valueSeparator = n.get("valueSeparator") || ",", "hidden" === t.prop("type") && n.get("debug") && console && console.warn && console.warn("Select2: Using a hidden input with Select2 is no longer supported and may stop working in the future. It is recommended to use a `<select>` element instead."), e.call(this, t, n)
                    }
                    return n.prototype.current = function(t, n) {
                        function i(t, n) {
                            var o = [];
                            return t.selected || -1 !== e.inArray(t.id, n) ? (t.selected = !0, o.push(t)) : t.selected = !1, t.children && o.push.apply(o, i(t.children, n)), o
                        }
                        for (var o = [], r = 0; r < this._currentData.length; r++) {
                            var s = this._currentData[r];
                            o.push.apply(o, i(s, this.$element.val().split(this._valueSeparator)))
                        }
                        n(o)
                    }, n.prototype.select = function(t, n) {
                        if (this.options.get("multiple")) {
                            var i = this.$element.val();
                            i += this._valueSeparator + n.id, this.$element.val(i), this.$element.trigger("change")
                        } else this.current(function(t) {
                            e.map(t, function(e) {
                                e.selected = !1
                            })
                        }), this.$element.val(n.id), this.$element.trigger("change")
                    }, n.prototype.unselect = function(e, t) {
                        var n = this;
                        t.selected = !1, this.current(function(e) {
                            for (var i = [], o = 0; o < e.length; o++) {
                                var r = e[o];
                                t.id != r.id && i.push(r.id)
                            }
                            n.$element.val(i.join(n._valueSeparator)), n.$element.trigger("change")
                        })
                    }, n.prototype.query = function(e, t, n) {
                        for (var i = [], o = 0; o < this._currentData.length; o++) {
                            var r = this._currentData[o],
                                s = this.matches(t, r);
                            null !== s && i.push(s)
                        }
                        n({
                            results: i
                        })
                    }, n.prototype.addOptions = function(n, i) {
                        var o = e.map(i, function(e) {
                            return t.GetData(e[0], "data")
                        });
                        this._currentData.push.apply(this._currentData, o)
                    }, n
                }), t.define("select2/compat/matcher", ["jquery"], function(e) {
                    function t(t) {
                        function n(n, i) {
                            var o = e.extend(!0, {}, i);
                            if (null == n.term || "" === e.trim(n.term)) return o;
                            if (i.children) {
                                for (var r = i.children.length - 1; r >= 0; r--) {
                                    var s = i.children[r];
                                    t(n.term, s.text, s) || o.children.splice(r, 1)
                                }
                                if (o.children.length > 0) return o
                            }
                            return t(n.term, i.text, i) ? o : null
                        }
                        return n
                    }
                    return t
                }), t.define("select2/compat/query", [], function() {
                    function e(e, t, n) {
                        n.get("debug") && window.console && console.warn && console.warn("Select2: The `query` option has been deprecated in favor of a custom data adapter that overrides the `query` method. Support will be removed for the `query` option in future versions of Select2."), e.call(this, t, n)
                    }
                    return e.prototype.query = function(e, t, n) {
                        t.callback = n, this.options.get("query").call(null, t)
                    }, e
                }), t.define("select2/dropdown/attachContainer", [], function() {
                    function e(e, t, n) {
                        e.call(this, t, n)
                    }
                    return e.prototype.position = function(e, t, n) {
                        n.find(".dropdown-wrapper").append(t), t.addClass("select2-dropdown--below"), n.addClass("select2-container--below")
                    }, e
                }), t.define("select2/dropdown/stopPropagation", [], function() {
                    function e() {}
                    return e.prototype.bind = function(e, t, n) {
                        e.call(this, t, n);
                        var i = ["blur", "change", "click", "dblclick", "focus", "focusin", "focusout", "input", "keydown", "keyup", "keypress", "mousedown", "mouseenter", "mouseleave", "mousemove", "mouseover", "mouseup", "search", "touchend", "touchstart"];
                        this.$dropdown.on(i.join(" "), function(e) {
                            e.stopPropagation()
                        })
                    }, e
                }), t.define("select2/selection/stopPropagation", [], function() {
                    function e() {}
                    return e.prototype.bind = function(e, t, n) {
                        e.call(this, t, n);
                        var i = ["blur", "change", "click", "dblclick", "focus", "focusin", "focusout", "input", "keydown", "keyup", "keypress", "mousedown", "mouseenter", "mouseleave", "mousemove", "mouseover", "mouseup", "search", "touchend", "touchstart"];
                        this.$selection.on(i.join(" "), function(e) {
                            e.stopPropagation()
                        })
                    }, e
                }),
                    function(n) {
                        "function" == typeof t.define && t.define.amd ? t.define("jquery-mousewheel", ["jquery"], n) : "object" == typeof exports ? module.exports = n : n(e)
                    }(function(e) {
                        function t(t) {
                            var s = t || window.event,
                                a = l.call(arguments, 1),
                                c = 0,
                                d = 0,
                                h = 0,
                                p = 0,
                                f = 0,
                                m = 0;
                            if (t = e.event.fix(s), t.type = "mousewheel", "detail" in s && (h = -1 * s.detail), "wheelDelta" in s && (h = s.wheelDelta), "wheelDeltaY" in s && (h = s.wheelDeltaY), "wheelDeltaX" in s && (d = -1 * s.wheelDeltaX), "axis" in s && s.axis === s.HORIZONTAL_AXIS && (d = -1 * h, h = 0), c = 0 === h ? d : h, "deltaY" in s && (h = -1 * s.deltaY, c = h), "deltaX" in s && (d = s.deltaX, 0 === h && (c = -1 * d)), 0 !== h || 0 !== d) {
                                if (1 === s.deltaMode) {
                                    var g = e.data(this, "mousewheel-line-height");
                                    c *= g, h *= g, d *= g
                                } else if (2 === s.deltaMode) {
                                    var v = e.data(this, "mousewheel-page-height");
                                    c *= v, h *= v, d *= v
                                }
                                if (p = Math.max(Math.abs(h), Math.abs(d)), (!r || p < r) && (r = p, i(s, p) && (r /= 40)), i(s, p) && (c /= 40, d /= 40, h /= 40), c = Math[c >= 1 ? "floor" : "ceil"](c / r), d = Math[d >= 1 ? "floor" : "ceil"](d / r), h = Math[h >= 1 ? "floor" : "ceil"](h / r), u.settings.normalizeOffset && this.getBoundingClientRect) {
                                    var y = this.getBoundingClientRect();
                                    f = t.clientX - y.left, m = t.clientY - y.top
                                }
                                return t.deltaX = d, t.deltaY = h, t.deltaFactor = r, t.offsetX = f, t.offsetY = m, t.deltaMode = 0, a.unshift(t, c, d, h), o && clearTimeout(o), o = setTimeout(n, 200), (e.event.dispatch || e.event.handle).apply(this, a)
                            }
                        }

                        function n() {
                            r = null
                        }

                        function i(e, t) {
                            return u.settings.adjustOldDeltas && "mousewheel" === e.type && t % 120 == 0
                        }
                        var o, r, s = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
                            a = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
                            l = Array.prototype.slice;
                        if (e.event.fixHooks)
                            for (var c = s.length; c;) e.event.fixHooks[s[--c]] = e.event.mouseHooks;
                        var u = e.event.special.mousewheel = {
                            version: "3.1.12",
                            setup: function() {
                                if (this.addEventListener)
                                    for (var n = a.length; n;) this.addEventListener(a[--n], t, !1);
                                else this.onmousewheel = t;
                                e.data(this, "mousewheel-line-height", u.getLineHeight(this)), e.data(this, "mousewheel-page-height", u.getPageHeight(this))
                            },
                            teardown: function() {
                                if (this.removeEventListener)
                                    for (var n = a.length; n;) this.removeEventListener(a[--n], t, !1);
                                else this.onmousewheel = null;
                                e.removeData(this, "mousewheel-line-height"), e.removeData(this, "mousewheel-page-height")
                            },
                            getLineHeight: function(t) {
                                var n = e(t),
                                    i = n["offsetParent" in e.fn ? "offsetParent" : "parent"]();
                                return i.length || (i = e("body")), parseInt(i.css("fontSize"), 10) || parseInt(n.css("fontSize"), 10) || 16
                            },
                            getPageHeight: function(t) {
                                return e(t).height()
                            },
                            settings: {
                                adjustOldDeltas: !0,
                                normalizeOffset: !0
                            }
                        };
                        e.fn.extend({
                            mousewheel: function(e) {
                                return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
                            },
                            unmousewheel: function(e) {
                                return this.unbind("mousewheel", e)
                            }
                        })
                    }), t.define("jquery.select2", ["jquery", "jquery-mousewheel", "./select2/core", "./select2/defaults", "./select2/utils"], function(e, t, n, i, o) {
                    if (null == e.fn.select2) {
                        var r = ["open", "close", "destroy"];
                        e.fn.select2 = function(t) {
                            if ("object" == typeof(t = t || {})) return this.each(function() {
                                var i = e.extend(!0, {}, t);
                                new n(e(this), i)
                            }), this;
                            if ("string" == typeof t) {
                                var i, s = Array.prototype.slice.call(arguments, 1);
                                return this.each(function() {
                                    var e = o.GetData(this, "select2");
                                    null == e && window.console && console.error && console.error("The select2('" + t + "') method was called on an element that is not using Select2."), i = e[t].apply(e, s)
                                }), e.inArray(t, r) > -1 ? this : i
                            }
                            throw new Error("Invalid arguments for Select2: " + t)
                        }
                    }
                    return null == e.fn.select2.defaults && (e.fn.select2.defaults = i), n
                }), {
                    define: t.define,
                    require: t.require
                }
            }(),
            n = t.require("jquery.select2");
        return e.fn.select2.amd = t, n
    }),
    function(e, t) {
        "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.SimpleBar = t() : e.SimpleBar = t()
    }(this, function() {
        return function(e) {
            function t(i) {
                if (n[i]) return n[i].exports;
                var o = n[i] = {
                    i: i,
                    l: !1,
                    exports: {}
                };
                return e[i].call(o.exports, o, o.exports, t), o.l = !0, o.exports
            }
            var n = {};
            return t.m = e, t.c = n, t.d = function(e, n, i) {
                t.o(e, n) || Object.defineProperty(e, n, {
                    configurable: !1,
                    enumerable: !0,
                    get: i
                })
            }, t.n = function(e) {
                var n = e && e.__esModule ? function() {
                    return e.default
                } : function() {
                    return e
                };
                return t.d(n, "a", n), n
            }, t.o = function(e, t) {
                return Object.prototype.hasOwnProperty.call(e, t)
            }, t.p = "", t(t.s = 27)
        }([function(e, t, n) {
            var i = n(23)("wks"),
                o = n(12),
                r = n(1).Symbol,
                s = "function" == typeof r;
            (e.exports = function(e) {
                return i[e] || (i[e] = s && r[e] || (s ? r : o)("Symbol." + e))
            }).store = i
        }, function(e, t) {
            var n = e.exports = "undefined" != typeof window && window.Math == Math ? window : "undefined" != typeof self && self.Math == Math ? self : Function("return this")();
            "number" == typeof __g && (__g = n)
        }, function(e, t) {
            var n = {}.hasOwnProperty;
            e.exports = function(e, t) {
                return n.call(e, t)
            }
        }, function(e, t) {
            var n = e.exports = {
                version: "2.5.1"
            };
            "number" == typeof __e && (__e = n)
        }, function(e, t, n) {
            var i = n(5),
                o = n(11);
            e.exports = n(7) ? function(e, t, n) {
                return i.f(e, t, o(1, n))
            } : function(e, t, n) {
                return e[t] = n, e
            }
        }, function(e, t, n) {
            var i = n(6),
                o = n(33),
                r = n(34),
                s = Object.defineProperty;
            t.f = n(7) ? Object.defineProperty : function(e, t, n) {
                if (i(e), t = r(t, !0), i(n), o) try {
                    return s(e, t, n)
                } catch (e) {}
                if ("get" in n || "set" in n) throw TypeError("Accessors not supported!");
                return "value" in n && (e[t] = n.value), e
            }
        }, function(e, t, n) {
            var i = n(10);
            e.exports = function(e) {
                if (!i(e)) throw TypeError(e + " is not an object!");
                return e
            }
        }, function(e, t, n) {
            e.exports = !n(16)(function() {
                return 7 != Object.defineProperty({}, "a", {
                    get: function() {
                        return 7
                    }
                }).a
            })
        }, function(e, t) {
            var n = Math.ceil,
                i = Math.floor;
            e.exports = function(e) {
                return isNaN(e = +e) ? 0 : (e > 0 ? i : n)(e)
            }
        }, function(e, t) {
            e.exports = function(e) {
                if (void 0 == e) throw TypeError("Can't call method on  " + e);
                return e
            }
        }, function(e, t) {
            e.exports = function(e) {
                return "object" == typeof e ? null !== e : "function" == typeof e
            }
        }, function(e, t) {
            e.exports = function(e, t) {
                return {
                    enumerable: !(1 & e),
                    configurable: !(2 & e),
                    writable: !(4 & e),
                    value: t
                }
            }
        }, function(e, t) {
            var n = 0,
                i = Math.random();
            e.exports = function(e) {
                return "Symbol(".concat(void 0 === e ? "" : e, ")_", (++n + i).toString(36))
            }
        }, function(e, t) {
            e.exports = {}
        }, function(e, t, n) {
            var i = n(23)("keys"),
                o = n(12);
            e.exports = function(e) {
                return i[e] || (i[e] = o(e))
            }
        }, function(e, t, n) {
            var i = n(1),
                o = n(3),
                r = n(4),
                s = n(18),
                a = n(19),
                l = function(e, t, n) {
                    var c, u, d, h, p = e & l.F,
                        f = e & l.G,
                        m = e & l.S,
                        g = e & l.P,
                        v = e & l.B,
                        y = f ? i : m ? i[t] || (i[t] = {}) : (i[t] || {}).prototype,
                        b = f ? o : o[t] || (o[t] = {}),
                        w = b.prototype || (b.prototype = {});
                    f && (n = t);
                    for (c in n) u = !p && y && void 0 !== y[c], d = (u ? y : n)[c], h = v && u ? a(d, i) : g && "function" == typeof d ? a(Function.call, d) : d, y && s(y, c, d, e & l.U), b[c] != d && r(b, c, h), g && w[c] != d && (w[c] = d)
                };
            i.core = o, l.F = 1, l.G = 2, l.S = 4, l.P = 8, l.B = 16, l.W = 32, l.U = 64, l.R = 128, e.exports = l
        }, function(e, t) {
            e.exports = function(e) {
                try {
                    return !!e()
                } catch (e) {
                    return !0
                }
            }
        }, function(e, t, n) {
            var i = n(10),
                o = n(1).document,
                r = i(o) && i(o.createElement);
            e.exports = function(e) {
                return r ? o.createElement(e) : {}
            }
        }, function(e, t, n) {
            var i = n(1),
                o = n(4),
                r = n(2),
                s = n(12)("src"),
                a = Function.toString,
                l = ("" + a).split("toString");
            n(3).inspectSource = function(e) {
                return a.call(e)
            }, (e.exports = function(e, t, n, a) {
                var c = "function" == typeof n;
                c && (r(n, "name") || o(n, "name", t)), e[t] !== n && (c && (r(n, s) || o(n, s, e[t] ? "" + e[t] : l.join(String(t)))), e === i ? e[t] = n : a ? e[t] ? e[t] = n : o(e, t, n) : (delete e[t], o(e, t, n)))
            })(Function.prototype, "toString", function() {
                return "function" == typeof this && this[s] || a.call(this)
            })
        }, function(e, t, n) {
            var i = n(35);
            e.exports = function(e, t, n) {
                if (i(e), void 0 === t) return e;
                switch (n) {
                    case 1:
                        return function(n) {
                            return e.call(t, n)
                        };
                    case 2:
                        return function(n, i) {
                            return e.call(t, n, i)
                        };
                    case 3:
                        return function(n, i, o) {
                            return e.call(t, n, i, o)
                        }
                }
                return function() {
                    return e.apply(t, arguments)
                }
            }
        }, function(e, t, n) {
            var i = n(41),
                o = n(9);
            e.exports = function(e) {
                return i(o(e))
            }
        }, function(e, t) {
            var n = {}.toString;
            e.exports = function(e) {
                return n.call(e).slice(8, -1)
            }
        }, function(e, t, n) {
            var i = n(8),
                o = Math.min;
            e.exports = function(e) {
                return e > 0 ? o(i(e), 9007199254740991) : 0
            }
        }, function(e, t, n) {
            var i = n(1),
                o = i["__core-js_shared__"] || (i["__core-js_shared__"] = {});
            e.exports = function(e) {
                return o[e] || (o[e] = {})
            }
        }, function(e, t) {
            e.exports = "constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")
        }, function(e, t, n) {
            var i = n(5).f,
                o = n(2),
                r = n(0)("toStringTag");
            e.exports = function(e, t, n) {
                e && !o(e = n ? e : e.prototype, r) && i(e, r, {
                    configurable: !0,
                    value: t
                })
            }
        }, function(e, t, n) {
            var i = n(9);
            e.exports = function(e) {
                return Object(i(e))
            }
        }, function(e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }

            function o(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }

            function r(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            function s(e, t, n) {
                return t && r(e.prototype, t), n && r(e, n), e
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0, n(28);
            var a = i(n(53)),
                l = i(n(54)),
                c = i(n(56));
            n(57), Object.assign = n(58);
            var u = function() {
                function e(t, n) {
                    o(this, e), this.el = t, this.flashTimeout, this.contentEl, this.scrollContentEl, this.dragOffset = {
                        x: 0,
                        y: 0
                    }, this.isVisible = {
                        x: !0,
                        y: !0
                    }, this.scrollOffsetAttr = {
                        x: "scrollLeft",
                        y: "scrollTop"
                    }, this.sizeAttr = {
                        x: "offsetWidth",
                        y: "offsetHeight"
                    }, this.scrollSizeAttr = {
                        x: "scrollWidth",
                        y: "scrollHeight"
                    }, this.offsetAttr = {
                        x: "left",
                        y: "top"
                    }, this.globalObserver, this.mutationObserver, this.resizeObserver, this.currentAxis, this.isRtl, this.options = Object.assign({}, e.defaultOptions, n), this.classNames = this.options.classNames, this.scrollbarWidth = (0, a.default)(), this.offsetSize = 20, this.flashScrollbar = this.flashScrollbar.bind(this), this.onDragY = this.onDragY.bind(this), this.onDragX = this.onDragX.bind(this), this.onScrollY = this.onScrollY.bind(this), this.onScrollX = this.onScrollX.bind(this), this.drag = this.drag.bind(this), this.onEndDrag = this.onEndDrag.bind(this), this.onMouseEnter = this.onMouseEnter.bind(this), this.recalculate = (0, l.default)(this.recalculate, 100, {
                        leading: !0
                    }), this.init()
                }
                return s(e, [{
                    key: "init",
                    value: function() {
                        this.el.SimpleBar = this, this.initDOM(), this.scrollbarX = this.trackX.querySelector(".".concat(this.classNames.scrollbar)), this.scrollbarY = this.trackY.querySelector(".".concat(this.classNames.scrollbar)), this.isRtl = "rtl" === getComputedStyle(this.contentEl).direction, this.scrollContentEl.style[this.isRtl ? "paddingLeft" : "paddingRight"] = "".concat(this.scrollbarWidth || this.offsetSize, "px"), this.scrollContentEl.style.marginBottom = "-".concat(2 * this.scrollbarWidth || this.offsetSize, "px"), this.contentEl.style.paddingBottom = "".concat(this.scrollbarWidth || this.offsetSize, "px"), 0 !== this.scrollbarWidth && (this.contentEl.style[this.isRtl ? "marginLeft" : "marginRight"] = "-".concat(this.scrollbarWidth, "px")), this.recalculate(), this.initListeners()
                    }
                }, {
                    key: "initDOM",
                    value: function() {
                        var e = this;
                        if (Array.from(this.el.children).filter(function(t) {
                                return t.classList.contains(e.classNames.scrollContent)
                            }).length) this.trackX = this.el.querySelector(".".concat(this.classNames.track, ".horizontal")), this.trackY = this.el.querySelector(".".concat(this.classNames.track, ".vertical")), this.scrollContentEl = this.el.querySelector(".".concat(this.classNames.scrollContent)), this.contentEl = this.el.querySelector(".".concat(this.classNames.content));
                        else {
                            for (this.scrollContentEl = document.createElement("div"), this.contentEl = document.createElement("div"), this.scrollContentEl.classList.add(this.classNames.scrollContent), this.contentEl.classList.add(this.classNames.content); this.el.firstChild;) this.contentEl.appendChild(this.el.firstChild);
                            this.scrollContentEl.appendChild(this.contentEl), this.el.appendChild(this.scrollContentEl)
                        }
                        if (!this.trackX || !this.trackY) {
                            var t = document.createElement("div"),
                                n = document.createElement("div");
                            t.classList.add(this.classNames.track), n.classList.add(this.classNames.scrollbar), t.appendChild(n), this.trackX = t.cloneNode(!0), this.trackX.classList.add("horizontal"), this.trackY = t.cloneNode(!0), this.trackY.classList.add("vertical"), this.el.insertBefore(this.trackX, this.el.firstChild), this.el.insertBefore(this.trackY, this.el.firstChild)
                        }
                        this.el.setAttribute("data-simplebar", "init")
                    }
                }, {
                    key: "initListeners",
                    value: function() {
                        var e = this;
                        this.options.autoHide && this.el.addEventListener("mouseenter", this.onMouseEnter), this.scrollbarY.addEventListener("mousedown", this.onDragY), this.scrollbarX.addEventListener("mousedown", this.onDragX), this.scrollContentEl.addEventListener("scroll", this.onScrollY), this.contentEl.addEventListener("scroll", this.onScrollX), "undefined" != typeof MutationObserver && (this.mutationObserver = new MutationObserver(function(t) {
                            t.forEach(function(t) {
                                (e.isChildNode(t.target) || t.addedNodes.length) && e.recalculate()
                            })
                        }), this.mutationObserver.observe(this.el, {
                            attributes: !0,
                            childList: !0,
                            characterData: !0,
                            subtree: !0
                        })), this.resizeObserver = new c.default(this.recalculate.bind(this)), this.resizeObserver.observe(this.el)
                    }
                }, {
                    key: "removeListeners",
                    value: function() {
                        this.options.autoHide && this.el.removeEventListener("mouseenter", this.onMouseEnter), this.scrollbarX.removeEventListener("mousedown", this.onDragX), this.scrollbarY.removeEventListener("mousedown", this.onDragY), this.scrollContentEl.removeEventListener("scroll", this.onScrollY), this.contentEl.removeEventListener("scroll", this.onScrollX), this.mutationObserver.disconnect(), this.resizeObserver.disconnect()
                    }
                }, {
                    key: "onDragX",
                    value: function(e) {
                        this.onDrag(e, "x")
                    }
                }, {
                    key: "onDragY",
                    value: function(e) {
                        this.onDrag(e, "y")
                    }
                }, {
                    key: "onDrag",
                    value: function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "y";
                        e.preventDefault();
                        var n = "y" === t ? this.scrollbarY : this.scrollbarX,
                            i = "y" === t ? e.pageY : e.pageX;
                        this.dragOffset[t] = i - n.getBoundingClientRect()[this.offsetAttr[t]], this.currentAxis = t, document.addEventListener("mousemove", this.drag), document.addEventListener("mouseup", this.onEndDrag)
                    }
                }, {
                    key: "drag",
                    value: function(e) {
                        var t, n, i;
                        e.preventDefault(), "y" === this.currentAxis ? (t = e.pageY, n = this.trackY, i = this.scrollContentEl) : (t = e.pageX, n = this.trackX, i = this.contentEl);
                        var o = t - n.getBoundingClientRect()[this.offsetAttr[this.currentAxis]] - this.dragOffset[this.currentAxis],
                            r = o / n[this.sizeAttr[this.currentAxis]],
                            s = r * this.contentEl[this.scrollSizeAttr[this.currentAxis]];
                        i[this.scrollOffsetAttr[this.currentAxis]] = s
                    }
                }, {
                    key: "onEndDrag",
                    value: function() {
                        document.removeEventListener("mousemove", this.drag), document.removeEventListener("mouseup", this.onEndDrag)
                    }
                }, {
                    key: "resizeScrollbar",
                    value: function() {
                        var e, t, n, i, o, r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "y";
                        "x" === r ? (e = this.trackX, t = this.scrollbarX, n = this.contentEl[this.scrollOffsetAttr[r]], i = this.contentSizeX, o = this.scrollbarXSize) : (e = this.trackY, t = this.scrollbarY, n = this.scrollContentEl[this.scrollOffsetAttr[r]], i = this.contentSizeY, o = this.scrollbarYSize);
                        var s = o / i,
                            a = n / (i - o),
                            l = Math.max(~~(s * o), this.options.scrollbarMinSize),
                            c = ~~((o - l) * a);
                        this.isVisible[r] = o < i, this.isVisible[r] || this.options.forceVisible ? (e.style.visibility = "visible", this.options.forceVisible ? t.style.visibility = "hidden" : t.style.visibility = "visible", "x" === r ? (t.style.left = "".concat(c, "px"), t.style.width = "".concat(l, "px")) : (t.style.top = "".concat(c, "px"), t.style.height = "".concat(l, "px"))) : e.style.visibility = "hidden"
                    }
                }, {
                    key: "onScrollX",
                    value: function() {
                        this.flashScrollbar("x")
                    }
                }, {
                    key: "onScrollY",
                    value: function() {
                        this.flashScrollbar("y")
                    }
                }, {
                    key: "onMouseEnter",
                    value: function() {
                        this.flashScrollbar("x"), this.flashScrollbar("y")
                    }
                }, {
                    key: "flashScrollbar",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "y";
                        this.resizeScrollbar(e), this.showScrollbar(e)
                    }
                }, {
                    key: "showScrollbar",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "y";
                        this.isVisible[e] && ("x" === e ? this.scrollbarX.classList.add("visible") : this.scrollbarY.classList.add("visible"), this.options.autoHide && ("number" == typeof this.flashTimeout && window.clearTimeout(this.flashTimeout), this.flashTimeout = window.setTimeout(this.hideScrollbar.bind(this), 1e3)))
                    }
                }, {
                    key: "hideScrollbar",
                    value: function() {
                        this.scrollbarX.classList.remove("visible"), this.scrollbarY.classList.remove("visible"), "number" == typeof this.flashTimeout && window.clearTimeout(this.flashTimeout)
                    }
                }, {
                    key: "recalculate",
                    value: function() {
                        this.contentSizeX = this.contentEl[this.scrollSizeAttr.x], this.contentSizeY = this.contentEl[this.scrollSizeAttr.y] - (this.scrollbarWidth || this.offsetSize), this.scrollbarXSize = this.trackX[this.sizeAttr.x], this.scrollbarYSize = this.trackY[this.sizeAttr.y], this.resizeScrollbar("x"), this.resizeScrollbar("y"), this.options.autoHide || (this.showScrollbar("x"), this.showScrollbar("y"))
                    }
                }, {
                    key: "getScrollElement",
                    value: function() {
                        return "y" === (arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "y") ? this.scrollContentEl : this.contentEl
                    }
                }, {
                    key: "getContentElement",
                    value: function() {
                        return this.contentEl
                    }
                }, {
                    key: "unMount",
                    value: function() {
                        this.removeListeners(), this.el.SimpleBar = null
                    }
                }, {
                    key: "isChildNode",
                    value: function(e) {
                        return null !== e && (e === this.el || this.isChildNode(e.parentNode))
                    }
                }], [{
                    key: "initHtmlApi",
                    value: function() {
                        this.initDOMLoadedElements = this.initDOMLoadedElements.bind(this), "undefined" != typeof MutationObserver && (this.globalObserver = new MutationObserver(function(t) {
                            t.forEach(function(t) {
                                Array.from(t.addedNodes).forEach(function(t) {
                                    1 === t.nodeType && (t.hasAttribute("data-simplebar") ? !t.SimpleBar && new e(t, e.getElOptions(t)) : Array.from(t.querySelectorAll("[data-simplebar]")).forEach(function(t) {
                                        !t.SimpleBar && new e(t, e.getElOptions(t))
                                    }))
                                }), Array.from(t.removedNodes).forEach(function(e) {
                                    1 === e.nodeType && (e.hasAttribute("data-simplebar") ? e.SimpleBar && e.SimpleBar.unMount() : Array.from(e.querySelectorAll("[data-simplebar]")).forEach(function(e) {
                                        e.SimpleBar && e.SimpleBar.unMount()
                                    }))
                                })
                            })
                        }), this.globalObserver.observe(document, {
                            childList: !0,
                            subtree: !0
                        })), "complete" === document.readyState || "loading" !== document.readyState && !document.documentElement.doScroll ? window.setTimeout(this.initDOMLoadedElements.bind(this)) : (document.addEventListener("DOMContentLoaded", this.initDOMLoadedElements), window.addEventListener("load", this.initDOMLoadedElements))
                    }
                }, {
                    key: "getElOptions",
                    value: function(t) {
                        return Object.keys(e.htmlAttributes).reduce(function(n, i) {
                            var o = e.htmlAttributes[i];
                            return t.hasAttribute(o) && (n[i] = JSON.parse(t.getAttribute(o) || !0)), n
                        }, {})
                    }
                }, {
                    key: "removeObserver",
                    value: function() {
                        this.globalObserver.disconnect()
                    }
                }, {
                    key: "initDOMLoadedElements",
                    value: function() {
                        document.removeEventListener("DOMContentLoaded", this.initDOMLoadedElements), window.removeEventListener("load", this.initDOMLoadedElements), Array.from(document.querySelectorAll("[data-simplebar]")).forEach(function(t) {
                            t.SimpleBar || new e(t, e.getElOptions(t))
                        })
                    }
                }, {
                    key: "defaultOptions",
                    get: function() {
                        return {
                            autoHide: !0,
                            forceVisible: !1,
                            classNames: {
                                content: "simplebar-content",
                                scrollContent: "simplebar-scroll-content",
                                scrollbar: "simplebar-scrollbar",
                                track: "simplebar-track"
                            },
                            scrollbarMinSize: 25
                        }
                    }
                }, {
                    key: "htmlAttributes",
                    get: function() {
                        return {
                            autoHide: "data-simplebar-auto-hide",
                            forceVisible: "data-simplebar-force-visible",
                            scrollbarMinSize: "data-simplebar-scrollbar-min-size"
                        }
                    }
                }]), e
            }();
            t.default = u, u.initHtmlApi()
        }, function(e, t, n) {
            n(29), n(46), e.exports = n(3).Array.from
        }, function(e, t, n) {
            "use strict";
            var i = n(30)(!0);
            n(31)(String, "String", function(e) {
                this._t = String(e), this._i = 0
            }, function() {
                var e, t = this._t,
                    n = this._i;
                return n >= t.length ? {
                    value: void 0,
                    done: !0
                } : (e = i(t, n), this._i += e.length, {
                    value: e,
                    done: !1
                })
            })
        }, function(e, t, n) {
            var i = n(8),
                o = n(9);
            e.exports = function(e) {
                return function(t, n) {
                    var r, s, a = String(o(t)),
                        l = i(n),
                        c = a.length;
                    return l < 0 || l >= c ? e ? "" : void 0 : (r = a.charCodeAt(l), r < 55296 || r > 56319 || l + 1 === c || (s = a.charCodeAt(l + 1)) < 56320 || s > 57343 ? e ? a.charAt(l) : r : e ? a.slice(l, l + 2) : s - 56320 + (r - 55296 << 10) + 65536)
                }
            }
        }, function(e, t, n) {
            "use strict";
            var i = n(32),
                o = n(15),
                r = n(18),
                s = n(4),
                a = n(2),
                l = n(13),
                c = n(36),
                u = n(25),
                d = n(45),
                h = n(0)("iterator"),
                p = !([].keys && "next" in [].keys()),
                f = function() {
                    return this
                };
            e.exports = function(e, t, n, m, g, v, y) {
                c(n, t, m);
                var b, w, _, x = function(e) {
                        if (!p && e in k) return k[e];
                        switch (e) {
                            case "keys":
                            case "values":
                                return function() {
                                    return new n(this, e)
                                }
                        }
                        return function() {
                            return new n(this, e)
                        }
                    },
                    T = t + " Iterator",
                    S = "values" == g,
                    C = !1,
                    k = e.prototype,
                    E = k[h] || k["@@iterator"] || g && k[g],
                    A = E || x(g),
                    D = g ? S ? x("entries") : A : void 0,
                    O = "Array" == t ? k.entries || E : E;
                if (O && (_ = d(O.call(new e))) !== Object.prototype && _.next && (u(_, T, !0), i || a(_, h) || s(_, h, f)), S && E && "values" !== E.name && (C = !0, A = function() {
                        return E.call(this)
                    }), i && !y || !p && !C && k[h] || s(k, h, A), l[t] = A, l[T] = f, g)
                    if (b = {
                            values: S ? A : x("values"),
                            keys: v ? A : x("keys"),
                            entries: D
                        }, y)
                        for (w in b) w in k || r(k, w, b[w]);
                    else o(o.P + o.F * (p || C), t, b);
                return b
            }
        }, function(e, t) {
            e.exports = !1
        }, function(e, t, n) {
            e.exports = !n(7) && !n(16)(function() {
                return 7 != Object.defineProperty(n(17)("div"), "a", {
                    get: function() {
                        return 7
                    }
                }).a
            })
        }, function(e, t, n) {
            var i = n(10);
            e.exports = function(e, t) {
                if (!i(e)) return e;
                var n, o;
                if (t && "function" == typeof(n = e.toString) && !i(o = n.call(e))) return o;
                if ("function" == typeof(n = e.valueOf) && !i(o = n.call(e))) return o;
                if (!t && "function" == typeof(n = e.toString) && !i(o = n.call(e))) return o;
                throw TypeError("Can't convert object to primitive value")
            }
        }, function(e, t) {
            e.exports = function(e) {
                if ("function" != typeof e) throw TypeError(e + " is not a function!");
                return e
            }
        }, function(e, t, n) {
            "use strict";
            var i = n(37),
                o = n(11),
                r = n(25),
                s = {};
            n(4)(s, n(0)("iterator"), function() {
                return this
            }), e.exports = function(e, t, n) {
                e.prototype = i(s, {
                    next: o(1, n)
                }), r(e, t + " Iterator")
            }
        }, function(e, t, n) {
            var i = n(6),
                o = n(38),
                r = n(24),
                s = n(14)("IE_PROTO"),
                a = function() {},
                l = function() {
                    var e, t = n(17)("iframe"),
                        i = r.length;
                    for (t.style.display = "none", n(44).appendChild(t), t.src = "javascript:", e = t.contentWindow.document, e.open(), e.write("<script>document.F=Object<\/script>"), e.close(), l = e.F; i--;) delete l.prototype[r[i]];
                    return l()
                };
            e.exports = Object.create || function(e, t) {
                var n;
                return null !== e ? (a.prototype = i(e), n = new a, a.prototype = null, n[s] = e) : n = l(), void 0 === t ? n : o(n, t)
            }
        }, function(e, t, n) {
            var i = n(5),
                o = n(6),
                r = n(39);
            e.exports = n(7) ? Object.defineProperties : function(e, t) {
                o(e);
                for (var n, s = r(t), a = s.length, l = 0; a > l;) i.f(e, n = s[l++], t[n]);
                return e
            }
        }, function(e, t, n) {
            var i = n(40),
                o = n(24);
            e.exports = Object.keys || function(e) {
                return i(e, o)
            }
        }, function(e, t, n) {
            var i = n(2),
                o = n(20),
                r = n(42)(!1),
                s = n(14)("IE_PROTO");
            e.exports = function(e, t) {
                var n, a = o(e),
                    l = 0,
                    c = [];
                for (n in a) n != s && i(a, n) && c.push(n);
                for (; t.length > l;) i(a, n = t[l++]) && (~r(c, n) || c.push(n));
                return c
            }
        }, function(e, t, n) {
            var i = n(21);
            e.exports = Object("z").propertyIsEnumerable(0) ? Object : function(e) {
                return "String" == i(e) ? e.split("") : Object(e)
            }
        }, function(e, t, n) {
            var i = n(20),
                o = n(22),
                r = n(43);
            e.exports = function(e) {
                return function(t, n, s) {
                    var a, l = i(t),
                        c = o(l.length),
                        u = r(s, c);
                    if (e && n != n) {
                        for (; c > u;)
                            if ((a = l[u++]) != a) return !0
                    } else
                        for (; c > u; u++)
                            if ((e || u in l) && l[u] === n) return e || u || 0; return !e && -1
                }
            }
        }, function(e, t, n) {
            var i = n(8),
                o = Math.max,
                r = Math.min;
            e.exports = function(e, t) {
                return e = i(e), e < 0 ? o(e + t, 0) : r(e, t)
            }
        }, function(e, t, n) {
            var i = n(1).document;
            e.exports = i && i.documentElement
        }, function(e, t, n) {
            var i = n(2),
                o = n(26),
                r = n(14)("IE_PROTO"),
                s = Object.prototype;
            e.exports = Object.getPrototypeOf || function(e) {
                return e = o(e), i(e, r) ? e[r] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? s : null
            }
        }, function(e, t, n) {
            "use strict";
            var i = n(19),
                o = n(15),
                r = n(26),
                s = n(47),
                a = n(48),
                l = n(22),
                c = n(49),
                u = n(50);
            o(o.S + o.F * !n(52)(function(e) {
                Array.from(e)
            }), "Array", {
                from: function(e) {
                    var t, n, o, d, h = r(e),
                        p = "function" == typeof this ? this : Array,
                        f = arguments.length,
                        m = f > 1 ? arguments[1] : void 0,
                        g = void 0 !== m,
                        v = 0,
                        y = u(h);
                    if (g && (m = i(m, f > 2 ? arguments[2] : void 0, 2)), void 0 == y || p == Array && a(y))
                        for (t = l(h.length), n = new p(t); t > v; v++) c(n, v, g ? m(h[v], v) : h[v]);
                    else
                        for (d = y.call(h), n = new p; !(o = d.next()).done; v++) c(n, v, g ? s(d, m, [o.value, v], !0) : o.value);
                    return n.length = v, n
                }
            })
        }, function(e, t, n) {
            var i = n(6);
            e.exports = function(e, t, n, o) {
                try {
                    return o ? t(i(n)[0], n[1]) : t(n)
                } catch (t) {
                    var r = e.return;
                    throw void 0 !== r && i(r.call(e)), t
                }
            }
        }, function(e, t, n) {
            var i = n(13),
                o = n(0)("iterator"),
                r = Array.prototype;
            e.exports = function(e) {
                return void 0 !== e && (i.Array === e || r[o] === e)
            }
        }, function(e, t, n) {
            "use strict";
            var i = n(5),
                o = n(11);
            e.exports = function(e, t, n) {
                t in e ? i.f(e, t, o(0, n)) : e[t] = n
            }
        }, function(e, t, n) {
            var i = n(51),
                o = n(0)("iterator"),
                r = n(13);
            e.exports = n(3).getIteratorMethod = function(e) {
                if (void 0 != e) return e[o] || e["@@iterator"] || r[i(e)]
            }
        }, function(e, t, n) {
            var i = n(21),
                o = n(0)("toStringTag"),
                r = "Arguments" == i(function() {
                    return arguments
                }()),
                s = function(e, t) {
                    try {
                        return e[t]
                    } catch (e) {}
                };
            e.exports = function(e) {
                var t, n, a;
                return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(n = s(t = Object(e), o)) ? n : r ? i(t) : "Object" == (a = i(t)) && "function" == typeof t.callee ? "Arguments" : a
            }
        }, function(e, t, n) {
            var i = n(0)("iterator"),
                o = !1;
            try {
                var r = [7][i]();
                r.return = function() {
                    o = !0
                }, Array.from(r, function() {
                    throw 2
                })
            } catch (e) {}
            e.exports = function(e, t) {
                if (!t && !o) return !1;
                var n = !1;
                try {
                    var r = [7],
                        s = r[i]();
                    s.next = function() {
                        return {
                            done: n = !0
                        }
                    }, r[i] = function() {
                        return s
                    }, e(r)
                } catch (e) {}
                return n
            }
        }, function(e, t, n) {
            var i, o, r;
            ! function(n, s) {
                o = [], i = s, void 0 !== (r = "function" == typeof i ? i.apply(t, o) : i) && (e.exports = r)
            }(0, function() {
                "use strict";

                function e() {
                    if ("undefined" == typeof document) return 0;
                    var e, t = document.body,
                        n = document.createElement("div"),
                        i = n.style;
                    return i.position = "absolute", i.top = i.left = "-9999px", i.width = i.height = "100px", i.overflow = "scroll", t.appendChild(n), e = n.offsetWidth - n.clientWidth, t.removeChild(n), e
                }
                return e
            })
        }, function(e, t, n) {
            (function(t) {
                function n(e, t, n) {
                    function o(t) {
                        var n = m,
                            i = g;
                        return m = g = void 0, S = t, y = e.apply(i, n)
                    }

                    function r(e) {
                        return S = e, b = setTimeout(u, t), C ? o(e) : y
                    }

                    function l(e) {
                        var n = e - T,
                            i = e - S,
                            o = t - n;
                        return k ? _(o, v - i) : o
                    }

                    function c(e) {
                        var n = e - T,
                            i = e - S;
                        return void 0 === T || n >= t || n < 0 || k && i >= v
                    }

                    function u() {
                        var e = x();
                        if (c(e)) return d(e);
                        b = setTimeout(u, l(e))
                    }

                    function d(e) {
                        return b = void 0, E && m ? o(e) : (m = g = void 0, y)
                    }

                    function h() {
                        void 0 !== b && clearTimeout(b), S = 0, m = T = g = b = void 0
                    }

                    function p() {
                        return void 0 === b ? y : d(x())
                    }

                    function f() {
                        var e = x(),
                            n = c(e);
                        if (m = arguments, g = this, T = e, n) {
                            if (void 0 === b) return r(T);
                            if (k) return b = setTimeout(u, t), o(T)
                        }
                        return void 0 === b && (b = setTimeout(u, t)), y
                    }
                    var m, g, v, y, b, T, S = 0,
                        C = !1,
                        k = !1,
                        E = !0;
                    if ("function" != typeof e) throw new TypeError(a);
                    return t = s(t) || 0, i(n) && (C = !!n.leading, k = "maxWait" in n, v = k ? w(s(n.maxWait) || 0, t) : v, E = "trailing" in n ? !!n.trailing : E), f.cancel = h, f.flush = p, f
                }

                function i(e) {
                    var t = typeof e;
                    return !!e && ("object" == t || "function" == t)
                }

                function o(e) {
                    return !!e && "object" == typeof e
                }

                function r(e) {
                    return "symbol" == typeof e || o(e) && b.call(e) == c
                }

                function s(e) {
                    if ("number" == typeof e) return e;
                    if (r(e)) return l;
                    if (i(e)) {
                        var t = "function" == typeof e.valueOf ? e.valueOf() : e;
                        e = i(t) ? t + "" : t
                    }
                    if ("string" != typeof e) return 0 === e ? e : +e;
                    e = e.replace(u, "");
                    var n = h.test(e);
                    return n || p.test(e) ? f(e.slice(2), n ? 2 : 8) : d.test(e) ? l : +e
                }
                var a = "Expected a function",
                    l = NaN,
                    c = "[object Symbol]",
                    u = /^\s+|\s+$/g,
                    d = /^[-+]0x[0-9a-f]+$/i,
                    h = /^0b[01]+$/i,
                    p = /^0o[0-7]+$/i,
                    f = parseInt,
                    m = "object" == typeof t && t && t.Object === Object && t,
                    g = "object" == typeof self && self && self.Object === Object && self,
                    v = m || g || Function("return this")(),
                    y = Object.prototype,
                    b = y.toString,
                    w = Math.max,
                    _ = Math.min,
                    x = function() {
                        return v.Date.now()
                    };
                e.exports = n
            }).call(t, n(55))
        }, function(e, t) {
            var n;
            n = function() {
                return this
            }();
            try {
                n = n || Function("return this")() || (0, eval)("this")
            } catch (e) {
                "object" == typeof window && (n = window)
            }
            e.exports = n
        }, function(e, t, n) {
            "use strict";

            function i(e) {
                return parseFloat(e) || 0
            }

            function o(e) {
                return Array.prototype.slice.call(arguments, 1).reduce(function(t, n) {
                    return t + i(e["border-" + n + "-width"])
                }, 0)
            }

            function r(e) {
                for (var t = ["top", "right", "bottom", "left"], n = {}, o = 0, r = t; o < r.length; o += 1) {
                    var s = r[o],
                        a = e["padding-" + s];
                    n[s] = i(a)
                }
                return n
            }

            function s(e) {
                var t = e.getBBox();
                return d(0, 0, t.width, t.height)
            }

            function a(e) {
                var t = e.clientWidth,
                    n = e.clientHeight;
                if (!t && !n) return x;
                var s = getComputedStyle(e),
                    a = r(s),
                    c = a.left + a.right,
                    u = a.top + a.bottom,
                    h = i(s.width),
                    p = i(s.height);
                if ("border-box" === s.boxSizing && (Math.round(h + c) !== t && (h -= o(s, "left", "right") + c), Math.round(p + u) !== n && (p -= o(s, "top", "bottom") + u)), !l(e)) {
                    var f = Math.round(h + c) - t,
                        m = Math.round(p + u) - n;
                    1 !== Math.abs(f) && (h -= f), 1 !== Math.abs(m) && (p -= m)
                }
                return d(a.left, a.top, h, p)
            }

            function l(e) {
                return e === document.documentElement
            }

            function c(e) {
                return p ? T(e) ? s(e) : a(e) : x
            }

            function u(e) {
                var t = e.x,
                    n = e.y,
                    i = e.width,
                    o = e.height,
                    r = "undefined" != typeof DOMRectReadOnly ? DOMRectReadOnly : Object,
                    s = Object.create(r.prototype);
                return _(s, {
                    x: t,
                    y: n,
                    width: i,
                    height: o,
                    top: n,
                    right: t + i,
                    bottom: o + n,
                    left: t
                }), s
            }

            function d(e, t, n, i) {
                return {
                    x: e,
                    y: t,
                    width: n,
                    height: i
                }
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var h = function() {
                    function e(e, t) {
                        var n = -1;
                        return e.some(function(e, i) {
                            return e[0] === t && (n = i, !0)
                        }), n
                    }
                    return "undefined" != typeof Map ? Map : function() {
                        function t() {
                            this.__entries__ = []
                        }
                        var n = {
                            size: {}
                        };
                        return n.size.get = function() {
                            return this.__entries__.length
                        }, t.prototype.get = function(t) {
                            var n = e(this.__entries__, t),
                                i = this.__entries__[n];
                            return i && i[1]
                        }, t.prototype.set = function(t, n) {
                            var i = e(this.__entries__, t);
                            ~i ? this.__entries__[i][1] = n : this.__entries__.push([t, n])
                        }, t.prototype.delete = function(t) {
                            var n = this.__entries__,
                                i = e(n, t);
                            ~i && n.splice(i, 1)
                        }, t.prototype.has = function(t) {
                            return !!~e(this.__entries__, t)
                        }, t.prototype.clear = function() {
                            this.__entries__.splice(0)
                        }, t.prototype.forEach = function(e, t) {
                            void 0 === t && (t = null);
                            for (var n = 0, i = this.__entries__; n < i.length; n += 1) {
                                var o = i[n];
                                e.call(t, o[1], o[0])
                            }
                        }, Object.defineProperties(t.prototype, n), t
                    }()
                }(),
                p = "undefined" != typeof window && "undefined" != typeof document && window.document === document,
                f = function() {
                    return "function" == typeof requestAnimationFrame ? requestAnimationFrame : function(e) {
                        return setTimeout(function() {
                            return e(Date.now())
                        }, 1e3 / 60)
                    }
                }(),
                m = 2,
                g = function(e, t) {
                    function n() {
                        r && (r = !1, e()), s && o()
                    }

                    function i() {
                        f(n)
                    }

                    function o() {
                        var e = Date.now();
                        if (r) {
                            if (e - a < m) return;
                            s = !0
                        } else r = !0, s = !1, setTimeout(i, t);
                        a = e
                    }
                    var r = !1,
                        s = !1,
                        a = 0;
                    return o
                },
                v = ["top", "right", "bottom", "left", "width", "height", "size", "weight"],
                y = "undefined" != typeof navigator && /Trident\/.*rv:11/.test(navigator.userAgent),
                b = "undefined" != typeof MutationObserver && !y,
                w = function() {
                    this.connected_ = !1, this.mutationEventsAdded_ = !1, this.mutationsObserver_ = null, this.observers_ = [], this.onTransitionEnd_ = this.onTransitionEnd_.bind(this), this.refresh = g(this.refresh.bind(this), 20)
                };
            w.prototype.addObserver = function(e) {
                ~this.observers_.indexOf(e) || this.observers_.push(e), this.connected_ || this.connect_()
            }, w.prototype.removeObserver = function(e) {
                var t = this.observers_,
                    n = t.indexOf(e);
                ~n && t.splice(n, 1), !t.length && this.connected_ && this.disconnect_()
            }, w.prototype.refresh = function() {
                this.updateObservers_() && this.refresh()
            }, w.prototype.updateObservers_ = function() {
                var e = this.observers_.filter(function(e) {
                    return e.gatherActive(), e.hasActive()
                });
                return e.forEach(function(e) {
                    return e.broadcastActive()
                }), e.length > 0
            }, w.prototype.connect_ = function() {
                p && !this.connected_ && (document.addEventListener("transitionend", this.onTransitionEnd_), window.addEventListener("resize", this.refresh), b ? (this.mutationsObserver_ = new MutationObserver(this.refresh), this.mutationsObserver_.observe(document, {
                    attributes: !0,
                    childList: !0,
                    characterData: !0,
                    subtree: !0
                })) : (document.addEventListener("DOMSubtreeModified", this.refresh), this.mutationEventsAdded_ = !0), this.connected_ = !0)
            }, w.prototype.disconnect_ = function() {
                p && this.connected_ && (document.removeEventListener("transitionend", this.onTransitionEnd_), window.removeEventListener("resize", this.refresh), this.mutationsObserver_ && this.mutationsObserver_.disconnect(), this.mutationEventsAdded_ && document.removeEventListener("DOMSubtreeModified", this.refresh), this.mutationsObserver_ = null, this.mutationEventsAdded_ = !1, this.connected_ = !1)
            }, w.prototype.onTransitionEnd_ = function(e) {
                var t = e.propertyName;
                v.some(function(e) {
                    return !!~t.indexOf(e)
                }) && this.refresh()
            }, w.getInstance = function() {
                return this.instance_ || (this.instance_ = new w), this.instance_
            }, w.instance_ = null;
            var _ = function(e, t) {
                    for (var n = 0, i = Object.keys(t); n < i.length; n += 1) {
                        var o = i[n];
                        Object.defineProperty(e, o, {
                            value: t[o],
                            enumerable: !1,
                            writable: !1,
                            configurable: !0
                        })
                    }
                    return e
                },
                x = d(0, 0, 0, 0),
                T = function() {
                    return "undefined" != typeof SVGGraphicsElement ? function(e) {
                        return e instanceof SVGGraphicsElement
                    } : function(e) {
                        return e instanceof SVGElement && "function" == typeof e.getBBox
                    }
                }(),
                S = function(e) {
                    this.broadcastWidth = 0, this.broadcastHeight = 0, this.contentRect_ = d(0, 0, 0, 0), this.target = e
                };
            S.prototype.isActive = function() {
                var e = c(this.target);
                return this.contentRect_ = e, e.width !== this.broadcastWidth || e.height !== this.broadcastHeight
            }, S.prototype.broadcastRect = function() {
                var e = this.contentRect_;
                return this.broadcastWidth = e.width, this.broadcastHeight = e.height, e
            };
            var C = function(e, t) {
                    var n = u(t);
                    _(this, {
                        target: e,
                        contentRect: n
                    })
                },
                k = function(e, t, n) {
                    if ("function" != typeof e) throw new TypeError("The callback provided as parameter 1 is not a function.");
                    this.activeObservations_ = [], this.observations_ = new h, this.callback_ = e, this.controller_ = t, this.callbackCtx_ = n
                };
            k.prototype.observe = function(e) {
                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                if ("undefined" != typeof Element && Element instanceof Object) {
                    if (!(e instanceof Element)) throw new TypeError('parameter 1 is not of type "Element".');
                    var t = this.observations_;
                    t.has(e) || (t.set(e, new S(e)), this.controller_.addObserver(this), this.controller_.refresh())
                }
            }, k.prototype.unobserve = function(e) {
                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                if ("undefined" != typeof Element && Element instanceof Object) {
                    if (!(e instanceof Element)) throw new TypeError('parameter 1 is not of type "Element".');
                    var t = this.observations_;
                    t.has(e) && (t.delete(e), t.size || this.controller_.removeObserver(this))
                }
            }, k.prototype.disconnect = function() {
                this.clearActive(), this.observations_.clear(), this.controller_.removeObserver(this)
            }, k.prototype.gatherActive = function() {
                var e = this;
                this.clearActive(), this.observations_.forEach(function(t) {
                    t.isActive() && e.activeObservations_.push(t)
                })
            }, k.prototype.broadcastActive = function() {
                if (this.hasActive()) {
                    var e = this.callbackCtx_,
                        t = this.activeObservations_.map(function(e) {
                            return new C(e.target, e.broadcastRect())
                        });
                    this.callback_.call(e, t, e), this.clearActive()
                }
            }, k.prototype.clearActive = function() {
                this.activeObservations_.splice(0)
            }, k.prototype.hasActive = function() {
                return this.activeObservations_.length > 0
            };
            var E = "undefined" != typeof WeakMap ? new WeakMap : new h,
                A = function(e) {
                    if (!(this instanceof A)) throw new TypeError("Cannot call a class as a function");
                    if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                    var t = w.getInstance(),
                        n = new k(e, t, this);
                    E.set(this, n)
                };
            ["observe", "unobserve", "disconnect"].forEach(function(e) {
                A.prototype[e] = function() {
                    return (t = E.get(this))[e].apply(t, arguments);
                    var t
                }
            });
            var D = function() {
                return "undefined" != typeof ResizeObserver ? ResizeObserver : A
            }();
            t.default = D
        }, function(e, t) {}, function(e, t, n) {
            "use strict";

            function i(e) {
                if (null === e || void 0 === e) throw new TypeError("Object.assign cannot be called with null or undefined");
                return Object(e)
            }
            var o = Object.getOwnPropertySymbols,
                r = Object.prototype.hasOwnProperty,
                s = Object.prototype.propertyIsEnumerable;
            e.exports = function() {
                try {
                    if (!Object.assign) return !1;
                    var e = new String("abc");
                    if (e[5] = "de", "5" === Object.getOwnPropertyNames(e)[0]) return !1;
                    for (var t = {}, n = 0; n < 10; n++) t["_" + String.fromCharCode(n)] = n;
                    if ("0123456789" !== Object.getOwnPropertyNames(t).map(function(e) {
                            return t[e]
                        }).join("")) return !1;
                    var i = {};
                    return "abcdefghijklmnopqrst".split("").forEach(function(e) {
                        i[e] = e
                    }), "abcdefghijklmnopqrst" === Object.keys(Object.assign({}, i)).join("")
                } catch (e) {
                    return !1
                }
            }() ? Object.assign : function(e, t) {
                for (var n, a, l = i(e), c = 1; c < arguments.length; c++) {
                    n = Object(arguments[c]);
                    for (var u in n) r.call(n, u) && (l[u] = n[u]);
                    if (o) {
                        a = o(n);
                        for (var d = 0; d < a.length; d++) s.call(n, a[d]) && (l[a[d]] = n[a[d]])
                    }
                }
                return l
            }
        }]).default
    }),
    function(e) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], e) : "undefined" != typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
    }(function(e) {
        "use strict";
        var t = window.Slick || {};
        t = function() {
            function t(t, i) {
                var o, r = this;
                r.defaults = {
                    accessibility: !0,
                    adaptiveHeight: !1,
                    appendArrows: e(t),
                    appendDots: e(t),
                    arrows: !0,
                    asNavFor: null,
                    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                    nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                    autoplay: !1,
                    autoplaySpeed: 3e3,
                    centerMode: !1,
                    centerPadding: "50px",
                    cssEase: "ease",
                    customPaging: function(t, n) {
                        return e('<button type="button" />').text(n + 1)
                    },
                    dots: !1,
                    dotsClass: "slick-dots",
                    draggable: !0,
                    easing: "linear",
                    edgeFriction: .35,
                    fade: !1,
                    focusOnSelect: !1,
                    focusOnChange: !1,
                    infinite: !0,
                    initialSlide: 0,
                    lazyLoad: "ondemand",
                    mobileFirst: !1,
                    pauseOnHover: !0,
                    pauseOnFocus: !0,
                    pauseOnDotsHover: !1,
                    respondTo: "window",
                    responsive: null,
                    rows: 1,
                    rtl: !1,
                    slide: "",
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 500,
                    swipe: !0,
                    swipeToSlide: !1,
                    touchMove: !0,
                    touchThreshold: 5,
                    useCSS: !0,
                    useTransform: !0,
                    variableWidth: !1,
                    vertical: !1,
                    verticalSwiping: !1,
                    waitForAnimate: !0,
                    zIndex: 1e3
                }, r.initials = {
                    animating: !1,
                    dragging: !1,
                    autoPlayTimer: null,
                    currentDirection: 0,
                    currentLeft: null,
                    currentSlide: 0,
                    direction: 1,
                    $dots: null,
                    listWidth: null,
                    listHeight: null,
                    loadIndex: 0,
                    $nextArrow: null,
                    $prevArrow: null,
                    scrolling: !1,
                    slideCount: null,
                    slideWidth: null,
                    $slideTrack: null,
                    $slides: null,
                    sliding: !1,
                    slideOffset: 0,
                    swipeLeft: null,
                    swiping: !1,
                    $list: null,
                    touchObject: {},
                    transformsEnabled: !1,
                    unslicked: !1
                }, e.extend(r, r.initials), r.activeBreakpoint = null, r.animType = null, r.animProp = null, r.breakpoints = [], r.breakpointSettings = [], r.cssTransitions = !1, r.focussed = !1, r.interrupted = !1, r.hidden = "hidden", r.paused = !0, r.positionProp = null, r.respondTo = null, r.rowCount = 1, r.shouldClick = !0, r.$slider = e(t), r.$slidesCache = null, r.transformType = null, r.transitionType = null, r.visibilityChange = "visibilitychange", r.windowWidth = 0, r.windowTimer = null, o = e(t).data("slick") || {}, r.options = e.extend({}, r.defaults, i, o), r.currentSlide = r.options.initialSlide, r.originalSettings = r.options, void 0 !== document.mozHidden ? (r.hidden = "mozHidden", r.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (r.hidden = "webkitHidden", r.visibilityChange = "webkitvisibilitychange"), r.autoPlay = e.proxy(r.autoPlay, r), r.autoPlayClear = e.proxy(r.autoPlayClear, r), r.autoPlayIterator = e.proxy(r.autoPlayIterator, r), r.changeSlide = e.proxy(r.changeSlide, r), r.clickHandler = e.proxy(r.clickHandler, r), r.selectHandler = e.proxy(r.selectHandler, r), r.setPosition = e.proxy(r.setPosition, r), r.swipeHandler = e.proxy(r.swipeHandler, r), r.dragHandler = e.proxy(r.dragHandler, r), r.keyHandler = e.proxy(r.keyHandler, r), r.instanceUid = n++, r.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, r.registerBreakpoints(), r.init(!0)
            }
            var n = 0;
            return t
        }(), t.prototype.activateADA = function() {
            this.$slideTrack.find(".slick-active").attr({
                "aria-hidden": "false"
            }).find("a, input, button, select").attr({
                tabindex: "0"
            })
        }, t.prototype.addSlide = t.prototype.slickAdd = function(t, n, i) {
            var o = this;
            if ("boolean" == typeof n) i = n, n = null;
            else if (n < 0 || n >= o.slideCount) return !1;
            o.unload(), "number" == typeof n ? 0 === n && 0 === o.$slides.length ? e(t).appendTo(o.$slideTrack) : i ? e(t).insertBefore(o.$slides.eq(n)) : e(t).insertAfter(o.$slides.eq(n)) : !0 === i ? e(t).prependTo(o.$slideTrack) : e(t).appendTo(o.$slideTrack), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slides.each(function(t, n) {
                e(n).attr("data-slick-index", t)
            }), o.$slidesCache = o.$slides, o.reinit()
        }, t.prototype.animateHeight = function() {
            var e = this;
            if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
                var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
                e.$list.animate({
                    height: t
                }, e.options.speed)
            }
        }, t.prototype.animateSlide = function(t, n) {
            var i = {},
                o = this;
            o.animateHeight(), !0 === o.options.rtl && !1 === o.options.vertical && (t = -t), !1 === o.transformsEnabled ? !1 === o.options.vertical ? o.$slideTrack.animate({
                left: t
            }, o.options.speed, o.options.easing, n) : o.$slideTrack.animate({
                top: t
            }, o.options.speed, o.options.easing, n) : !1 === o.cssTransitions ? (!0 === o.options.rtl && (o.currentLeft = -o.currentLeft), e({
                animStart: o.currentLeft
            }).animate({
                animStart: t
            }, {
                duration: o.options.speed,
                easing: o.options.easing,
                step: function(e) {
                    e = Math.ceil(e), !1 === o.options.vertical ? (i[o.animType] = "translate(" + e + "px, 0px)", o.$slideTrack.css(i)) : (i[o.animType] = "translate(0px," + e + "px)", o.$slideTrack.css(i))
                },
                complete: function() {
                    n && n.call()
                }
            })) : (o.applyTransition(), t = Math.ceil(t), !1 === o.options.vertical ? i[o.animType] = "translate3d(" + t + "px, 0px, 0px)" : i[o.animType] = "translate3d(0px," + t + "px, 0px)", o.$slideTrack.css(i), n && setTimeout(function() {
                o.disableTransition(), n.call()
            }, o.options.speed))
        },
            t.prototype.getNavTarget = function() {
                var t = this,
                    n = t.options.asNavFor;
                return n && null !== n && (n = e(n).not(t.$slider)), n
            }, t.prototype.asNavFor = function(t) {
            var n = this,
                i = n.getNavTarget();
            null !== i && "object" == typeof i && i.each(function() {
                var n = e(this).slick("getSlick");
                n.unslicked || n.slideHandler(t, !0)
            })
        }, t.prototype.applyTransition = function(e) {
            var t = this,
                n = {};
            !1 === t.options.fade ? n[t.transitionType] = t.transformType + " " + t.options.speed + "ms " + t.options.cssEase : n[t.transitionType] = "opacity " + t.options.speed + "ms " + t.options.cssEase, !1 === t.options.fade ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n)
        }, t.prototype.autoPlay = function() {
            var e = this;
            e.autoPlayClear(), e.slideCount > e.options.slidesToShow && (e.autoPlayTimer = setInterval(e.autoPlayIterator, e.options.autoplaySpeed))
        }, t.prototype.autoPlayClear = function() {
            var e = this;
            e.autoPlayTimer && clearInterval(e.autoPlayTimer)
        }, t.prototype.autoPlayIterator = function() {
            var e = this,
                t = e.currentSlide + e.options.slidesToScroll;
            e.paused || e.interrupted || e.focussed || (!1 === e.options.infinite && (1 === e.direction && e.currentSlide + 1 === e.slideCount - 1 ? e.direction = 0 : 0 === e.direction && (t = e.currentSlide - e.options.slidesToScroll, e.currentSlide - 1 == 0 && (e.direction = 1))), e.slideHandler(t))
        }, t.prototype.buildArrows = function() {
            var t = this;
            !0 === t.options.arrows && (t.$prevArrow = e(t.options.prevArrow).addClass("slick-arrow"), t.$nextArrow = e(t.options.nextArrow).addClass("slick-arrow"), t.slideCount > t.options.slidesToShow ? (t.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.prependTo(t.options.appendArrows), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.appendTo(t.options.appendArrows), !0 !== t.options.infinite && t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : t.$prevArrow.add(t.$nextArrow).addClass("slick-hidden").attr({
                "aria-disabled": "true",
                tabindex: "-1"
            }))
        }, t.prototype.buildDots = function() {
            var t, n, i = this;
            if (!0 === i.options.dots) {
                for (i.$slider.addClass("slick-dotted"), n = e("<ul />").addClass(i.options.dotsClass), t = 0; t <= i.getDotCount(); t += 1) n.append(e("<li />").append(i.options.customPaging.call(this, i, t)));
                i.$dots = n.appendTo(i.options.appendDots), i.$dots.find("li").first().addClass("slick-active")
            }
        }, t.prototype.buildOut = function() {
            var t = this;
            t.$slides = t.$slider.children(t.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), t.slideCount = t.$slides.length, t.$slides.each(function(t, n) {
                e(n).attr("data-slick-index", t).data("originalStyling", e(n).attr("style") || "")
            }), t.$slider.addClass("slick-slider"), t.$slideTrack = 0 === t.slideCount ? e('<div class="slick-track"/>').appendTo(t.$slider) : t.$slides.wrapAll('<div class="slick-track"/>').parent(), t.$list = t.$slideTrack.wrap('<div class="slick-list"/>').parent(), t.$slideTrack.css("opacity", 0), !0 !== t.options.centerMode && !0 !== t.options.swipeToSlide || (t.options.slidesToScroll = 1), e("img[data-lazy]", t.$slider).not("[src]").addClass("slick-loading"), t.setupInfinite(), t.buildArrows(), t.buildDots(), t.updateDots(), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), !0 === t.options.draggable && t.$list.addClass("draggable")
        }, t.prototype.buildRows = function() {
            var e, t, n, i, o, r, s, a = this;
            if (i = document.createDocumentFragment(), r = a.$slider.children(), a.options.rows > 1) {
                for (s = a.options.slidesPerRow * a.options.rows, o = Math.ceil(r.length / s), e = 0; e < o; e++) {
                    var l = document.createElement("div");
                    for (t = 0; t < a.options.rows; t++) {
                        var c = document.createElement("div");
                        for (n = 0; n < a.options.slidesPerRow; n++) {
                            var u = e * s + (t * a.options.slidesPerRow + n);
                            r.get(u) && c.appendChild(r.get(u))
                        }
                        l.appendChild(c)
                    }
                    i.appendChild(l)
                }
                a.$slider.empty().append(i), a.$slider.children().children().children().css({
                    width: 100 / a.options.slidesPerRow + "%",
                    display: "inline-block"
                })
            }
        }, t.prototype.checkResponsive = function(t, n) {
            var i, o, r, s = this,
                a = !1,
                l = s.$slider.width(),
                c = window.innerWidth || e(window).width();
            if ("window" === s.respondTo ? r = c : "slider" === s.respondTo ? r = l : "min" === s.respondTo && (r = Math.min(c, l)), s.options.responsive && s.options.responsive.length && null !== s.options.responsive) {
                o = null;
                for (i in s.breakpoints) s.breakpoints.hasOwnProperty(i) && (!1 === s.originalSettings.mobileFirst ? r < s.breakpoints[i] && (o = s.breakpoints[i]) : r > s.breakpoints[i] && (o = s.breakpoints[i]));
                null !== o ? null !== s.activeBreakpoint ? (o !== s.activeBreakpoint || n) && (s.activeBreakpoint = o, "unslick" === s.breakpointSettings[o] ? s.unslick(o) : (s.options = e.extend({}, s.originalSettings, s.breakpointSettings[o]), !0 === t && (s.currentSlide = s.options.initialSlide), s.refresh(t)), a = o) : (s.activeBreakpoint = o, "unslick" === s.breakpointSettings[o] ? s.unslick(o) : (s.options = e.extend({}, s.originalSettings, s.breakpointSettings[o]), !0 === t && (s.currentSlide = s.options.initialSlide), s.refresh(t)), a = o) : null !== s.activeBreakpoint && (s.activeBreakpoint = null, s.options = s.originalSettings, !0 === t && (s.currentSlide = s.options.initialSlide), s.refresh(t), a = o), t || !1 === a || s.$slider.trigger("breakpoint", [s, a])
            }
        }, t.prototype.changeSlide = function(t, n) {
            var i, o, r, s = this,
                a = e(t.currentTarget);
            switch (a.is("a") && t.preventDefault(), a.is("li") || (a = a.closest("li")), r = s.slideCount % s.options.slidesToScroll != 0, i = r ? 0 : (s.slideCount - s.currentSlide) % s.options.slidesToScroll, t.data.message) {
                case "previous":
                    o = 0 === i ? s.options.slidesToScroll : s.options.slidesToShow - i, s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide - o, !1, n);
                    break;
                case "next":
                    o = 0 === i ? s.options.slidesToScroll : i, s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide + o, !1, n);
                    break;
                case "index":
                    var l = 0 === t.data.index ? 0 : t.data.index || a.index() * s.options.slidesToScroll;
                    s.slideHandler(s.checkNavigable(l), !1, n), a.children().trigger("focus");
                    break;
                default:
                    return
            }
        }, t.prototype.checkNavigable = function(e) {
            var t, n, i = this;
            if (t = i.getNavigableIndexes(), n = 0, e > t[t.length - 1]) e = t[t.length - 1];
            else
                for (var o in t) {
                    if (e < t[o]) {
                        e = n;
                        break
                    }
                    n = t[o]
                }
            return e
        }, t.prototype.cleanUpEvents = function() {
            var t = this;
            t.options.dots && null !== t.$dots && (e("li", t.$dots).off("click.slick", t.changeSlide).off("mouseenter.slick", e.proxy(t.interrupt, t, !0)).off("mouseleave.slick", e.proxy(t.interrupt, t, !1)), !0 === t.options.accessibility && t.$dots.off("keydown.slick", t.keyHandler)), t.$slider.off("focus.slick blur.slick"), !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow && t.$prevArrow.off("click.slick", t.changeSlide), t.$nextArrow && t.$nextArrow.off("click.slick", t.changeSlide), !0 === t.options.accessibility && (t.$prevArrow && t.$prevArrow.off("keydown.slick", t.keyHandler), t.$nextArrow && t.$nextArrow.off("keydown.slick", t.keyHandler))), t.$list.off("touchstart.slick mousedown.slick", t.swipeHandler), t.$list.off("touchmove.slick mousemove.slick", t.swipeHandler), t.$list.off("touchend.slick mouseup.slick", t.swipeHandler), t.$list.off("touchcancel.slick mouseleave.slick", t.swipeHandler), t.$list.off("click.slick", t.clickHandler), e(document).off(t.visibilityChange, t.visibility), t.cleanUpSlideEvents(), !0 === t.options.accessibility && t.$list.off("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().off("click.slick", t.selectHandler), e(window).off("orientationchange.slick.slick-" + t.instanceUid, t.orientationChange), e(window).off("resize.slick.slick-" + t.instanceUid, t.resize), e("[draggable!=true]", t.$slideTrack).off("dragstart", t.preventDefault), e(window).off("load.slick.slick-" + t.instanceUid, t.setPosition)
        }, t.prototype.cleanUpSlideEvents = function() {
            var t = this;
            t.$list.off("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.off("mouseleave.slick", e.proxy(t.interrupt, t, !1))
        }, t.prototype.cleanUpRows = function() {
            var e, t = this;
            t.options.rows > 1 && (e = t.$slides.children().children(), e.removeAttr("style"), t.$slider.empty().append(e))
        }, t.prototype.clickHandler = function(e) {
            !1 === this.shouldClick && (e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault())
        }, t.prototype.destroy = function(t) {
            var n = this;
            n.autoPlayClear(), n.touchObject = {}, n.cleanUpEvents(), e(".slick-cloned", n.$slider).detach(), n.$dots && n.$dots.remove(), n.$prevArrow && n.$prevArrow.length && (n.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), n.htmlExpr.test(n.options.prevArrow) && n.$prevArrow.remove()), n.$nextArrow && n.$nextArrow.length && (n.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), n.htmlExpr.test(n.options.nextArrow) && n.$nextArrow.remove()), n.$slides && (n.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
                e(this).attr("style", e(this).data("originalStyling"))
            }), n.$slideTrack.children(this.options.slide).detach(), n.$slideTrack.detach(), n.$list.detach(), n.$slider.append(n.$slides)), n.cleanUpRows(), n.$slider.removeClass("slick-slider"), n.$slider.removeClass("slick-initialized"), n.$slider.removeClass("slick-dotted"), n.unslicked = !0, t || n.$slider.trigger("destroy", [n])
        }, t.prototype.disableTransition = function(e) {
            var t = this,
                n = {};
            n[t.transitionType] = "", !1 === t.options.fade ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n)
        }, t.prototype.fadeSlide = function(e, t) {
            var n = this;
            !1 === n.cssTransitions ? (n.$slides.eq(e).css({
                zIndex: n.options.zIndex
            }), n.$slides.eq(e).animate({
                opacity: 1
            }, n.options.speed, n.options.easing, t)) : (n.applyTransition(e), n.$slides.eq(e).css({
                opacity: 1,
                zIndex: n.options.zIndex
            }), t && setTimeout(function() {
                n.disableTransition(e), t.call()
            }, n.options.speed))
        }, t.prototype.fadeSlideOut = function(e) {
            var t = this;
            !1 === t.cssTransitions ? t.$slides.eq(e).animate({
                opacity: 0,
                zIndex: t.options.zIndex - 2
            }, t.options.speed, t.options.easing) : (t.applyTransition(e), t.$slides.eq(e).css({
                opacity: 0,
                zIndex: t.options.zIndex - 2
            }))
        }, t.prototype.filterSlides = t.prototype.slickFilter = function(e) {
            var t = this;
            null !== e && (t.$slidesCache = t.$slides, t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.filter(e).appendTo(t.$slideTrack), t.reinit())
        }, t.prototype.focusHandler = function() {
            var t = this;
            t.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function(n) {
                n.stopImmediatePropagation();
                var i = e(this);
                setTimeout(function() {
                    t.options.pauseOnFocus && (t.focussed = i.is(":focus"), t.autoPlay())
                }, 0)
            })
        }, t.prototype.getCurrent = t.prototype.slickCurrentSlide = function() {
            return this.currentSlide
        }, t.prototype.getDotCount = function() {
            var e = this,
                t = 0,
                n = 0,
                i = 0;
            if (!0 === e.options.infinite)
                if (e.slideCount <= e.options.slidesToShow) ++i;
                else
                    for (; t < e.slideCount;) ++i, t = n + e.options.slidesToScroll, n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
            else if (!0 === e.options.centerMode) i = e.slideCount;
            else if (e.options.asNavFor)
                for (; t < e.slideCount;) ++i, t = n + e.options.slidesToScroll, n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
            else i = 1 + Math.ceil((e.slideCount - e.options.slidesToShow) / e.options.slidesToScroll);
            return i - 1
        }, t.prototype.getLeft = function(e) {
            var t, n, i, o, r = this,
                s = 0;
            return r.slideOffset = 0, n = r.$slides.first().outerHeight(!0), !0 === r.options.infinite ? (r.slideCount > r.options.slidesToShow && (r.slideOffset = r.slideWidth * r.options.slidesToShow * -1, o = -1, !0 === r.options.vertical && !0 === r.options.centerMode && (2 === r.options.slidesToShow ? o = -1.5 : 1 === r.options.slidesToShow && (o = -2)), s = n * r.options.slidesToShow * o), r.slideCount % r.options.slidesToScroll != 0 && e + r.options.slidesToScroll > r.slideCount && r.slideCount > r.options.slidesToShow && (e > r.slideCount ? (r.slideOffset = (r.options.slidesToShow - (e - r.slideCount)) * r.slideWidth * -1, s = (r.options.slidesToShow - (e - r.slideCount)) * n * -1) : (r.slideOffset = r.slideCount % r.options.slidesToScroll * r.slideWidth * -1, s = r.slideCount % r.options.slidesToScroll * n * -1))) : e + r.options.slidesToShow > r.slideCount && (r.slideOffset = (e + r.options.slidesToShow - r.slideCount) * r.slideWidth, s = (e + r.options.slidesToShow - r.slideCount) * n), r.slideCount <= r.options.slidesToShow && (r.slideOffset = 0, s = 0), !0 === r.options.centerMode && r.slideCount <= r.options.slidesToShow ? r.slideOffset = r.slideWidth * Math.floor(r.options.slidesToShow) / 2 - r.slideWidth * r.slideCount / 2 : !0 === r.options.centerMode && !0 === r.options.infinite ? r.slideOffset += r.slideWidth * Math.floor(r.options.slidesToShow / 2) - r.slideWidth : !0 === r.options.centerMode && (r.slideOffset = 0, r.slideOffset += r.slideWidth * Math.floor(r.options.slidesToShow / 2)), t = !1 === r.options.vertical ? e * r.slideWidth * -1 + r.slideOffset : e * n * -1 + s, !0 === r.options.variableWidth && (i = r.slideCount <= r.options.slidesToShow || !1 === r.options.infinite ? r.$slideTrack.children(".slick-slide").eq(e) : r.$slideTrack.children(".slick-slide").eq(e + r.options.slidesToShow), t = !0 === r.options.rtl ? i[0] ? -1 * (r.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0 : i[0] ? -1 * i[0].offsetLeft : 0, !0 === r.options.centerMode && (i = r.slideCount <= r.options.slidesToShow || !1 === r.options.infinite ? r.$slideTrack.children(".slick-slide").eq(e) : r.$slideTrack.children(".slick-slide").eq(e + r.options.slidesToShow + 1), t = !0 === r.options.rtl ? i[0] ? -1 * (r.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0 : i[0] ? -1 * i[0].offsetLeft : 0, t += (r.$list.width() - i.outerWidth()) / 2)), t
        }, t.prototype.getOption = t.prototype.slickGetOption = function(e) {
            return this.options[e]
        }, t.prototype.getNavigableIndexes = function() {
            var e, t = this,
                n = 0,
                i = 0,
                o = [];
            for (!1 === t.options.infinite ? e = t.slideCount : (n = -1 * t.options.slidesToScroll, i = -1 * t.options.slidesToScroll, e = 2 * t.slideCount); n < e;) o.push(n), n = i + t.options.slidesToScroll, i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
            return o
        }, t.prototype.getSlick = function() {
            return this
        }, t.prototype.getSlideCount = function() {
            var t, n, i = this;
            return n = !0 === i.options.centerMode ? i.slideWidth * Math.floor(i.options.slidesToShow / 2) : 0, !0 === i.options.swipeToSlide ? (i.$slideTrack.find(".slick-slide").each(function(o, r) {
                if (r.offsetLeft - n + e(r).outerWidth() / 2 > -1 * i.swipeLeft) return t = r, !1
            }), Math.abs(e(t).attr("data-slick-index") - i.currentSlide) || 1) : i.options.slidesToScroll
        }, t.prototype.goTo = t.prototype.slickGoTo = function(e, t) {
            this.changeSlide({
                data: {
                    message: "index",
                    index: parseInt(e)
                }
            }, t)
        }, t.prototype.init = function(t) {
            var n = this;
            e(n.$slider).hasClass("slick-initialized") || (e(n.$slider).addClass("slick-initialized"), n.buildRows(), n.buildOut(), n.setProps(), n.startLoad(), n.loadSlider(), n.initializeEvents(), n.updateArrows(), n.updateDots(), n.checkResponsive(!0), n.focusHandler()), t && n.$slider.trigger("init", [n]), !0 === n.options.accessibility && n.initADA(), n.options.autoplay && (n.paused = !1, n.autoPlay())
        }, t.prototype.initADA = function() {
            var t = this,
                n = Math.ceil(t.slideCount / t.options.slidesToShow),
                i = t.getNavigableIndexes().filter(function(e) {
                    return e >= 0 && e < t.slideCount
                });
            t.$slides.add(t.$slideTrack.find(".slick-cloned")).attr({
                "aria-hidden": "true",
                tabindex: "-1"
            }).find("a, input, button, select").attr({
                tabindex: "-1"
            }), null !== t.$dots && (t.$slides.not(t.$slideTrack.find(".slick-cloned")).each(function(n) {
                var o = i.indexOf(n);
                e(this).attr({
                    role: "tabpanel",
                    id: "slick-slide" + t.instanceUid + n,
                    tabindex: -1
                }), -1 !== o && e(this).attr({
                    "aria-describedby": "slick-slide-control" + t.instanceUid + o
                })
            }), t.$dots.attr("role", "tablist").find("li").each(function(o) {
                var r = i[o];
                e(this).attr({
                    role: "presentation"
                }), e(this).find("button").first().attr({
                    role: "tab",
                    id: "slick-slide-control" + t.instanceUid + o,
                    "aria-controls": "slick-slide" + t.instanceUid + r,
                    "aria-label": o + 1 + " of " + n,
                    "aria-selected": null,
                    tabindex: "-1"
                })
            }).eq(t.currentSlide).find("button").attr({
                "aria-selected": "true",
                tabindex: "0"
            }).end());
            for (var o = t.currentSlide, r = o + t.options.slidesToShow; o < r; o++) t.$slides.eq(o).attr("tabindex", 0);
            t.activateADA()
        }, t.prototype.initArrowEvents = function() {
            var e = this;
            !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.off("click.slick").on("click.slick", {
                message: "previous"
            }, e.changeSlide), e.$nextArrow.off("click.slick").on("click.slick", {
                message: "next"
            }, e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow.on("keydown.slick", e.keyHandler), e.$nextArrow.on("keydown.slick", e.keyHandler)))
        }, t.prototype.initDotEvents = function() {
            var t = this;
            !0 === t.options.dots && (e("li", t.$dots).on("click.slick", {
                message: "index"
            }, t.changeSlide), !0 === t.options.accessibility && t.$dots.on("keydown.slick", t.keyHandler)), !0 === t.options.dots && !0 === t.options.pauseOnDotsHover && e("li", t.$dots).on("mouseenter.slick", e.proxy(t.interrupt, t, !0)).on("mouseleave.slick", e.proxy(t.interrupt, t, !1))
        }, t.prototype.initSlideEvents = function() {
            var t = this;
            t.options.pauseOnHover && (t.$list.on("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.on("mouseleave.slick", e.proxy(t.interrupt, t, !1)))
        }, t.prototype.initializeEvents = function() {
            var t = this;
            t.initArrowEvents(), t.initDotEvents(), t.initSlideEvents(), t.$list.on("touchstart.slick mousedown.slick", {
                action: "start"
            }, t.swipeHandler), t.$list.on("touchmove.slick mousemove.slick", {
                action: "move"
            }, t.swipeHandler), t.$list.on("touchend.slick mouseup.slick", {
                action: "end"
            }, t.swipeHandler), t.$list.on("touchcancel.slick mouseleave.slick", {
                action: "end"
            }, t.swipeHandler), t.$list.on("click.slick", t.clickHandler), e(document).on(t.visibilityChange, e.proxy(t.visibility, t)), !0 === t.options.accessibility && t.$list.on("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler), e(window).on("orientationchange.slick.slick-" + t.instanceUid, e.proxy(t.orientationChange, t)), e(window).on("resize.slick.slick-" + t.instanceUid, e.proxy(t.resize, t)), e("[draggable!=true]", t.$slideTrack).on("dragstart", t.preventDefault), e(window).on("load.slick.slick-" + t.instanceUid, t.setPosition), e(t.setPosition)
        }, t.prototype.initUI = function() {
            var e = this;
            !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.show(), e.$nextArrow.show()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.show()
        }, t.prototype.keyHandler = function(e) {
            var t = this;
            e.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === e.keyCode && !0 === t.options.accessibility ? t.changeSlide({
                data: {
                    message: !0 === t.options.rtl ? "next" : "previous"
                }
            }) : 39 === e.keyCode && !0 === t.options.accessibility && t.changeSlide({
                data: {
                    message: !0 === t.options.rtl ? "previous" : "next"
                }
            }))
        }, t.prototype.lazyLoad = function() {
            function t(t) {
                e("img[data-lazy]", t).each(function() {
                    var t = e(this),
                        n = e(this).attr("data-lazy"),
                        i = e(this).attr("data-srcset"),
                        o = e(this).attr("data-sizes") || s.$slider.attr("data-sizes"),
                        r = document.createElement("img");
                    r.onload = function() {
                        t.animate({
                            opacity: 0
                        }, 100, function() {
                            i && (t.attr("srcset", i), o && t.attr("sizes", o)), t.attr("src", n).animate({
                                opacity: 1
                            }, 200, function() {
                                t.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")
                            }), s.$slider.trigger("lazyLoaded", [s, t, n])
                        })
                    }, r.onerror = function() {
                        t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), s.$slider.trigger("lazyLoadError", [s, t, n])
                    }, r.src = n
                })
            }
            var n, i, o, r, s = this;
            if (!0 === s.options.centerMode ? !0 === s.options.infinite ? (o = s.currentSlide + (s.options.slidesToShow / 2 + 1), r = o + s.options.slidesToShow + 2) : (o = Math.max(0, s.currentSlide - (s.options.slidesToShow / 2 + 1)), r = s.options.slidesToShow / 2 + 1 + 2 + s.currentSlide) : (o = s.options.infinite ? s.options.slidesToShow + s.currentSlide : s.currentSlide, r = Math.ceil(o + s.options.slidesToShow), !0 === s.options.fade && (o > 0 && o--, r <= s.slideCount && r++)), n = s.$slider.find(".slick-slide").slice(o, r), "anticipated" === s.options.lazyLoad)
                for (var a = o - 1, l = r, c = s.$slider.find(".slick-slide"), u = 0; u < s.options.slidesToScroll; u++) a < 0 && (a = s.slideCount - 1), n = n.add(c.eq(a)), n = n.add(c.eq(l)), a--, l++;
            t(n), s.slideCount <= s.options.slidesToShow ? (i = s.$slider.find(".slick-slide"), t(i)) : s.currentSlide >= s.slideCount - s.options.slidesToShow ? (i = s.$slider.find(".slick-cloned").slice(0, s.options.slidesToShow), t(i)) : 0 === s.currentSlide && (i = s.$slider.find(".slick-cloned").slice(-1 * s.options.slidesToShow), t(i))
        }, t.prototype.loadSlider = function() {
            var e = this;
            e.setPosition(), e.$slideTrack.css({
                opacity: 1
            }), e.$slider.removeClass("slick-loading"), e.initUI(), "progressive" === e.options.lazyLoad && e.progressiveLazyLoad()
        }, t.prototype.next = t.prototype.slickNext = function() {
            this.changeSlide({
                data: {
                    message: "next"
                }
            })
        }, t.prototype.orientationChange = function() {
            var e = this;
            e.checkResponsive(), e.setPosition()
        }, t.prototype.pause = t.prototype.slickPause = function() {
            var e = this;
            e.autoPlayClear(), e.paused = !0
        }, t.prototype.play = t.prototype.slickPlay = function() {
            var e = this;
            e.autoPlay(), e.options.autoplay = !0, e.paused = !1, e.focussed = !1, e.interrupted = !1
        }, t.prototype.postSlide = function(t) {
            var n = this;
            if (!n.unslicked && (n.$slider.trigger("afterChange", [n, t]), n.animating = !1, n.slideCount > n.options.slidesToShow && n.setPosition(), n.swipeLeft = null, n.options.autoplay && n.autoPlay(), !0 === n.options.accessibility && (n.initADA(), n.options.focusOnChange))) {
                e(n.$slides.get(n.currentSlide)).attr("tabindex", 0).focus()
            }
        }, t.prototype.prev = t.prototype.slickPrev = function() {
            this.changeSlide({
                data: {
                    message: "previous"
                }
            })
        }, t.prototype.preventDefault = function(e) {
            e.preventDefault()
        }, t.prototype.progressiveLazyLoad = function(t) {
            t = t || 1;
            var n, i, o, r, s, a = this,
                l = e("img[data-lazy]", a.$slider);
            l.length ? (n = l.first(), i = n.attr("data-lazy"), o = n.attr("data-srcset"), r = n.attr("data-sizes") || a.$slider.attr("data-sizes"), s = document.createElement("img"), s.onload = function() {
                o && (n.attr("srcset", o), r && n.attr("sizes", r)), n.attr("src", i).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === a.options.adaptiveHeight && a.setPosition(), a.$slider.trigger("lazyLoaded", [a, n, i]), a.progressiveLazyLoad()
            }, s.onerror = function() {
                t < 3 ? setTimeout(function() {
                    a.progressiveLazyLoad(t + 1)
                }, 500) : (n.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), a.$slider.trigger("lazyLoadError", [a, n, i]), a.progressiveLazyLoad())
            }, s.src = i) : a.$slider.trigger("allImagesLoaded", [a])
        }, t.prototype.refresh = function(t) {
            var n, i, o = this;
            i = o.slideCount - o.options.slidesToShow, !o.options.infinite && o.currentSlide > i && (o.currentSlide = i), o.slideCount <= o.options.slidesToShow && (o.currentSlide = 0), n = o.currentSlide, o.destroy(!0), e.extend(o, o.initials, {
                currentSlide: n
            }), o.init(), t || o.changeSlide({
                data: {
                    message: "index",
                    index: n
                }
            }, !1)
        }, t.prototype.registerBreakpoints = function() {
            var t, n, i, o = this,
                r = o.options.responsive || null;
            if ("array" === e.type(r) && r.length) {
                o.respondTo = o.options.respondTo || "window";
                for (t in r)
                    if (i = o.breakpoints.length - 1, r.hasOwnProperty(t)) {
                        for (n = r[t].breakpoint; i >= 0;) o.breakpoints[i] && o.breakpoints[i] === n && o.breakpoints.splice(i, 1), i--;
                        o.breakpoints.push(n), o.breakpointSettings[n] = r[t].settings
                    }
                o.breakpoints.sort(function(e, t) {
                    return o.options.mobileFirst ? e - t : t - e
                })
            }
        }, t.prototype.reinit = function() {
            var t = this;
            t.$slides = t.$slideTrack.children(t.options.slide).addClass("slick-slide"), t.slideCount = t.$slides.length, t.currentSlide >= t.slideCount && 0 !== t.currentSlide && (t.currentSlide = t.currentSlide - t.options.slidesToScroll), t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0), t.registerBreakpoints(), t.setProps(), t.setupInfinite(), t.buildArrows(), t.updateArrows(), t.initArrowEvents(), t.buildDots(), t.updateDots(), t.initDotEvents(), t.cleanUpSlideEvents(), t.initSlideEvents(), t.checkResponsive(!1, !0), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), t.setPosition(), t.focusHandler(), t.paused = !t.options.autoplay, t.autoPlay(), t.$slider.trigger("reInit", [t])
        }, t.prototype.resize = function() {
            var t = this;
            e(window).width() !== t.windowWidth && (clearTimeout(t.windowDelay), t.windowDelay = window.setTimeout(function() {
                t.windowWidth = e(window).width(), t.checkResponsive(), t.unslicked || t.setPosition()
            }, 50))
        }, t.prototype.removeSlide = t.prototype.slickRemove = function(e, t, n) {
            var i = this;
            if ("boolean" == typeof e ? (t = e, e = !0 === t ? 0 : i.slideCount - 1) : e = !0 === t ? --e : e, i.slideCount < 1 || e < 0 || e > i.slideCount - 1) return !1;
            i.unload(), !0 === n ? i.$slideTrack.children().remove() : i.$slideTrack.children(this.options.slide).eq(e).remove(), i.$slides = i.$slideTrack.children(this.options.slide), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.append(i.$slides), i.$slidesCache = i.$slides, i.reinit()
        }, t.prototype.setCSS = function(e) {
            var t, n, i = this,
                o = {};
            !0 === i.options.rtl && (e = -e), t = "left" == i.positionProp ? Math.ceil(e) + "px" : "0px", n = "top" == i.positionProp ? Math.ceil(e) + "px" : "0px", o[i.positionProp] = e, !1 === i.transformsEnabled ? i.$slideTrack.css(o) : (o = {}, !1 === i.cssTransitions ? (o[i.animType] = "translate(" + t + ", " + n + ")", i.$slideTrack.css(o)) : (o[i.animType] = "translate3d(" + t + ", " + n + ", 0px)", i.$slideTrack.css(o)))
        }, t.prototype.setDimensions = function() {
            var e = this;
            !1 === e.options.vertical ? !0 === e.options.centerMode && e.$list.css({
                padding: "0px " + e.options.centerPadding
            }) : (e.$list.height(e.$slides.first().outerHeight(!0) * e.options.slidesToShow), !0 === e.options.centerMode && e.$list.css({
                padding: e.options.centerPadding + " 0px"
            })), e.listWidth = e.$list.width(), e.listHeight = e.$list.height(), !1 === e.options.vertical && !1 === e.options.variableWidth ? (e.slideWidth = Math.ceil(e.listWidth / e.options.slidesToShow), e.$slideTrack.width(Math.ceil(e.slideWidth * e.$slideTrack.children(".slick-slide").length))) : !0 === e.options.variableWidth ? e.$slideTrack.width(5e3 * e.slideCount) : (e.slideWidth = Math.ceil(e.listWidth), e.$slideTrack.height(Math.ceil(e.$slides.first().outerHeight(!0) * e.$slideTrack.children(".slick-slide").length)));
            var t = e.$slides.first().outerWidth(!0) - e.$slides.first().width();
            !1 === e.options.variableWidth && e.$slideTrack.children(".slick-slide").width(e.slideWidth - t)
        }, t.prototype.setFade = function() {
            var t, n = this;
            n.$slides.each(function(i, o) {
                t = n.slideWidth * i * -1, !0 === n.options.rtl ? e(o).css({
                    position: "relative",
                    right: t,
                    top: 0,
                    zIndex: n.options.zIndex - 2,
                    opacity: 0
                }) : e(o).css({
                    position: "relative",
                    left: t,
                    top: 0,
                    zIndex: n.options.zIndex - 2,
                    opacity: 0
                })
            }), n.$slides.eq(n.currentSlide).css({
                zIndex: n.options.zIndex - 1,
                opacity: 1
            })
        }, t.prototype.setHeight = function() {
            var e = this;
            if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
                var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
                e.$list.css("height", t)
            }
        }, t.prototype.setOption = t.prototype.slickSetOption = function() {
            var t, n, i, o, r, s = this,
                a = !1;
            if ("object" === e.type(arguments[0]) ? (i = arguments[0], a = arguments[1], r = "multiple") : "string" === e.type(arguments[0]) && (i = arguments[0], o = arguments[1], a = arguments[2], "responsive" === arguments[0] && "array" === e.type(arguments[1]) ? r = "responsive" : void 0 !== arguments[1] && (r = "single")), "single" === r) s.options[i] = o;
            else if ("multiple" === r) e.each(i, function(e, t) {
                s.options[e] = t
            });
            else if ("responsive" === r)
                for (n in o)
                    if ("array" !== e.type(s.options.responsive)) s.options.responsive = [o[n]];
                    else {
                        for (t = s.options.responsive.length - 1; t >= 0;) s.options.responsive[t].breakpoint === o[n].breakpoint && s.options.responsive.splice(t, 1), t--;
                        s.options.responsive.push(o[n])
                    }
            a && (s.unload(), s.reinit())
        }, t.prototype.setPosition = function() {
            var e = this;
            e.setDimensions(), e.setHeight(), !1 === e.options.fade ? e.setCSS(e.getLeft(e.currentSlide)) : e.setFade(), e.$slider.trigger("setPosition", [e])
        }, t.prototype.setProps = function() {
            var e = this,
                t = document.body.style;
            e.positionProp = !0 === e.options.vertical ? "top" : "left", "top" === e.positionProp ? e.$slider.addClass("slick-vertical") : e.$slider.removeClass("slick-vertical"), void 0 === t.WebkitTransition && void 0 === t.MozTransition && void 0 === t.msTransition || !0 === e.options.useCSS && (e.cssTransitions = !0), e.options.fade && ("number" == typeof e.options.zIndex ? e.options.zIndex < 3 && (e.options.zIndex = 3) : e.options.zIndex = e.defaults.zIndex), void 0 !== t.OTransform && (e.animType = "OTransform", e.transformType = "-o-transform", e.transitionType = "OTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.MozTransform && (e.animType = "MozTransform", e.transformType = "-moz-transform", e.transitionType = "MozTransition", void 0 === t.perspectiveProperty && void 0 === t.MozPerspective && (e.animType = !1)), void 0 !== t.webkitTransform && (e.animType = "webkitTransform", e.transformType = "-webkit-transform", e.transitionType = "webkitTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.msTransform && (e.animType = "msTransform", e.transformType = "-ms-transform", e.transitionType = "msTransition", void 0 === t.msTransform && (e.animType = !1)), void 0 !== t.transform && !1 !== e.animType && (e.animType = "transform", e.transformType = "transform", e.transitionType = "transition"), e.transformsEnabled = e.options.useTransform && null !== e.animType && !1 !== e.animType
        }, t.prototype.setSlideClasses = function(e) {
            var t, n, i, o, r = this;
            if (n = r.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), r.$slides.eq(e).addClass("slick-current"), !0 === r.options.centerMode) {
                var s = r.options.slidesToShow % 2 == 0 ? 1 : 0;
                t = Math.floor(r.options.slidesToShow / 2), !0 === r.options.infinite && (e >= t && e <= r.slideCount - 1 - t ? r.$slides.slice(e - t + s, e + t + 1).addClass("slick-active").attr("aria-hidden", "false") : (i = r.options.slidesToShow + e, n.slice(i - t + 1 + s, i + t + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === e ? n.eq(n.length - 1 - r.options.slidesToShow).addClass("slick-center") : e === r.slideCount - 1 && n.eq(r.options.slidesToShow).addClass("slick-center")), r.$slides.eq(e).addClass("slick-center")
            } else e >= 0 && e <= r.slideCount - r.options.slidesToShow ? r.$slides.slice(e, e + r.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : n.length <= r.options.slidesToShow ? n.addClass("slick-active").attr("aria-hidden", "false") : (o = r.slideCount % r.options.slidesToShow, i = !0 === r.options.infinite ? r.options.slidesToShow + e : e, r.options.slidesToShow == r.options.slidesToScroll && r.slideCount - e < r.options.slidesToShow ? n.slice(i - (r.options.slidesToShow - o), i + o).addClass("slick-active").attr("aria-hidden", "false") : n.slice(i, i + r.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));
            "ondemand" !== r.options.lazyLoad && "anticipated" !== r.options.lazyLoad || r.lazyLoad()
        }, t.prototype.setupInfinite = function() {
            var t, n, i, o = this;
            if (!0 === o.options.fade && (o.options.centerMode = !1), !0 === o.options.infinite && !1 === o.options.fade && (n = null, o.slideCount > o.options.slidesToShow)) {
                for (i = !0 === o.options.centerMode ? o.options.slidesToShow + 1 : o.options.slidesToShow, t = o.slideCount; t > o.slideCount - i; t -= 1) n = t - 1, e(o.$slides[n]).clone(!0).attr("id", "").attr("data-slick-index", n - o.slideCount).prependTo(o.$slideTrack).addClass("slick-cloned");
                for (t = 0; t < i + o.slideCount; t += 1) n = t, e(o.$slides[n]).clone(!0).attr("id", "").attr("data-slick-index", n + o.slideCount).appendTo(o.$slideTrack).addClass("slick-cloned");
                o.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                    e(this).attr("id", "")
                })
            }
        }, t.prototype.interrupt = function(e) {
            var t = this;
            e || t.autoPlay(), t.interrupted = e
        }, t.prototype.selectHandler = function(t) {
            var n = this,
                i = e(t.target).is(".slick-slide") ? e(t.target) : e(t.target).parents(".slick-slide"),
                o = parseInt(i.attr("data-slick-index"));
            if (o || (o = 0), n.slideCount <= n.options.slidesToShow) return void n.slideHandler(o, !1, !0);
            n.slideHandler(o)
        }, t.prototype.slideHandler = function(e, t, n) {
            var i, o, r, s, a, l = null,
                c = this;
            if (t = t || !1, !(!0 === c.animating && !0 === c.options.waitForAnimate || !0 === c.options.fade && c.currentSlide === e)) {
                if (!1 === t && c.asNavFor(e), i = e, l = c.getLeft(i), s = c.getLeft(c.currentSlide), c.currentLeft = null === c.swipeLeft ? s : c.swipeLeft, !1 === c.options.infinite && !1 === c.options.centerMode && (e < 0 || e > c.getDotCount() * c.options.slidesToScroll)) return void(!1 === c.options.fade && (i = c.currentSlide, !0 !== n ? c.animateSlide(s, function() {
                    c.postSlide(i)
                }) : c.postSlide(i)));
                if (!1 === c.options.infinite && !0 === c.options.centerMode && (e < 0 || e > c.slideCount - c.options.slidesToScroll)) return void(!1 === c.options.fade && (i = c.currentSlide, !0 !== n ? c.animateSlide(s, function() {
                    c.postSlide(i)
                }) : c.postSlide(i)));
                if (c.options.autoplay && clearInterval(c.autoPlayTimer), o = i < 0 ? c.slideCount % c.options.slidesToScroll != 0 ? c.slideCount - c.slideCount % c.options.slidesToScroll : c.slideCount + i : i >= c.slideCount ? c.slideCount % c.options.slidesToScroll != 0 ? 0 : i - c.slideCount : i, c.animating = !0, c.$slider.trigger("beforeChange", [c, c.currentSlide, o]), r = c.currentSlide, c.currentSlide = o, c.setSlideClasses(c.currentSlide), c.options.asNavFor && (a = c.getNavTarget(), a = a.slick("getSlick"), a.slideCount <= a.options.slidesToShow && a.setSlideClasses(c.currentSlide)), c.updateDots(), c.updateArrows(), !0 === c.options.fade) return !0 !== n ? (c.fadeSlideOut(r), c.fadeSlide(o, function() {
                    c.postSlide(o)
                })) : c.postSlide(o), void c.animateHeight();
                !0 !== n ? c.animateSlide(l, function() {
                    c.postSlide(o)
                }) : c.postSlide(o)
            }
        }, t.prototype.startLoad = function() {
            var e = this;
            !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.hide(), e.$nextArrow.hide()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.hide(), e.$slider.addClass("slick-loading")
        }, t.prototype.swipeDirection = function() {
            var e, t, n, i, o = this;
            return e = o.touchObject.startX - o.touchObject.curX, t = o.touchObject.startY - o.touchObject.curY, n = Math.atan2(t, e), i = Math.round(180 * n / Math.PI), i < 0 && (i = 360 - Math.abs(i)), i <= 45 && i >= 0 ? !1 === o.options.rtl ? "left" : "right" : i <= 360 && i >= 315 ? !1 === o.options.rtl ? "left" : "right" : i >= 135 && i <= 225 ? !1 === o.options.rtl ? "right" : "left" : !0 === o.options.verticalSwiping ? i >= 35 && i <= 135 ? "down" : "up" : "vertical"
        }, t.prototype.swipeEnd = function(e) {
            var t, n, i = this;
            if (i.dragging = !1, i.swiping = !1, i.scrolling) return i.scrolling = !1, !1;
            if (i.interrupted = !1, i.shouldClick = !(i.touchObject.swipeLength > 10), void 0 === i.touchObject.curX) return !1;
            if (!0 === i.touchObject.edgeHit && i.$slider.trigger("edge", [i, i.swipeDirection()]), i.touchObject.swipeLength >= i.touchObject.minSwipe) {
                switch (n = i.swipeDirection()) {
                    case "left":
                    case "down":
                        t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide + i.getSlideCount()) : i.currentSlide + i.getSlideCount(), i.currentDirection = 0;
                        break;
                    case "right":
                    case "up":
                        t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide - i.getSlideCount()) : i.currentSlide - i.getSlideCount(), i.currentDirection = 1
                }
                "vertical" != n && (i.slideHandler(t), i.touchObject = {}, i.$slider.trigger("swipe", [i, n]))
            } else i.touchObject.startX !== i.touchObject.curX && (i.slideHandler(i.currentSlide), i.touchObject = {})
        }, t.prototype.swipeHandler = function(e) {
            var t = this;
            if (!(!1 === t.options.swipe || "ontouchend" in document && !1 === t.options.swipe || !1 === t.options.draggable && -1 !== e.type.indexOf("mouse"))) switch (t.touchObject.fingerCount = e.originalEvent && void 0 !== e.originalEvent.touches ? e.originalEvent.touches.length : 1, t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold, !0 === t.options.verticalSwiping && (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold), e.data.action) {
                case "start":
                    t.swipeStart(e);
                    break;
                case "move":
                    t.swipeMove(e);
                    break;
                case "end":
                    t.swipeEnd(e)
            }
        }, t.prototype.swipeMove = function(e) {
            var t, n, i, o, r, s, a = this;
            return r = void 0 !== e.originalEvent ? e.originalEvent.touches : null, !(!a.dragging || a.scrolling || r && 1 !== r.length) && (t = a.getLeft(a.currentSlide), a.touchObject.curX = void 0 !== r ? r[0].pageX : e.clientX, a.touchObject.curY = void 0 !== r ? r[0].pageY : e.clientY, a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curX - a.touchObject.startX, 2))), s = Math.round(Math.sqrt(Math.pow(a.touchObject.curY - a.touchObject.startY, 2))), !a.options.verticalSwiping && !a.swiping && s > 4 ? (a.scrolling = !0, !1) : (!0 === a.options.verticalSwiping && (a.touchObject.swipeLength = s), n = a.swipeDirection(), void 0 !== e.originalEvent && a.touchObject.swipeLength > 4 && (a.swiping = !0, e.preventDefault()), o = (!1 === a.options.rtl ? 1 : -1) * (a.touchObject.curX > a.touchObject.startX ? 1 : -1), !0 === a.options.verticalSwiping && (o = a.touchObject.curY > a.touchObject.startY ? 1 : -1), i = a.touchObject.swipeLength, a.touchObject.edgeHit = !1, !1 === a.options.infinite && (0 === a.currentSlide && "right" === n || a.currentSlide >= a.getDotCount() && "left" === n) && (i = a.touchObject.swipeLength * a.options.edgeFriction, a.touchObject.edgeHit = !0), !1 === a.options.vertical ? a.swipeLeft = t + i * o : a.swipeLeft = t + i * (a.$list.height() / a.listWidth) * o, !0 === a.options.verticalSwiping && (a.swipeLeft = t + i * o), !0 !== a.options.fade && !1 !== a.options.touchMove && (!0 === a.animating ? (a.swipeLeft = null, !1) : void a.setCSS(a.swipeLeft))))
        }, t.prototype.swipeStart = function(e) {
            var t, n = this;
            if (n.interrupted = !0, 1 !== n.touchObject.fingerCount || n.slideCount <= n.options.slidesToShow) return n.touchObject = {}, !1;
            void 0 !== e.originalEvent && void 0 !== e.originalEvent.touches && (t = e.originalEvent.touches[0]), n.touchObject.startX = n.touchObject.curX = void 0 !== t ? t.pageX : e.clientX, n.touchObject.startY = n.touchObject.curY = void 0 !== t ? t.pageY : e.clientY, n.dragging = !0
        }, t.prototype.unfilterSlides = t.prototype.slickUnfilter = function() {
            var e = this;
            null !== e.$slidesCache && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.appendTo(e.$slideTrack), e.reinit())
        }, t.prototype.unload = function() {
            var t = this;
            e(".slick-cloned", t.$slider).remove(), t.$dots && t.$dots.remove(), t.$prevArrow && t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove(), t.$nextArrow && t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove(), t.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
        }, t.prototype.unslick = function(e) {
            var t = this;
            t.$slider.trigger("unslick", [t, e]), t.destroy()
        }, t.prototype.updateArrows = function() {
            var e = this;
            Math.floor(e.options.slidesToShow / 2), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && !e.options.infinite && (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === e.currentSlide ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : e.currentSlide >= e.slideCount - e.options.slidesToShow && !1 === e.options.centerMode ? (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : e.currentSlide >= e.slideCount - 1 && !0 === e.options.centerMode && (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
        }, t.prototype.updateDots = function() {
            var e = this;
            null !== e.$dots && (e.$dots.find("li").removeClass("slick-active").end(), e.$dots.find("li").eq(Math.floor(e.currentSlide / e.options.slidesToScroll)).addClass("slick-active"))
        }, t.prototype.visibility = function() {
            var e = this;
            e.options.autoplay && (document[e.hidden] ? e.interrupted = !0 : e.interrupted = !1)
        }, e.fn.slick = function() {
            var e, n, i = this,
                o = arguments[0],
                r = Array.prototype.slice.call(arguments, 1),
                s = i.length;
            for (e = 0; e < s; e++)
                if ("object" == typeof o || void 0 === o ? i[e].slick = new t(i[e], o) : n = i[e].slick[o].apply(i[e].slick, r), void 0 !== n) return n;
            return i
        }
    });

