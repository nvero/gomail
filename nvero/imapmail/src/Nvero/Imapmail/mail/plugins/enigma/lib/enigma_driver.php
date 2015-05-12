<?php

/*
 +-------------------------------------------------------------------------+
 | Abstract driver for the Enigma Plugin                                   |
 |                                                                         |
 | Copyright (C) 2010-2015 The Roundcube Dev Team                          |
 |                                                                         |
 | Licensed under the GNU General Public License version 3 or              |
 | any later version with exceptions for skins & plugins.                  |
 | See the README file for a full license statement.                       |
 |                                                                         |
 +-------------------------------------------------------------------------+
 | Author: Aleksander Machniak <alec@alec.pl>                              |
 +-------------------------------------------------------------------------+
*/

abstract class enigma_driver
{
    /**
     * Class constructor.
     *
     * @param string User name (email address)
     */
    abstract function __construct($user);

    /**
     * Driver initialization.
     *
     * @return mixed NULL on success, enigma_error on failure
     */
    abstract function init();

    /**
     * Encryption.
     */
    abstract function encrypt($text, $keys);

    /**
     * Decryption..
     *
     * @param string Encrypted message
     * @param array  List of key-password mapping
     */
    abstract function decrypt($text, $keys = array());

    /**
     * Signing.
     */
    abstract function sign($text, $key, $passwd, $mode = null);

    /**
     * Signature verification.
     *
     * @param string Message body
     * @param string Signature, if message is of type PGP/MIME and body doesn't contain it
     *
     * @return mixed Signature information (enigma_signature) or enigma_error
     */
    abstract function verify($text, $signature);

    /**
     * Key/Cert file import.
     *
     * @param string  File name or file content
     * @param bollean True if first argument is a filename
     *
     * @return mixed Import status array or enigma_error
     */
    abstract function import($content, $isfile=false);

    /**
     * Keys listing.
     *
     * @param string Optional pattern for key ID, user ID or fingerprint
     *
     * @return mixed Array of enigma_key objects or enigma_error
     */
    abstract function list_keys($pattern='');

    /**
     * Single key information.
     *
     * @param string Key ID, user ID or fingerprint
     *
     * @return mixed Key (enigma_key) object or enigma_error
     */
    abstract function get_key($keyid);

    /**
     * Key pair generation.
     *
     * @param array Key/User data
     *
     * @return mixed Key (enigma_key) object or enigma_error
     */
    abstract function gen_key($data);

    /**
     * Key deletion.
     */
    abstract function delete_key($keyid);
}
