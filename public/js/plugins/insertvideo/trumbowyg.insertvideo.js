/*/* ===========================================================
 * trumbowyg.insertvideo.js v1.0
 * InsertVideo plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 * Author : Adam Hess (AdamHess)
 */

(function ($) {
    'use strict';

    var insertVideoOptions = {
        src: {
            label: 'URL',
            required: true
        },
        autoplay: {
            label: 'AutoPlay',
            required: false,
            type: 'checkbox'
        },
        muted: {
            label: 'Muted',
            required: false,
            type: 'checkbox'
        },
        preload: {
            label: 'preload options',
            required: false
        }
    };


    $.extend(true, $.trumbowyg, {
        langs: {
            // jshint camelcase:false
            en: {
                insertVideo: 'Insert Video'
            },
            fa: {
                insertVideo: 'افزودن ویدیو'
            },
            // jshint camelcase:true
        },
        plugins: {
            insertVideo: {
                init: function (trumbowyg) {
                    var btnDef = {
                        fn: function () {
                            var insertVideoCallback = function (v) {
                                // controls should always be show otherwise the Video will
                                // be invisible defeating the point of a wysiwyg
                                var html = '<video style="width:100%;height:400px" controls';
                                if (v.src) {
                                    html += ' src=\'' + v.src + '\'';
                                }
                                if (v.autoplay) {
                                    html += ' autoplay';
                                }
                                if (v.muted) {
                                    html += ' muted';
                                }
                                if (v.preload) {
                                    html += ' preload=\'' + v + '\'';
                                }
                                html += '></video>';
                                var node = $(html)[0];
                                trumbowyg.range.deleteContents();
                                trumbowyg.range.insertNode(node);
                                return true;
                            };

                            trumbowyg.openModalInsert(trumbowyg.lang.insertVideo, insertVideoOptions, insertVideoCallback);
                        }
                    };

                    trumbowyg.addBtnDef('insertVideo', btnDef);
                }
            }
        }
    });
})(jQuery);
