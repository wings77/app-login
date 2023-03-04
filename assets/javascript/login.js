$(document).ready(function() {
    const swiper = new Swiper('.swiper', {
        // flipEffect:{
        //     limitRotation:true,
        //     slideShadows,true,
        // },
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        effect: 'fade',
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },

        // If we need pagination
        pagination: {
            enabled: false,
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },

        centeredSlides: true,

        navigation: {
            enabled: false,
            hiddenClass: 'swiper-button-hidden',
            disabledClass: 'swiper-button-disabled',
        },

        // slidesPerView: "auto",
        centeredSlides: true,
        // spaceBetween: 30,
    });

    window.scrollTo(0, 0)

});

$(document).on('mouseover', '.story_lightbox', function(event) {
    $('.width_').css('width', $('.width_').css('width'));
    value = $(this).attr('data-post-id');
    $(this).addClass('dont_close_story_' + value);
});
$(document).on('mouseleave', '.story_lightbox', function(event) {
    Wo_Delay(function() {
        if ($('#users-reacted-modal').is(':hidden')) {
            value = $(this).attr('data-post-id');
            $(this).removeClass('dont_close_story_' + value);
            setTimeout(function() {
                $('.width_').css('width', '100%');
            }, 700);
            Wo_Delay(function() {
                if ($('.dont_close_story_' + value).length == 0) {
                    $('.story_lightbox').find('.next-btn').click();
                }
            }, 10000);
        }
    }, 500);

});
$(document).on('click', '.story-image-wrapper', function(event) {
    event.preventDefault();
    $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');

    $value = $(this).parents(".story-container").attr('data-status-id');
    $.post(Wo_Ajax_Requests_File() + '?f=story_view', {
        id: $value
    }, function(data, textStatus, xhr) {
        if (data.status == 200) {
            document.body.style.overflow = 'hidden';
            $('.lightbox-container').html(data.html);
            $('.width_').addClass('load');
            setTimeout(function() {
                $('.width_').css('width', '100%');
            }, 200);
            Wo_Delay(function() {
                if ($('.dont_close_story_' + $value).length == 0) {
                    Get_NextStory(data.story_id);
                }
            }, 10000);
        } else {
            Wo_CloseLightbox();
        }
    });
});

function Wo_GetMoreStoryViews(story_id, self) {
    last_view = $('.story_views_').last().attr('id');
    $(self).addClass('dont_close_story_' + story_id);
    $(self).find('span').html('Por favor espera..');
    $.post(Wo_Ajax_Requests_File() + '?f=story_views_', {
        last_view: last_view,
        story_id: story_id
    }, function(data, textStatus, xhr) {
        if (data.status == 200) {
            $(self).find('button').html('<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather"><polyline points="6 9 12 15 18 9"></polyline></svg> Cargar más');

            $('.views_container_').append(data.html);
        } else {
            $(self).find('button').html('No mas vistas');

        }
    });
}
$(document).on('click', '.see_all_stories', function(event) {
    event.preventDefault();
    $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
    user_id = $(this).attr('data_story_user_id');
    type = $(this).attr('data_story_type');
    $.post(Wo_Ajax_Requests_File() + '?f=view_all_stories', {
        user_id: user_id,
        type: type
    }, function(data, textStatus, xhr) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", {
                to_id: user_id,
                user_id: _getCookie("user_id"),
                type: "added"
            });
        }
        document.body.style.overflow = 'hidden';
        $('.lightbox-container').html(data.html);
        setTimeout(function() {
            video_story = $('#video_story').attr('data-story-video');
            if ($('[data-story-video=' + video_story + ']').length == 0) {

                $('.width_').addClass('load');
                setTimeout(function() {
                    $('.width_').css('width', '100%');
                }, 200);
                Wo_Delay(function() {
                    value = $('.user_story_').attr('id');

                    if ($('.dont_close_story_' + value).length == 0) {
                        if (type == 'user') {
                            Get_NextStory(data.story_id);
                        } else {

                            Get_NextStory(data.story_id, 'friends');
                        }
                    }
                }, 10000);
            }
        }, 200);
    });
});

