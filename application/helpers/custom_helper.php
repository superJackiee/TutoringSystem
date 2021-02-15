<?php
/*
 * Custom Helpers
 *
 */

//check auth
if (!function_exists('auth_check')) {
    function auth_check()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_logged_in();
    }
}

//check admin
if (!function_exists('is_admin')) {
    function is_admin()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_admin();
    }
}

//check editor
if (!function_exists('is_author')) {
    function is_author()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->is_author();
    }
}

//prevent editor
if (!function_exists('prevent_author')) {
    function prevent_author()
    {
        //check auth
        if (is_author()) {
            redirect(base_url() . 'admin');
        }
    }
}

//get logged user
if (!function_exists('user')) {
    function user()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $user = $ci->auth_model->get_logged_user();
        if (empty($user)) {
            $ci->auth_model->logout();
        } else {
            return $user;
        }

    }
}

//get user by id
if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->get_user($user_id);
    }
}


//get category
if (!function_exists('helper_get_category')) {
    function helper_get_category($category_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->category_model->get_category($category_id);
    }
}

//get subcategories
if (!function_exists('helper_get_subcategories')) {
    function helper_get_subcategories($parent_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->category_model->get_subcategories_by_parent_id($parent_id);
    }
}

//get posts category info
if (!function_exists('get_post_category')) {
    function get_post_category($post)
    {
        if (!empty($post)) {
            $ci =& get_instance();

            //check if subcategory exists
            $category = $ci->category_model->get_category($post->subcategory_id);

            if (!empty($category)) {
                $data = array(
                    'id' => $category->id,
                    'name' => $category->name,
                    'name_slug' => $category->name_slug,
                    'color' => $category->color,
                );
                return $data;
            } else {

                //check if category exists
                $category = $ci->category_model->get_category($post->category_id);
                if (!empty($category)) {
                    $data = array(
                        'id' => $category->id,
                        'name' => $category->name,
                        'name_slug' => $category->name_slug,
                        'color' => $category->color,
                    );
                    return $data;
                }
            }

            $data = array(
                'name' => "",
                'name_slug' => "",
                'color' => "",
            );
            return $data;
        }
    }
}

//get last posts by category
if (!function_exists('helper_get_last_posts_by_category')) {
    function helper_get_last_posts_by_category($category_id, $count)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->post_model->get_last_posts_by_category($category_id, $count);
    }
}

//get subcategory posts
if (!function_exists('helper_get_last_posts_by_subcategory')) {
    function helper_get_last_posts_by_subcategory($subcategory_id, $count)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->post_model->get_last_posts_by_subcategory($subcategory_id, $count);
    }
}

//get translated message
if (!function_exists('trans')) {
    function trans($string)
    {
        $ci =& get_instance();
        return $ci->lang->line($string);
    }
}

//print old form data
if (!function_exists('old')) {
    function old($field)
    {
        $ci =& get_instance();
        return html_escape($ci->session->flashdata('form_data')[$field]);
    }
}

//delete image from server
if (!function_exists('delete_image_from_server')) {
    function delete_image_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 30 && file_exists($full_path)) {
            unlink($full_path);
        }
    }
}

