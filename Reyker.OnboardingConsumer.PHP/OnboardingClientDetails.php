<?php


class OnboardingClientDetails {

	//[Required]
    public $Title = "Ms.";

    //[Required]
    public $Forenames = "Beatrice";

    //[Required]
    public $Surname = "Volk";

    //[Required] (Between 1 and 244)
    public $CountryOfBirth = 1;

    //[Required]
    public $EmailAddress = "BeatriceJVolk@dayrep.com";

    //[Required]
    public $EmailType = "Work";

    //[Required]
	public $BirthDate;

    public $Suffix = "";
    public $NationalInsuranceNumber = "NITESTValue";

    //[Required]
    public $PrimaryAddress;

    public $AdditionalAddresses;

    //[Required]
    public $PrimaryTelephone;
    public $AdditionalTelephone;

    //[Required]
    public $BankAccount;

    //[Required]
    public $PrimaryCitizenship;
    public $AdditionalCitizenship;

    //[Required]
    public $ExternalCustomerId = "12345";

    //[Required]
    public $ExternalPlanId = "P4545";
    public $PlanType = 4;
    public $MiddleNames = "W";
    public $PlaceOfBirth = "London";
    public $OnlineValuation = true;
    public $PrincipalNationality;
    public $AdditionalNationality;

	function __construct()
    {
        $this->BirthDate = "/Date(". strtotime("10 September 1977") . ")/";
        $this->PrimaryAddress = new Address();
        $this->AdditionalAddresses = array(new Address(),new Address());
        $this->PrimaryTelephone = new OnboardingTelephoneNumber();
        $this->AdditionalTelephone = array(new OnboardingTelephoneNumber(),new OnboardingTelephoneNumber());
        $this->BankAccount = new OnboardingBankAccount();
        $this->PrimaryCitizenship = new OnboardingCitizenship();
        $this->AdditionalCitizenship = array (new OnboardingCitizenship(),new OnboardingCitizenship());
        $this->PrincipalNationality = new OnboardingPrincipalNationality();
        $this->AdditionalNationality = new OnboardingPrincipalNationality();
    }

}
class Address {
    //[Required]
    public $Address1 = "17 Moorgate";

    public $Address2 = "";

    //[Required]
    public $City = "London";

    public $County  = "";

    //[Required]
    public $Postcode = "ec2r 6ar";

    //[Required]
    //Between 1 and  244
    public $Country = 4;

    //[Required]
    public $AddressType = 1;
}

class OnboardingCitizenship
{
    public $CountryOfResidency = 1;
    public $TaxIdentificationNumber ="445010101";
}

class OnboardingTelephoneNumber {

    //[Required]
    public $Number = "5048491752";

    //[Required]
    public $DialingCode = "44";

    //[Required]
    public $TelephoneType = "1";
}


class OnboardingBankAccount {

    //[Required]
    public $AccountName = "Beatrice Volk";

    //[Required]
    public $AccountNumber = "7659708042";

    //[Required]
    public $SortCode = "01-01-01";
}

class OnboardingPrincipalNationality {
    public $CountryId = 1;
    public $PrincipalNCI = "P434523";
    public $PrincipalNationalityType = "Primary";
}



?>