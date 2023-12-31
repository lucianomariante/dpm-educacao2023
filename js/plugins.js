/*!
 * Scrollspy
 */
!(function(t, e) {
  t.fn.extend({
    scrollspy: function(n) {
      var a = {
        namespace: "scrollspy",
        activeClass: "active",
        animate: !1,
        offset: 0,
        container: e
      };
      n = t.extend({}, a, n);
      var o = function(t, e) {
          return parseInt(t, 10) + parseInt(e, 10);
        },
        r = function(e) {
          for (var n = [], a = 0; a < e.length; a++) {
            var o = e[a],
              r = t(o).attr("href"),
              f = t(r);
            if (f.length > 0) {
              var s = Math.floor(f.offset().top),
                i = s + Math.floor(f.outerHeight());
              n.push({ element: f, hash: r, top: s, bottom: i });
            }
          }
          return n;
        },
        f = function(e, n) {
          for (var a = 0; a < e.length; a++) {
            var o = t(e[a]);
            if (o.attr("href") === n) return o;
          }
        },
        s = function(e) {
          for (var a = 0; a < e.length; a++) {
            var o = t(e[a]);
            o.parent().removeClass(n.activeClass);
          }
        };
      return this.each(function() {
        for (
          var a = this, i = t(n.container), l = t(a).find("a"), c = 0;
          c < l.length;
          c++
        ) {
          var h = l[c];
          t(h).on("click", function(a) {
            var r = t(this).attr("href"),
              f = t(r);
            if (f.length > 0) {
              var s = o(f.offset().top, n.offset);
              n.animate
                ? t("html, body").animate({ scrollTop: s }, 1e3)
                : e.scrollTo(0, s),
                a.preventDefault();
            }
          });
        }
        var v = r(l);
        i.bind("scroll." + n.namespace, function() {
          for (
            var e,
              r = {
                top: o(t(this).scrollTop(), Math.abs(n.offset)),
                left: t(this).scrollLeft()
              },
              i = 0;
            i < v.length;
            i++
          ) {
            var c = v[i];
            if (r.top >= c.top && r.top < c.bottom) {
              var h = c.hash;
              if ((e = f(l, h))) {
                n.onChange && n.onChange(c.element, t(a), r),
                  s(l),
                  e.parent().addClass(n.activeClass);
                break;
              }
            }
          }
          !e && n.onExit && n.onExit(t(a), r);
        });
      });
    }
  });
})(jQuery, window, document, void 0);
