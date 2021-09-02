<?php

namespace App\Http\Helpers;

use Illuminate\Support\Str;

class Helper
{
	public static function showStatus(int $status = 0)
	{
		$html = '';

		switch ($status) {
			case 1:
				$html = '<span class="badge badge-success">Public</span>';
				break;

			case 2:
				$html = '<span class="badge badge-dark">Private</span>';
				break;

			case 3:
				$html = '<span class="badge badge-danger">Password protected</span>';
				break;
			
			default:
				return false;
				break;
		}

		return $html;
	}

	public static function strLimit(string $str, $limit = 200)
	{
		return Str::limit(strip_tags(htmlspecialchars_decode($str), '<p>'), $limit, ' (...)');
	}

	public static function showVerification($email_verified_at)
	{
		if ($email_verified_at) return 'Your account is already verified.';

		return 'Your account is not verified. Please check your email for a verification link.
				<br>
				<form class="d-inline" method="POST" action="' . route('verification.resend') . '">
					<input type="hidden" name="_token" value="' . csrf_token() . '" />
                    <button type="submit" class="btn btn-link p-0">Resend email verification</button>
                </form>';
	}
}