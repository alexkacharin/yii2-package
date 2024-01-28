<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace common\models;

use Da\User\Helper\SecurityHelper;
use Da\User\Model\SocialNetworkAccount;
use Da\User\Query\UserQuery;
use Da\User\Traits\ContainerAwareTrait;
use Da\User\Traits\ModuleAwareTrait;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\Application;
use yii\web\IdentityInterface;

/**
 * User ActiveRecord model.
 *
 * @property bool $isAdmin
 * @property bool $isBlocked
 * @property bool $isConfirmed  whether user account has been confirmed or not
 * @property bool $gdpr_deleted whether user requested deletion of his account
 * @property bool $gdpr_consent whether user has consent personal data processing
 *
 * Database fields:
 * @property int                    $id
 * @property string                 $username
 * @property string                 $email
 * @property string                 $unconfirmed_email
 * @property string                 $password_hash
 * @property string                 $auth_key
 * @property string                 $auth_tf_key
 * @property int                    $auth_tf_enabled
 * @property string                 $auth_tf_type
 * @property string                 $auth_tf_mobile_phone
 * @property string                 $registration_ip
 * @property int                    $confirmed_at
 * @property int                    $blocked_at
 * @property int                    $flags
 * @property int                    $created_at
 * @property int                    $updated_at
 * @property int                    $last_login_at
 * @property int                    $gdpr_consent_date     date of agreement of data processing
 * @property string                 $last_login_ip
 * @property int                    $password_changed_at
 * @property int                    $password_age
 *                                                         Defined relations:
 * @property SocialNetworkAccount[] $socialNetworkAccounts
 * @property Profile                $profile
 * @property Games[]                $games
 */
class
User extends \Da\User\Model\User
{

}