function Get_PreviousStory(story_id, story_type = '') {
    if ($('.lightbox-container').is(":visible")) {

        Wo_CloseLightbox();
        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
            story_id: story_id,
            type: 'previous',
            story_type: story_type
        }, function(data, textStatus, xhr) {
            user_id = $(this).attr('data_story_user_id');
            if (node_socket_flow == "1") {
                socket.emit("user_notification", {
                    to_id: user_id,
                    user_id: _getCookie("user_id"),
                    type: "added"
                });
            }
            if (data.status == 200) {
                document.body.style.overflow = 'hidden';
                $('.lightbox-container').html(data.html);
                video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video=' + video_story + ']').length == 0) {
                    $('.width_').addClass('load');
                    setTimeout(function() {
                        $('.width_').css('width', '100%');
                    }, 200);
                    Wo_Delay(function() {
                        value = $('.user_story_').attr('id');
                        if ($('.dont_close_story_' + value).length == 0) {
                            if (story_type == 'user') {
                                if ($('.lightpost-' + data.story_id).length > 0) {
                                    Get_NextStory(data.story_id);
                                }
                            } else {
                                if ($('.lightpost-' + data.story_id).length > 0) {
                                    Get_NextStory(data.story_id, 'friends');
                                }
                            }
                        }
                    }, 10000);
                }
            } else {
                Wo_CloseLightbox();
            }
        });
    }
}

function Get_NextStory(story_id, story_type = '') {
    if ($('.lightbox-container').is(":visible")) {

        Wo_CloseLightbox();
        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
            story_id: story_id,
            type: 'next',
            story_type: story_type
        }, function(data, textStatus, xhr) {
            if (data.status == 200) {
                user_id = $(this).attr('data_story_user_id');
                if (node_socket_flow == "1") {
                    socket.emit("user_notification", {
                        to_id: user_id,
                        user_id: _getCookie("user_id"),
                        type: "added"
                    });
                }
                document.body.style.overflow = 'hidden';
                $('.lightbox-container').html(data.html);
                video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video=' + video_story + ']').length == 0) {
                    $('.width_').addClass('load');
                    setTimeout(function() {
                        $('.width_').css('width', '100%');
                    }, 200);
                    Wo_Delay(function() {
                        value = $('.user_story_').attr('id');
                        if ($('.dont_close_story_' + value).length == 0) {
                            if (story_type == 'user') {
                                if ($('.lightpost-' + data.story_id).length > 0) {
                                    Get_NextStory(data.story_id);
                                }
                            } else {
                                if ($('.lightpost-' + data.story_id).length > 0) {
                                    Get_NextStory(data.story_id, 'friends');
                                }
                            }
                        }
                    }, 10000);
                }
            } else {
                if (story_type == 'user') {
                    if ($('.unseen_story').length > 0) {
                        $('.unseen_story').addClass('seen_story');
                        $('.unseen_story').removeClass('unseen_story');

                    }
                }
                Wo_CloseLightbox();
            }
        });
    }
}

function Get_CurrentStory(story_id, story_type = '') {

    Wo_CloseLightbox();
    $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
    $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
        story_id: story_id,
        type: 'current',
        story_type: story_type
    }, function(data, textStatus, xhr) {
        if (data.status == 200) {
            user_id = $(this).attr('data_story_user_id');
            if (node_socket_flow == "1") {
                socket.emit("user_notification", {
                    to_id: user_id,
                    user_id: _getCookie("user_id"),
                    type: "added"
                });
            }
            document.body.style.overflow = 'hidden';
            $('.lightbox-container').html(data.html);
            video_story = $('#video_story').attr('data-story-video');
            if ($('[data-story-video=' + video_story + ']').length == 0) {
                $('.width_').addClass('load');
                setTimeout(function() {
                    $('.width_').css('width', '100%');
                }, 200);
                Wo_Delay(function() {
                    value = $('.user_story_').attr('id');
                    if ($('.dont_close_story_' + value).length == 0) {
                        if (story_type == 'user') {
                            if ($('.lightpost-' + data.story_id).length > 0) {
                                Get_NextStory(data.story_id);
                            }
                        } else {
                            if ($('.lightpost-' + data.story_id).length > 0) {
                                Get_NextStory(data.story_id, 'friends');
                            }
                        }
                    }
                }, 10000);
            }
        } else {
            if (story_type == 'user') {
                if ($('.unseen_story').length > 0) {
                    $('.unseen_story').addClass('seen_story');
                    $('.unseen_story').removeClass('unseen_story');

                }
            }
            Wo_CloseLightbox();
        }
    });
}