//is category has subcategory
if (!function_exists('is_category_has_subcategory')) {
    function is_category_has_subcategory($id)
    {
        $ci =& get_instance();

        if (count($ci->category_model->get_subcategories_by_parent_id($id)) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

//get user avatar
if (!function_exists('get_user_avatar')) {
    function get_user_avatar($user)
    {
        if (!empty($user)) {
            if (!empty($user->avatar) && file_exists(FCPATH . $user->avatar)) {
                return base_url() . $user->avatar;
            } elseif (!empty($user->avatar)) {
                return $user->avatar;
            } else {
                return base_url() . "assets/img/user.png";
            }
        } else {
            return base_url() . "assets/img/user.png";
        }
    }
}

//get user avatar by id
if (!function_exists('get_user_avatar_by_id')) {
    function get_user_avatar_by_id($user_id)
    {
        $ci =& get_instance();

        $user = $ci->auth_model->get_user($user_id);
        if (!empty($user)) {
            if (!empty($user->avatar) && file_exists(FCPATH . $user->avatar)) {
                return base_url() . $user->avatar;
            } elseif (!empty($user->avatar)) {
                return $user->avatar;
            } else {
                return base_url() . "assets/img/user.png";
            }
        } else {
            return base_url() . "assets/img/user.png";
        }
    }
}

//get page title
if (!function_exists('get_page_title')) {
    function get_page_title($page)
    {
        if (!empty($page)) {
            return html_escape($page->title);
        } else {
            return "";
        }
    }
}

//get page description
if (!function_exists('get_page_description')) {
    function get_page_description($page)
    {
        if (!empty($page)) {
            return html_escape($page->description);
        } else {
            return "";
        }
    }
}

//get page keywords
if (!function_exists('get_page_keywords')) {
    function get_page_keywords($page)
    {
        if (!empty($page)) {
            return html_escape($page->keywords);
        } else {
            return "";
        }
    }
}

//get post comment count
if (!function_exists('get_post_comment_count')) {
    function get_post_comment_count($post_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->get_post_comment_count($post_id);
    }
}

//get subcomments
if (!function_exists('get_subcomments')) {
    function get_subcomments($comment_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->get_subcomments($comment_id);
    }
}

//get comment like count
if (!function_exists('get_comment_like_count')) {
    function get_comment_like_count($comment_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->comment_model->comment_like_count($comment_id);
    }
}

//get total vote count
if (!function_exists('get_total_vote_count')) {
    function get_total_vote_count($poll_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->poll_model->get_total_vote_count($poll_id);
    }
}

//get option vote count
if (!function_exists('get_option_vote_count')) {
    function get_option_vote_count($poll_id, $option)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->poll_model->get_option_vote_count($poll_id, $option);
    }
}

//date format
if (!function_exists('helper_date_format')) {
    function helper_date_format($datetime)
    {
        $date = date("M j, Y", strtotime($datetime));
        $date = str_replace("Jan", trans("January"), $date);
        $date = str_replace("Feb", trans("February"), $date);
        $date = str_replace("Mar", trans("March"), $date);
        $date = str_replace("Apr", trans("April"), $date);
        $date = str_replace("May", trans("May"), $date);
        $date = str_replace("Jun", trans("June"), $date);
        $date = str_replace("Jul", trans("July"), $date);
        $date = str_replace("Aug", trans("August"), $date);
        $date = str_replace("Sep", trans("September"), $date);
        $date = str_replace("Oct", trans("October"), $date);
        $date = str_replace("Nov", trans("November"), $date);
        $date = str_replace("Dec", trans("December"), $date);
        return $date;

    }
}

//date format for comments
if (!function_exists('helper_comment_date_format')) {
    function helper_comment_date_format($datetime)
    {
        $date = date("M j, Y g:i a", strtotime($datetime));
        $date = str_replace("Jan", trans("January"), $date);
        $date = str_replace("Feb", trans("February"), $date);
        $date = str_replace("Mar", trans("March"), $date);
        $date = str_replace("Apr", trans("April"), $date);
        $date = str_replace("May", trans("May"), $date);
        $date = str_replace("Jun", trans("June"), $date);
        $date = str_replace("Jul", trans("July"), $date);
        $date = str_replace("Aug", trans("August"), $date);
        $date = str_replace("Sep", trans("September"), $date);
        $date = str_replace("Oct", trans("October"), $date);
        $date = str_replace("Nov", trans("November"), $date);
        $date = str_replace("Dec", trans("December"), $date);
        return $date;
    }
}

//get logo
if (!function_exists('get_logo')) {
    function get_logo($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->logo) && file_exists(FCPATH . $settings->logo)) {
                return base_url() . $settings->logo;
            } else {
                return base_url() . "assets/img/logo.png";
            }
        } else {
            return base_url() . "assets/img/logo.png";
        }
    }
}

//get logo
if (!function_exists('get_logo_footer')) {
    function get_logo_footer($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->logo_footer) && file_exists(FCPATH . $settings->logo_footer)) {
                return base_url() . $settings->logo_footer;
            } else {
                return base_url() . "assets/img/logo-footer.png";
            }
        } else {
            return base_url() . "assets/img/logo-footer.png";
        }
    }
}

//get favicon
if (!function_exists('get_favicon')) {
    function get_favicon($settings)
    {
        if (!empty($settings)) {
            if (!empty($settings->favicon) && file_exists(FCPATH . $settings->favicon)) {
                return base_url() . $settings->favicon;
            } else {
                return base_url() . "assets/img/favicon.png";
            }
        } else {
            return base_url() . "assets/img/favicon.png";
        }
    }
}

//get settings
if (!function_exists('get_settings')) {
    function get_settings()
    {
        $ci =& get_instance();
        $ci->load->model('settings_model');
        return $ci->settings_model->get_settings();
    }
}


