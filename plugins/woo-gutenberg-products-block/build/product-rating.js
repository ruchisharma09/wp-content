(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[28],{270:function(t,e,n){"use strict";n.r(e);var s=n(0),c=(n(10),n(1)),r=n(4),o=n.n(r),a=n(28),u=n(57),i=(n(320),n(41));e.default=Object(u.withProductDataContext)(t=>{const{className:e}=t,{parentClassName:n}=Object(a.useInnerBlockLayoutContext)(),{product:r}=Object(a.useProductDataContext)(),u=(t=>{const e=parseFloat(t.average_rating);return Number.isFinite(e)&&e>0?e:0})(r),l=Object(i.b)(t);if(!u)return null;const b={width:u/5*100+"%"},p=Object(c.sprintf)(
/* translators: %f is referring to the average rating value */
Object(c.__)("Rated %f out of 5","woo-gutenberg-products-block"),u),d=(t=>{const e=parseInt(t.review_count,10);return Number.isFinite(e)&&e>0?e:0})(r),g={__html:Object(c.sprintf)(
/* translators: %1$s is referring to the average rating value, %2$s is referring to the number of ratings */
Object(c._n)("Rated %1$s out of 5 based on %2$s customer rating","Rated %1$s out of 5 based on %2$s customer ratings",d,"woo-gutenberg-products-block"),Object(c.sprintf)('<strong class="rating">%f</strong>',u),Object(c.sprintf)('<span class="rating">%d</span>',d))};return Object(s.createElement)("div",{className:o()(e,l.className,"wc-block-components-product-rating",{[n+"__product-rating"]:n}),style:l.style},Object(s.createElement)("div",{className:o()("wc-block-components-product-rating__stars",n+"__product-rating__stars"),role:"img","aria-label":p},Object(s.createElement)("span",{style:b,dangerouslySetInnerHTML:g})))})},320:function(t,e){}}]);