function Wo_Ajax_Requests_File() {
    return "https://hexascripts.com/wonderful/welcome10/Script/requests.php"
}

function RunLiveAgora(channelName, DIV_ID, token) {
    var agoraAppId = '';
    var token = token;

    var client = AgoraRTC.createClient({
        mode: 'live',
        codec: 'vp8'
    });
    client.init(agoraAppId, function() {


        client.setClientRole('audience', function() {}, function(e) {});

        client.join(token, channelName, 163838, function(uid) {}, function(err) {});
    }, function(err) {});

    client.on('stream-added', function(evt) {
        var stream = evt.stream;
        var streamId = stream.getId();

        client.subscribe(stream, function(err) {});
    });
    client.on('stream-subscribed', function(evt) {
        var remoteStream = evt.stream;
        remoteStream.play(DIV_ID);
        $('#player_' + remoteStream.getId()).addClass('embed-responsive-item');
    });
}

// window.addEventListener("load", function() {
//     window.cookieconsent.initialise({
//         "palette": {
//             "popup": {
//                 "background": "#1e2321",
//                 "text": "#fff"
//             },
//             "button": {
//                 "background": "#a52729"
//             }
//         },
//         "theme": "edgeless",
//         "position": "bottom-left",
//         "content": {
//             "message": "Este sitio web utiliza cookies para garantizar que obtenga la mejor experiencia en nuestro sitio web.",
//             "dismiss": "¡Lo tengo!",
//             "link": "Aprende más",
//             "href": "https://hexascripts.com/wonderful/welcome10/Script/terms/privacy-policy"
//         }
//     })
// });

let f = navigator.userAgent.search("Firefox");
if (f > -1) {
    $('.header-brand').attr('href', "https://hexascripts.com/wonderful/welcome10/Script/?cache=1677426094");
}

function ShowCommentGif(id, type) {
    $(".gif_post_comment").each(function(index) {
        if ($(this).attr('id') != 'gif-form-' + id) {
            $(this).slideUp();
        }
    });
    $('#gif-form-' + id).slideToggle(200);
    $('.gif_post_comment_gif').html('');
}

function GifScrolledC(self) {
    if ((($(self).prop("scrollHeight") - $(self).height()) - $(self).scrollTop()) < 300) {
        id = $(self).attr('GId');
        type = $(self).attr('GType');
        word = $(self).attr('GWord');
        offset = $(self).attr('GOffset');
        SearchForGif(word, id, type, offset);
    }
}

function SearchForGif(keyword, id = 0, type = '', offset = 0) {

    if ($('#publisher-box-stickers-cont-' + id).attr('GWord') != keyword) {
        $('#publisher-box-stickers-cont-' + id).empty();
        $('#publisher-box-stickers-cont-' + id).attr('GOffset', 0);
        $('#publisher-box-stickers-cont-' + id).attr('GWord', keyword);
    } else {
        $('#publisher-box-stickers-cont-' + id).attr('GOffset', parseInt($('#publisher-box-stickers-cont-' + id).attr('GOffset')) + 20);
    }
    Wo_Delay(function() {
        $.ajax({
                url: 'https://api.giphy.com/v1/gifs/search?',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: keyword,
                    api_key: '420d477a542b4287b2bf91ac134ae041',
                    limit: 20,
                    offset: offset
                },
            })
            .done(function(data) {
                if (data.meta.status == 200 && data.data.length > 0) {
                    var appended = false;
                    for (var i = 0; i < data.data.length; i++) {
                        appended = true;
                        if (appended == true) {
                            appended = false;
                            if (type == 'story') {
                                $('#publisher-box-stickers-cont-' + id).append($('<img alt="gif" src="' + data.data[i].images.fixed_height_small.url + '" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostCommentGif_' + id + '(this,' + id + ')" autoplay loop>'));
                            } else {
                                $('#publisher-box-stickers-cont-' + id).append($('<img alt="gif" src="' + data.data[i].images.fixed_height_small.url + '" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostReplyCommentGif_' + id + '(this,' + id + ')" autoplay loop>'));
                            }
                            appended = true;
                        }
                    }
                    var images = 0;
                    Wo_ElementLoad($('img[alt=gif]'), function() {
                        images++;
                    });
                    if (data.data.length == images || images >= 5) {

                    }
                } else {
                    $('#publisher-box-stickers-cont-' + id).html('<p class="no_gifs_found"><i class="fa fa-frown-o"></i> Sin resultados</p>');
                }
            })
            .fail(function() {
                console.log("error");
            })
    }, 100);
}