//slug generator
if (!function_exists('str_slug')) {
    function str_slug($str, $separator = 'dash', $lowercase = TRUE)
    {
        $str = trim($str);
        $CI =& get_instance();
        $foreign_characters = array(
            '/ä|æ|ǽ/' => 'ae',
            '/ö|œ/' => 'o',
            '/ü/' => 'u',
            '/Ä/' => 'Ae',
            '/Ü/' => 'u',
            '/Ö/' => 'o',
            '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Α|Ά|Ả|Ạ|Ầ|Ẫ|Ẩ|Ậ|Ằ|Ắ|Ẵ|Ẳ|Ặ|А/' => 'A',
            '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|α|ά|ả|ạ|ầ|ấ|ẫ|ẩ|ậ|ằ|ắ|ẵ|ẳ|ặ|а/' => 'a',
            '/Б/' => 'B',
            '/б/' => 'b',
            '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
            '/ç|ć|ĉ|ċ|č/' => 'c',
            '/Д/' => 'D',
            '/д/' => 'd',
            '/Ð|Ď|Đ|Δ/' => 'Dj',
            '/ð|ď|đ|δ/' => 'dj',
            '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ε|Έ|Ẽ|Ẻ|Ẹ|Ề|Ế|Ễ|Ể|Ệ|Е|Э/' => 'E',
            '/è|é|ê|ë|ē|ĕ|ė|ę|ě|έ|ε|ẽ|ẻ|ẹ|ề|ế|ễ|ể|ệ|е|э/' => 'e',
            '/Ф/' => 'F',
            '/ф/' => 'f',
            '/Ĝ|Ğ|Ġ|Ģ|Γ|Г|Ґ/' => 'G',
            '/ĝ|ğ|ġ|ģ|γ|г|ґ/' => 'g',
            '/Ĥ|Ħ/' => 'H',
            '/ĥ|ħ/' => 'h',
            '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Η|Ή|Ί|Ι|Ϊ|Ỉ|Ị|И|Ы/' => 'I',
            '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|η|ή|ί|ι|ϊ|ỉ|ị|и|ы|ї/' => 'i',
            '/Ĵ/' => 'J',
            '/ĵ/' => 'j',
            '/Ķ|Κ|К/' => 'K',
            '/ķ|κ|к/' => 'k',
            '/Ĺ|Ļ|Ľ|Ŀ|Ł|Λ|Л/' => 'L',
            '/ĺ|ļ|ľ|ŀ|ł|λ|л/' => 'l',
            '/М/' => 'M',
            '/м/' => 'm',
            '/Ñ|Ń|Ņ|Ň|Ν|Н/' => 'N',
            '/ñ|ń|ņ|ň|ŉ|ν|н/' => 'n',
            '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|Ο|Ό|Ω|Ώ|Ỏ|Ọ|Ồ|Ố|Ỗ|Ổ|Ộ|Ờ|Ớ|Ỡ|Ở|Ợ|О/' => 'O',
            '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|ο|ό|ω|ώ|ỏ|ọ|ồ|ố|ỗ|ổ|ộ|ờ|ớ|ỡ|ở|ợ|о/' => 'o',
            '/П/' => 'P',
            '/п/' => 'p',
            '/Ŕ|Ŗ|Ř|Ρ|Р/' => 'R',
            '/ŕ|ŗ|ř|ρ|р/' => 'r',
            '/Ś|Ŝ|Ş|Ș|Š|Σ|С/' => 'S',
            '/ś|ŝ|ş|ș|š|ſ|σ|ς|с/' => 's',
            '/Ț|Ţ|Ť|Ŧ|τ|Т/' => 'T',
            '/ț|ţ|ť|ŧ|т/' => 't',
            '/Þ|þ/' => 'th',
            '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ũ|Ủ|Ụ|Ừ|Ứ|Ữ|Ử|Ự|У/' => 'U',
            '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|υ|ύ|ϋ|ủ|ụ|ừ|ứ|ữ|ử|ự|у/' => 'u',
            '/Ý|Ÿ|Ŷ|Υ|Ύ|Ϋ|Ỳ|Ỹ|Ỷ|Ỵ|Й/' => 'Y',
            '/ý|ÿ|ŷ|ỳ|ỹ|ỷ|ỵ|й/' => 'y',
            '/В/' => 'V',
            '/в/' => 'v',
            '/Ŵ/' => 'W',
            '/ŵ/' => 'w',
            '/Ź|Ż|Ž|Ζ|З/' => 'Z',
            '/ź|ż|ž|ζ|з/' => 'z',
            '/Æ|Ǽ/' => 'AE',
            '/ß/' => 'ss',
            '/Ĳ/' => 'IJ',
            '/ĳ/' => 'ij',
            '/Œ/' => 'OE',
            '/ƒ/' => 'f',
            '/ξ/' => 'ks',
            '/π/' => 'p',
            '/β/' => 'v',
            '/μ/' => 'm',
            '/ψ/' => 'ps',
            '/Ё/' => 'Yo',
            '/ё/' => 'yo',
            '/Є/' => 'Ye',
            '/є/' => 'ye',
            '/Ї/' => 'Yi',
            '/Ж/' => 'Zh',
            '/ж/' => 'zh',
            '/Х/' => 'Kh',
            '/х/' => 'kh',
            '/Ц/' => 'Ts',
            '/ц/' => 'ts',
            '/Ч/' => 'Ch',
            '/ч/' => 'ch',
            '/Ш/' => 'Sh',
            '/ш/' => 'sh',
            '/Щ/' => 'Shch',
            '/щ/' => 'shch',
            '/Ъ|ъ|Ь|ь/' => '',
            '/Ю/' => 'Yu',
            '/ю/' => 'yu',
            '/Я/' => 'Ya',
            '/я/' => 'ya'
        );

        $str = preg_replace(array_keys($foreign_characters), array_values($foreign_characters), $str);

        $replace = ($separator == 'dash') ? '-' : '_';

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace . '+' => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            if (function_exists('mb_convert_case')) {
                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
            } else {
                $str = strtolower($str);
            }
        }

        $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str);

        return trim(stripslashes($str));
    }
}

?>