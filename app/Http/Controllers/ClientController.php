<?php
use Auth;

/* Process the logout request */
public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with(['msg_body' => 'You signed out!']);
}