function ShowCommentStickers(id, type) {
    $('.gif_post_comment').slideUp(200);
    $('.gif_post_comment_gif').html('');
    $('#sticker-form-' + id).slideToggle(200);
    $('.chat-box-stickers-cont').empty();
    functionName = "Wo_PostReplyCommentSticker_" + id + "(this," + id + ");";
    if (type == 'story') {
        functionName = "Wo_PostCommentSticker_" + id + "(this," + id + ");";
    }

    sticker = '<div class="empty_state" style="margin: 15px 0 0;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,2C3.56,2 2,3.56 2,5.5V18.5C2,20.44 3.56,22 5.5,22H16L22,16V5.5C22,3.56 20.44,2 18.5,2H5.5M5.75,4H18.25A1.75,1.75 0 0,1 20,5.75V15H18.5C16.56,15 15,16.56 15,18.5V20H5.75A1.75,1.75 0 0,1 4,18.25V5.75A1.75,1.75 0 0,1 5.75,4M14.44,6.77C14.28,6.77 14.12,6.79 13.97,6.83C13.03,7.09 12.5,8.05 12.74,9C12.79,9.15 12.86,9.3 12.95,9.44L16.18,8.56C16.18,8.39 16.16,8.22 16.12,8.05C15.91,7.3 15.22,6.77 14.44,6.77M8.17,8.5C8,8.5 7.85,8.5 7.7,8.55C6.77,8.81 6.22,9.77 6.47,10.7C6.5,10.86 6.59,11 6.68,11.16L9.91,10.28C9.91,10.11 9.89,9.94 9.85,9.78C9.64,9 8.95,8.5 8.17,8.5M16.72,11.26L7.59,13.77C8.91,15.3 11,15.94 12.95,15.41C14.9,14.87 16.36,13.25 16.72,11.26Z"></path></svg> Sin resultados</div>';
    $('#publisher-box-sticker-cont-' + id).html(sticker);

}
$(window).on("popstate", function(e) {
    location.reload();
});

