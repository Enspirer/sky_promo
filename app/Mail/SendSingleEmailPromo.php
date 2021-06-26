<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\SingleCampaign;
use App\Models\SingleCampaignStatics;
use App\Models\CompanyDetails;
use App\Models\EmailBuilk;


class SendSingleEmailPromo extends Mailable
{
    
    // use  Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $id;
    public $campaign_name;

    public function __construct($id,$campaign_name)
    {
        $this->id = $id;
        $this->campaign_name = $campaign_name;
        // dd($this->id);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $campaigns = SingleCampaign::where('id',$this->id)->first();           

                       
        $campaign_data = json_decode($campaigns->json_data);

        $out = [];

        foreach($campaign_data as $camp){
            // dd($camp);
            $company_detail = CompanyDetails::where('id',$camp->company_id)->first();
            // dd($company_detail);
            array_push($out,$company_detail->company_name);
        }
             
        return $this->subject($this->campaign_name)
            ->view('frontend.mail.sky_promo_single_email',[
                'campaigns' => $campaigns,
                'company' => $out
            ]);
    }


}
