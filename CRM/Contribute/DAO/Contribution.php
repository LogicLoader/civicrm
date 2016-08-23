<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2016                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2016
 *
 * Generated from xml/schema/CRM/Contribute/Contribution.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Contribute_DAO_Contribution extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_contribution';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Contribution ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to Contact ID
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * FK to Financial Type for (total_amount - non_deductible_amount).
   *
   * @var int unsigned
   */
  public $financial_type_id;
  /**
   * The Contribution Page which triggered this contribution
   *
   * @var int unsigned
   */
  public $contribution_page_id;
  /**
   * FK to Payment Instrument
   *
   * @var int unsigned
   */
  public $payment_instrument_id;
  /**
   * Date contribution was received - not necessarily the creation date of the record
   *
   * @var datetime
   */
  public $receive_date;
  /**
   * Portion of total amount which is NOT tax deductible. Equal to total_amount for non-deductible financial types.
   *
   * @var float
   */
  public $non_deductible_amount;
  /**
   * Total amount of this contribution. Use market value for non-monetary gifts.
   *
   * @var float
   */
  public $total_amount;
  /**
   * actual processor fee if known - may be 0.
   *
   * @var float
   */
  public $fee_amount;
  /**
   * actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.
   *
   * @var float
   */
  public $net_amount;
  /**
   * unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method
   *
   * @var string
   */
  public $trxn_id;
  /**
   * unique invoice id, system generated or passed in
   *
   * @var string
   */
  public $invoice_id;
  /**
   * 3 character string, value from config setting or input via user.
   *
   * @var string
   */
  public $currency;
  /**
   * when was gift cancelled
   *
   * @var datetime
   */
  public $cancel_date;
  /**
   *
   * @var text
   */
  public $cancel_reason;
  /**
   * when (if) receipt was sent. populated automatically for online donations w/ automatic receipting
   *
   * @var datetime
   */
  public $receipt_date;
  /**
   * when (if) was donor thanked
   *
   * @var datetime
   */
  public $thankyou_date;
  /**
   * Origin of this Contribution.
   *
   * @var string
   */
  public $source;
  /**
   *
   * @var text
   */
  public $amount_level;
  /**
   * Conditional foreign key to civicrm_contribution_recur id. Each contribution made in connection with a recurring contribution carries a foreign key to the recurring contribution record. This assumes we can track these processor initiated events.
   *
   * @var int unsigned
   */
  public $contribution_recur_id;
  /**
   *
   * @var boolean
   */
  public $is_test;
  /**
   *
   * @var boolean
   */
  public $is_pay_later;
  /**
   *
   * @var int unsigned
   */
  public $contribution_status_id;
  /**
   * Conditional foreign key to civicrm_address.id. We insert an address record for each contribution when we have associated billing name and address data.
   *
   * @var int unsigned
   */
  public $address_id;
  /**
   *
   * @var string
   */
  public $check_number;
  /**
   * The campaign for which this contribution has been triggered.
   *
   * @var int unsigned
   */
  public $campaign_id;
  /**
   * unique credit note id, system generated or passed in
   *
   * @var string
   */
  public $creditnote_id;
  /**
   * Total tax amount of this contribution.
   *
   * @var float
   */
  public $tax_amount;
  /**
   * Stores the date when revenue should be recognized.
   *
   * @var datetime
   */
  public $revenue_recognition_date;
  /**
   * class constructor
   *
   * @return civicrm_contribution
   */
  function __construct()
  {
    $this->__table = 'civicrm_contribution';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'financial_type_id', 'civicrm_financial_type', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contribution_page_id', 'civicrm_contribution_page', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contribution_recur_id', 'civicrm_contribution_recur', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'address_id', 'civicrm_address', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'campaign_id', 'civicrm_campaign', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'contribution_id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution ID') ,
          'description' => 'Contribution ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_contribution.id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'contribution_contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'description' => 'FK to Contact ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_contribution.contact_id',
          'headerPattern' => '/contact(.?id)?/i',
          'dataPattern' => '/^\d+$/',
          'export' => true,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => array(
            'type' => 'EntityRef',
          ) ,
        ) ,
        'financial_type_id' => array(
          'name' => 'financial_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Type') ,
          'description' => 'FK to Financial Type for (total_amount - non_deductible_amount).',
          'export' => false,
          'where' => 'civicrm_contribution.financial_type_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'FKClassName' => 'CRM_Financial_DAO_FinancialType',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_financial_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'contribution_page_id' => array(
          'name' => 'contribution_page_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution Page ID') ,
          'description' => 'The Contribution Page which triggered this contribution',
          'import' => true,
          'where' => 'civicrm_contribution.contribution_page_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Contribute_DAO_ContributionPage',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_contribution_page',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
        'payment_instrument_id' => array(
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method') ,
          'description' => 'FK to Payment Instrument',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          )
        ) ,
        'receive_date' => array(
          'name' => 'receive_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Date Received') ,
          'description' => 'Date contribution was received - not necessarily the creation date of the record',
          'import' => true,
          'where' => 'civicrm_contribution.receive_date',
          'headerPattern' => '/receive(.?date)?/i',
          'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'non_deductible_amount' => array(
          'name' => 'non_deductible_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Non-deductible Amount') ,
          'description' => 'Portion of total amount which is NOT tax deductible. Equal to total_amount for non-deductible financial types.',
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_contribution.non_deductible_amount',
          'headerPattern' => '/non?.?deduct/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'total_amount' => array(
          'name' => 'total_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Total Amount') ,
          'description' => 'Total amount of this contribution. Use market value for non-monetary gifts.',
          'required' => true,
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_contribution.total_amount',
          'headerPattern' => '/^total|(.?^am(ou)?nt)/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'fee_amount' => array(
          'name' => 'fee_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Fee Amount') ,
          'description' => 'actual processor fee if known - may be 0.',
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_contribution.fee_amount',
          'headerPattern' => '/fee(.?am(ou)?nt)?/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'net_amount' => array(
          'name' => 'net_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Net Amount') ,
          'description' => 'actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.',
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_contribution.net_amount',
          'headerPattern' => '/net(.?am(ou)?nt)?/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'trxn_id' => array(
          'name' => 'trxn_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction ID') ,
          'description' => 'unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contribution.trxn_id',
          'headerPattern' => '/tr(ansactio|x)n(.?id)?/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'invoice_id' => array(
          'name' => 'invoice_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Invoice ID') ,
          'description' => 'unique invoice id, system generated or passed in',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contribution.invoice_id',
          'headerPattern' => '/invoice(.?id)?/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'currency' => array(
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Currency') ,
          'description' => '3 character string, value from config setting or input via user.',
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'import' => true,
          'where' => 'civicrm_contribution.currency',
          'headerPattern' => '/cur(rency)?/i',
          'dataPattern' => '/^[A-Z]{3}$/i',
          'export' => true,
          'default' => 'NULL',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_currency',
            'keyColumn' => 'name',
            'labelColumn' => 'full_name',
            'nameColumn' => 'name',
          )
        ) ,
        'cancel_date' => array(
          'name' => 'cancel_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Cancel Date') ,
          'description' => 'when was gift cancelled',
          'import' => true,
          'where' => 'civicrm_contribution.cancel_date',
          'headerPattern' => '/cancel(.?date)?/i',
          'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'cancel_reason' => array(
          'name' => 'cancel_reason',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Cancel Reason') ,
          'import' => true,
          'where' => 'civicrm_contribution.cancel_reason',
          'headerPattern' => '/(cancel.?)?reason/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'receipt_date' => array(
          'name' => 'receipt_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Receipt Date') ,
          'description' => 'when (if) receipt was sent. populated automatically for online donations w/ automatic receipting',
          'import' => true,
          'where' => 'civicrm_contribution.receipt_date',
          'headerPattern' => '/receipt(.?date)?/i',
          'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'thankyou_date' => array(
          'name' => 'thankyou_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Thank-you Date') ,
          'description' => 'when (if) was donor thanked',
          'import' => true,
          'where' => 'civicrm_contribution.thankyou_date',
          'headerPattern' => '/thank(s|(.?you))?(.?date)?/i',
          'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'contribution_source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contribution Source') ,
          'description' => 'Origin of this Contribution.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contribution.source',
          'headerPattern' => '/source/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'amount_level' => array(
          'name' => 'amount_level',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Amount Label') ,
          'import' => true,
          'where' => 'civicrm_contribution.amount_level',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'contribution_recur_id' => array(
          'name' => 'contribution_recur_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Recurring Contribution ID') ,
          'description' => 'Conditional foreign key to civicrm_contribution_recur id. Each contribution made in connection with a recurring contribution carries a foreign key to the recurring contribution record. This assumes we can track these processor initiated events.',
          'FKClassName' => 'CRM_Contribute_DAO_ContributionRecur',
        ) ,
        'is_test' => array(
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Test') ,
          'import' => true,
          'where' => 'civicrm_contribution.is_test',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'is_pay_later' => array(
          'name' => 'is_pay_later',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Pay Later') ,
          'import' => true,
          'where' => 'civicrm_contribution.is_pay_later',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'contribution_status_id' => array(
          'name' => 'contribution_status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution Status ID') ,
          'import' => true,
          'where' => 'civicrm_contribution.contribution_status_id',
          'headerPattern' => '/status/i',
          'dataPattern' => '',
          'export' => true,
          'default' => '1',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'contribution_status',
            'optionEditPath' => 'civicrm/admin/options/contribution_status',
          )
        ) ,
        'address_id' => array(
          'name' => 'address_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution Address') ,
          'description' => 'Conditional foreign key to civicrm_address.id. We insert an address record for each contribution when we have associated billing name and address data.',
          'FKClassName' => 'CRM_Core_DAO_Address',
        ) ,
        'check_number' => array(
          'name' => 'check_number',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Check Number') ,
          'maxlength' => 255,
          'size' => 6,
          'import' => true,
          'where' => 'civicrm_contribution.check_number',
          'headerPattern' => '/check(.?number)?/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'contribution_campaign_id' => array(
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign') ,
          'description' => 'The campaign for which this contribution has been triggered.',
          'import' => true,
          'where' => 'civicrm_contribution.campaign_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_campaign',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
        'creditnote_id' => array(
          'name' => 'creditnote_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Credit Note ID') ,
          'description' => 'unique credit note id, system generated or passed in',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contribution.creditnote_id',
          'headerPattern' => '/creditnote(.?id)?/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'tax_amount' => array(
          'name' => 'tax_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Tax Amount') ,
          'description' => 'Total tax amount of this contribution.',
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_contribution.tax_amount',
          'headerPattern' => '/tax(.?am(ou)?nt)?/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'revenue_recognition_date' => array(
          'name' => 'revenue_recognition_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Revenue Recognition Date') ,
          'description' => 'Stores the date when revenue should be recognized.',
          'import' => true,
          'where' => 'civicrm_contribution.revenue_recognition_date',
          'headerPattern' => '/revenue(.?date)?/i',
          'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'contribution_id',
        'contact_id' => 'contribution_contact_id',
        'financial_type_id' => 'financial_type_id',
        'contribution_page_id' => 'contribution_page_id',
        'payment_instrument_id' => 'payment_instrument_id',
        'receive_date' => 'receive_date',
        'non_deductible_amount' => 'non_deductible_amount',
        'total_amount' => 'total_amount',
        'fee_amount' => 'fee_amount',
        'net_amount' => 'net_amount',
        'trxn_id' => 'trxn_id',
        'invoice_id' => 'invoice_id',
        'currency' => 'currency',
        'cancel_date' => 'cancel_date',
        'cancel_reason' => 'cancel_reason',
        'receipt_date' => 'receipt_date',
        'thankyou_date' => 'thankyou_date',
        'source' => 'contribution_source',
        'amount_level' => 'amount_level',
        'contribution_recur_id' => 'contribution_recur_id',
        'is_test' => 'is_test',
        'is_pay_later' => 'is_pay_later',
        'contribution_status_id' => 'contribution_status_id',
        'address_id' => 'address_id',
        'check_number' => 'check_number',
        'campaign_id' => 'contribution_campaign_id',
        'creditnote_id' => 'creditnote_id',
        'tax_amount' => 'tax_amount',
        'revenue_recognition_date' => 'revenue_recognition_date',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['contribution'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['contribution'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