/*Language Select*/
$(document).ready(function() {
    $("#wo_language_modal .language_select .English").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/united-states.svg"/></span> ');
    $("#wo_language_modal .language_select .Arabic").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/saudi-arabia.svg"/></span> ');
    $("#wo_language_modal .language_select .Dutch").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/netherlands.svg"/></span> ');
    $("#wo_language_modal .language_select .French").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/france.svg"/></span> ');
    $("#wo_language_modal .language_select .German").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/germany.svg"/></span> ');
    $("#wo_language_modal .language_select .Hungarian, #wo_language_modal .language_select .Magyar").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/hungary.svg"/></span> ');
    $("#wo_language_modal .language_select .Italian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/italy.svg"/></span> ');
    $("#wo_language_modal .language_select .Portuguese").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/portugal.svg"/></span> ');
    $("#wo_language_modal .language_select .Russian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/russia.svg"/></span> ');
    $("#wo_language_modal .language_select .Spanish").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/spain.svg"/></span> ');
    $("#wo_language_modal .language_select .Serbian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/serbia.svg"/></span> ');
    $("#wo_language_modal .language_select .Turkish").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/turkey.svg"/></span> ');
});
/* 

The code entered here will be added in <footer> tag 

*/

(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function($) {
    $.timeago = function(timestamp) {
        if (timestamp instanceof Date) {
            return inWords(timestamp);
        } else if (typeof timestamp === "string") {
            return inWords($.timeago.parse(timestamp));
        } else if (typeof timestamp === "number") {
            return inWords(new Date(timestamp));
        } else {
            return inWords($.timeago.datetime(timestamp));
        }
    };
    var $t = $.timeago;

    $.extend($.timeago, {
        settings: {
            refreshMillis: 60000,
            allowPast: true,
            allowFuture: false,
            localeTitle: false,
            cutoff: 0,
            strings: {
                prefixAgo: null,
                prefixFromNow: null,
                suffixAgo: "",
                suffixFromNow: "desde ahora",
                inPast: "cualquier momento",
                seconds: "ahora",
                minute: "minuto",
                minutes: "minutos",
                hour: "hora",
                hours: "horas",
                day: "d&iacute;a",
                days: "d&iacute;as",
                month: "mes",
                months: "meses",
                year: "A&ntilde;o",
                years: "a&ntilde;os",
                wordSeparator: " ",
                numbers: []
            }
        },

        inWords: function(distanceMillis) {
            if (!this.settings.allowPast && !this.settings.allowFuture) {
                throw 'timeago allowPast and allowFuture settings can not both be set to false.';
            }

            var $l = this.settings.strings;
            var prefix = $l.prefixAgo;
            var suffix = $l.suffixAgo;
            if (this.settings.allowFuture) {
                if (distanceMillis < 0) {
                    prefix = $l.prefixFromNow;
                    suffix = $l.suffixFromNow;
                }
            }

            if (!this.settings.allowPast && distanceMillis >= 0) {
                return this.settings.strings.inPast;
            }

            var seconds = Math.abs(distanceMillis) / 1000;
            var minutes = seconds / 60;
            var hours = minutes / 60;
            var days = hours / 24;
            var weeks = days / 7;
            var years = days / 365;

            function substitute(stringOrFunction, number) {
                var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
                var value = ($l.numbers && $l.numbers[number]) || number;
                return number + ' ' + string.replace(/%d/i, value);
                //return string.replace(/%d/i, value);
            }

            // var words = seconds < 45 && substitute($l.seconds, '') ||
            // seconds < 90 && substitute('m', 1) ||
            // minutes < 45 && substitute('m', Math.round(minutes)) ||
            // minutes < 90 && substitute('h', 1) ||
            // hours < 24 && substitute('hrs', Math.round(hours)) ||
            // hours < 42 && substitute('d', 1) ||
            // days < 7 && substitute('d', Math.round(days)) ||
            // weeks < 2 && substitute('w', 1) ||
            // weeks < 52 && substitute('w', Math.round(weeks)) ||
            // years < 1.5 && substitute('y', 1) ||
            // substitute('yrs', Math.round(years));
            var words = '';
            if (seconds < 45) {
                words = substitute($l.seconds, '');
            } else if (seconds < 90) {
                words = substitute('metro', 1);
            } else if (minutes < 45) {
                words = substitute('metro', Math.round(minutes));
            } else if (minutes < 90) {
                words = substitute('h', 1);
            } else if (hours < 24) {
                words = substitute('horas', Math.round(hours));
            } else if (hours < 42) {
                words = substitute('D', 1);
            } else if (days < 7) {
                words = substitute('D', Math.round(days));
            } else if (weeks < 2) {
                words = substitute('w', 1);
            } else if (weeks < 52) {
                words = substitute('w', Math.round(weeks));
            } else if (years < 1.5) {
                words = substitute('y', 1);
            } else {
                words = substitute('años', Math.round(years));
            }



            var separator = $l.wordSeparator || "";
            if ($l.wordSeparator === undefined) {
                separator = " ";
            }


            return $.trim([prefix, words].join(separator));

        },

        parse: function(iso8601) {
            var s = $.trim(iso8601);
            s = s.replace(/\.\d+/, ""); // remove milliseconds
            s = s.replace(/-/, "/").replace(/-/, "/");
            s = s.replace(/T/, " ").replace(/Z/, " UTC");
            s = s.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
            s = s.replace(/([\+\-]\d\d)$/, " $100"); // +09 -> +0900
            return new Date(s);
        },
        datetime: function(elem) {
            var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
            return $t.parse(iso8601);
        },
        isTime: function(elem) {
            // jQuery's `is()` doesn't play well with HTML5 in IE
            return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
        }
    });

    // functions that can be called via $(el).timeago('action')
    // init is default when no action is given
    // functions are called with context of a single element
    var functions = {
        init: function() {
            var refresh_el = $.proxy(refresh, this);
            refresh_el();
            var $s = $t.settings;
            if ($s.refreshMillis > 0) {
                this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
            }
        },
        update: function(time) {
            var parsedTime = $t.parse(time);
            $(this).data('timeago', {
                datetime: parsedTime
            });
            if ($t.settings.localeTitle) $(this).attr("title", parsedTime.toLocaleString());
            refresh.apply(this);
        },
        updateFromDOM: function() {
            $(this).data('timeago', {
                datetime: $t.parse($t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title"))
            });
            refresh.apply(this);
        },
        dispose: function() {
            if (this._timeagoInterval) {
                window.clearInterval(this._timeagoInterval);
                this._timeagoInterval = null;
            }
        }
    };

    $.fn.timeago = function(action, options) {
        var fn = action ? functions[action] : functions.init;
        if (!fn) {
            throw new Error("Unknown function name '" + action + "' for timeago");
        }
        // each over objects here and call the requested function
        this.each(function() {
            fn.call(this, options);
        });
        return this;
    };

    function refresh() {
        var data = prepareData(this);
        var $s = $t.settings;

        if (!isNaN(data.datetime)) {
            if ($s.cutoff == 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
                $(this).text(inWords(data.datetime));
            }
        }
        return this;
    }

    function prepareData(element) {
        element = $(element);
        if (!element.data("timeago")) {
            element.data("timeago", {
                datetime: $t.datetime(element)
            });
            var text = $.trim(element.text());
            if ($t.settings.localeTitle) {
                element.attr("title", element.data('timeago').datetime.toLocaleString());
            } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
                element.attr("title", text);
            }
        }
        return element.data("timeago");
    }

    function inWords(date) {
        return $t.inWords(distance(date));
    }

    function distance(date) {
        return (new Date().getTime() - date.getTime());
    }

    // fix for IE6 suckage
    document.createElement("abbr");
    document.createElement("time");
}));


$(function() {
    setInterval(function() {

            if ($('.ajax-time').length > 0) {
                $('.ajax-time').timeago()
                    .removeClass('.ajax-time');
            }
        },
        1000);
});

const node_socket_flow = "0"

$('#openLogin').click(() => {
    $('#register_div').hide();
    $('#login_div').css('display', 'flex');
})

$('#openRegister').click(() => {
    $('#login_div').hide();
    $('#register_div').css('display', 'flex');
})

$('.dontHaveAnAccount p button').click(() => {
    $('#openRegister').click();
})

var working = false;
var $this = $('#login');
var $state = $this.find('.login_errors');


// $(function() {
//     $('#login').ajaxForm({
//         url: Wo_Ajax_Requests_File() + '?f=login',
//         beforeSend: function() {
//             working = true;
//             $this.find('button').attr("disabled", true);
//             $this.find('.add_wow_loader').addClass('btn-loading');
//         },
//         success: function(data) {
//             if (data.status == 200 || data.status == 600) {
//                 $state.removeClass('alert-danger');
//                 $state.addClass('alert-success');

//                 $state.html('¡Dar una buena acogida!');
//                 $this.find('.add_wow_loader').removeClass('btn-loading');
//                 setTimeout(function() {
//                     window.location.href = data.location;
//                 }, 1000);
//             } else {
//                 var errors = data.errors.join("<br>");
//                 $this.find('button').attr("disabled", false);
//                 $this.find('.add_wow_loader').removeClass('btn-loading');
//                 $state.html(errors);
//             }
//             working = false;
//         }
//     });
// });



var register_working = false;
var $register_this = $('#register');
var $register_state = $register_this.find('.register_errors');
// $(function() {
//     $register_this.ajaxForm({
//         url: Wo_Ajax_Requests_File() + '?f=register',
//         beforeSend: function() {
//             register_working = true;
//             $register_this.find('button').attr("disabled", true);
//             $register_this.find('.add_wow_loader').addClass('btn-loading');


//         },
//         success: function(data) {
//             if (data.status == 200) {
//                 $register_state.removeClass('alert-danger');
//                 $register_state.addClass('alert-success');
//                 $register_state.html('¡Bienvenido!');
//                 $register_this.find('.add_wow_loader').removeClass('btn-loading');
//                 setTimeout(function() {
//                     window.location.href = data.location;
//                 }, 1000);
//             } else if (data.status == 300) {
//                 window.location.href = data.location;
//             } else {
//                 $register_this.find('button').attr("disabled", false);
//                 $register_this.find('.add_wow_loader').removeClass('btn-loading');
//                 $register_state.html(data.errors);
//             }
//             register_working = false;
//         }
//     });
// });

function activateButton(element) {
    if (element.checked) {
        document.getElementById("sign_submit").disabled = false;
    } else {
        document.getElementById("sign_submit").disabled = true;
    }
};