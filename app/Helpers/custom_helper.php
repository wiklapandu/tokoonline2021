<?php
function checklog(string $lokasi = '/')
{
    if (!session()->get('user_id')) {
        return redirect()->to($lokasi);
    }
}
