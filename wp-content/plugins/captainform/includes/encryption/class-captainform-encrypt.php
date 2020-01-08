<?php
/**
 * The file that defines the encryption class
 *
 * A class definition that encrypts the parameters used in the admin area.
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes/encryption
 */

/**
 * This class is responsible for encrypting the parameters used in the admin area
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes/encryption
 * @author     captainform <team@captainform.com>
 */
class Captainform_Encrypt
{
	public static $cryptKey = 'q923Mr!x';

	public static function encrypt($str)
	{
		$str_arr = str_split($str);
		$pass_arr = str_split(self::$cryptKey);
		$add = 0;
		$div = strlen($str) / strlen(self::$cryptKey);
		while ($add <= $div) {
			if (!isset($newpass))
				$newpass = '';
			$newpass .= self::$cryptKey;
			$add++;
		}
		$pass_arr = str_split($newpass);
		foreach ($str_arr as $key => $asc) {
			if (!isset($ascii))
				$ascii = "";
			$pass_int = ord($pass_arr[$key]);
			$str_int = ord($asc);
			$int_add = $str_int + $pass_int;
			$ascii .= chr($int_add);
		}
		return '===' . self::base64url_encode($ascii);
	}

	public static function decrypt($enc)
	{
		if (self::left($enc, 3) == '===') {
			$enc = self::base64url_decode(self::trim_left($enc, 3));
			if (strlen($enc) == 0) {
				return '';
			}
			$enc_arr = str_split($enc);
			$pass_arr = str_split(self::$cryptKey);
			$add = 0;
			$div = strlen($enc) / strlen(self::$cryptKey);
			while ($add <= $div) {
				$newpass .= self::$cryptKey;
				$add++;
			}
			$pass_arr = str_split($newpass);
			foreach ($enc_arr as $key => $asc) {
				$pass_int = ord($pass_arr[$key]);
				$enc_int = ord($asc);
				$str_int = $enc_int - $pass_int;
				$ascii .= chr($str_int);
			}
			return $ascii;
		} else {
			return 'INVALID-STRING-TO-DECRYPT.CONTACT-SUPPORT-IF-NEEDED.';
		}
	}


	public static function base64url_encode($data)
	{
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public static function base64url_decode($data)
	{
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

	public static function right($value, $count)
	{
		return substr($value, ($count * -1));
	}

	public static function left($string, $count)
	{
		return substr($string, 0, $count);
	}

	public static function trim_left($string, $count)
	{
		return substr($string, $count);
	}
}