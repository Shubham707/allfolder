
    $(document).ready(function(){
        // Countries
        var country_arr = new Array("Select Country","INDIA");

        $.each(country_arr, function (i, item) {
            $('#country').append($('<option>', {
                value: i,
                text : item,
            }, '</option>' ));
        });

        // States
        var s_a = new Array();
        s_a[0]="Select State";
        s_a[1]="Select State|Andamanand Nicobar Islands|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Odisha|Puducherry|Punjab|Rajasthan|Tamil Nadu|Telangana|Tripura|Uttar Pradesh|Uttarakhand|West Bengal";

        // Cities
        var c_a = new Array();

        c_a['Andamanand Nicobar Islands']="Select City|Port Blair*";
        c_a['Andhra Pradesh']="Select City|Adoni|Amalapuram|Anakapalle|Anantapur|Bapatla|Bheemunipatnam|Bhimavaram|Bobbili|Chilakaluripet|Chirala|Chittoor|Dharmavaram|Eluru|Gooty|Gudivada|Gudur|Guntakal|Guntur|Hindupur|Jaggaiahpet|Jammalamadugu|Kadapa|Kadiri|Kakinada|Kandukur|Kavali|Kovvur|Kurnool|Macherla|Machilipatnam|Madanapalle|Mandapeta|Markapur|Nagari|Naidupet|Nandyal|Narasapuram|Narasaraopet|Narsipatnam|Nellore|Nidadavole|Nuzvid|Ongole|Palacole|Palasa Kasibugga|Parvathipuram|Pedana|Peddapuram|Pithapuram|Ponnur|Proddatur|Punganur|Puttur|Rajahmundry|Rajam|Rajampet|Ramachandrapuram|Rayachoti|Rayadurg|Renigunta|Repalle|Salur|Samalkot|Sattenapalle|Srikakulam|Srikalahasti|Srisailam Project (Right Flank Colony) Township|Sullurpeta|Tadepalligudem|Tadpatri|Tanuku|Tenali|Tirupati|Tiruvuru|Tuni|Uravakonda||Venkatagiri||Vijayawada|Vinukonda|Visakhapatnam|Vizianagaram|Yemmiganur|Yerraguntla";
        c_a['Arunachal Pradesh']="Select City|Naharlagun|Pasighat";
        c_a['Assam']="Select City|Barpeta|Bongaigaon City|Dhubri|Dibrugarh|Diphu|Goalpara|Guwahati|Jorhat|Karimganj|Lanka|Lumding|Mangaldoi|Mankachar|Margherita|Mariani|Marigaon|Nagaon|Nalbari|North Lakhimpur|Rangia|Sibsagar|Silapathar|Silchar|Tezpur|Tinsukia";
        c_a['Bihar']="Select City|Araria|Arrah|Arwal|Asarganj|Aurangabad|Bagaha|Barh|Begusarai|Bettiah|Bhabua|Bhagalpur|Buxar|Chhapra|Darbhanga|Dehri-on-Sone|Dumraon|Forbesganj|Gaya|Gopalganj|Hajipur|Jamalpur|Jamui|Jehanabad|Katihar|Kishanganj|Lakhisarai|Lalganj|Madhepura|Madhubani|Maharajganj|Mahnar Bazar|Makhdumpur|Maner|Manihari|Marhaura|Masaurhi|Mirganj|Mokameh|Motihari|Motipur|Munger|Murliganj|Muzaffarpur|Narkatiaganj|Naugachhia|Nawada|Nokha|Patna*|Piro|Purnia|Rafiganj|Rajgir|Ramnagar|Raxaul Bazar|Revelganj|Rosera|Saharsa|Samastipur|Sasaram|Sheikhpura|Sheohar|Sherghati|Silao|Sitamarhi|Siwan|Sonepur|Sugauli|Sultanganj|Supaul|Warisaliganj";
        c_a['Chandigarh']="Select City|Chandigarh*";
        c_a['Chhattisgarh']="Select City|Ambikapur|Bhatapara|Bhilai Nagar|Bilaspur|Chirmiri|Dalli-Rajhara|Dhamtari|Durg|Jagdalpur|Korba|Mahasamund|Manendragarh|Mungeli|Naila Janjgir|Raigarh|Raipur*|Rajnandgaon|Sakti|Tilda Newra";
        c_a['Dadra and Nagar Haveli']="Select City|Silvassa*";
        c_a['Delhi']="Select City|Delhi|New Delhi*";
        c_a['Goa']="Select City|Mapusa|Margao|Marmagao|Panaji";
        c_a['Gujarat']="Select City|Adalaj|Ahmedabad|Amreli|Anand|Anjar|Ankleshwar|Bharuch|Bhavnagar|Bhuj|Chhapra|Deesa|Dhoraji|Godhra|Jamnagar|Kadi|Kapadvanj|Keshod|Khambhat|Lathi|Limbdi|Lunawada|Mahesana|Mahuva|Manavadar|Mandvi|Mangrol|Mansa|Mahemdabad|Modasa|Morvi|Nadiad|Navsari|Padra|Palanpur|Palitana|Pardi|Patan|Petlad|Porbandar|Radhanpur|Rajkot|Rajpipla|Rajula|Ranavav|Rapar|Salaya|Sanand|Savarkundla|Sidhpur|Sihor|Songadh|Surat|Talaja|Thangadh|Tharad|Umbergaon|Umreth|Una|Unjha|Upleta|Vadnagar|Vadodara|Valsad|Vapi|Veraval|Vijapur|Viramgam|Visnagar|Vyara|Wadhwan|Wankaner";
         c_a['Haryana']="Select City|Bahadurgarh|Bhiwani|Charkhi Dadri|Faridabad|Fatehabad|Gohana|Gurgaon|Hansi|Hisar|Jind|Kaithal|Karnal|Ladwa|Mahendragarh|Mandi Dabwali|Narnaul|Narwana|Palwal|Panchkula|Panipat|Pehowa|Pinjore|Rania|Ratia|Rewari|Rohtak|Safidon|Samalkha|Sarsod|Shahbad|Sirsa|Sohna|Sonipat|Taraori|Thanesar|Tohana|Yamunanagar";
        c_a['Himachal Pradesh']="Select City|Mandi|Nahan|Palampur|Shimla|Solan|Sundarnagar";
        c_a['Jammu and Kashmir']="Select City|Anantnag|Baramula|Jammu|Kathua|Punch|Rajauri|Sopore|Srinagar*|HUdhampur";
         c_a['Jharkhand']="Select City|Adityapur|Bokaro Steel City|Chaibasa|Chatra|Chirkunda|Medininagar (Daltonganj)|Deoghar|Dhanbad|Dumka|Giridih|Gumia|Hazaribag|Jamshedpur|Jhumri Tilaiya|Lohardaga|Madhupur|Mihijam|Musabani|Pakaur|Patratu|Phusro|Ramgarh|Ranchi*|Sahibganj|Saunda|Simdega|Tenu dam-cum-Kathhara";
        c_a['Karnataka']="Select City|Adyar|Mysore|Afzalpur|Arsikere|Athni|Bengaluru|Belagavi|Ballari|Chikkamagaluru|Davanagere|Gokak|Hubli-Dharwad|Karwar|Kolar|Lakshmeshwar|Lingsugur|Maddur|Madhugiri|Madikeri|Magadi|Mahalingapura|Malavalli|Malur|Mandya|Mangaluru|Manvi|Mudalagi|Mudabidri|Muddebihal|Mudhol|Mulbagal|Mundargi|Nanjangud|Nargund|Navalgund|Nelamangala|Pavagada|Piriyapatna|Puttur|Rabkavi Banhatti|Raayachuru|Ranebennuru|Ramanagaram|Ramdurg|Ranibennur|Robertson Pet|Ron|Sadalagi|Sagara|Sakaleshapura|Sindagi|Sanduru|Sankeshwara|Saundatti-Yellamma|Savanur|Sedam|Shahabad|Shahpur|Shiggaon|Shikaripur|Shivamogga|Surapura|Shrirangapattana|Sidlaghatta|Sindhagi|Sindhnur|Sira|Sirsi|Siruguppa|Srinivaspur|Tarikere|Tekkalakote|Terdal|Talikota|Tiptur|Tumkur|Udupi|Vijayapura|Wadi|Yadgir";
        c_a['Kerala']="Select City| Adoor|Alappuzha|Attingal|Chalakudy|Changanassery|Cherthala|Chittur-Thathamangalam|Guruvayoor|Kanhangad|Kannur|Kasaragod|Kayamkulam|Kochi|Kodungallur|Kollam|Kottayam|Kozhikode|Kunnamkulam|Malappuram|Mattannur|Mavelikkara|Mavoor|Muvattupuzha|Nedumangad|Neyyattinkara|Nilambur|Ottappalam|Palai|Palakkad|Panamattom|Panniyannur|Pappinisseri|Paravoor|Pathanamthitta|Peringathur|Perinthalmanna|Perumbavoor|Ponnani|Punalur|Puthuppally|Koyilandy|Shoranur|Taliparamba|Thiruvalla|Thiruvananthapuram|Thodupuzha|Thrissur|Tirur|Vaikom|Varkala|Vatakara";
         c_a['Madhya Pradesh']="Select City|Alirajpur|Ashok Nagar|Balaghat|Bhopal|Ganjbasoda|Gwalior|Indore|Itarsi|Jabalpur|Maharajpur|Mahidpur|Maihar|Malaj Khand|Manasa|Manawar|Mandideep|Mandla|Mandsaur|Mauganj|Mhow Cantonment|Mhowgaon|Morena|Multai|Mundi|Murwara (Katni)|Nagda|Nainpur|Narsinghgarh|Neemuch|Nepanagar|Niwari|Nowgong|Nowrozabad (Khodargama)|Pachore|Pali|Panagar|Pandhurna|Panna|Pasan|Pipariya|Pithampur|Porsa|Prithvipur|Raghogarh-Vijaypur|Rahatgarh|Raisen|Rajgarh|Ratlam|Rau|Rehli|Rewa|Sabalgarh|Sagar|Sanawad|Sarangpur|Sarni|Satna|Sausar|Sehore|Sendhwa|Seoni|Seoni-Malwa|Shahdol|Shajapur|Shamgarh|Sheopur|Shivpuri|Shujalpur|Sidhi|Sihora|Singrauli|Sironj|Sohagpur|Tarana|Tikamgarh|Ujjain|Umaria|Vidisha|Vijaypur|Wara Seoni";
        c_a['Maharashtra']="Select City|Ahmednagar|Akola|Akot|Amalner|Ambejogai|Amravati|Anjangaon|Arvi|Aurangabad|Bhiwandi|Dhule|Kalyan-Dombivali|Ichalkaranji|Kalyan-Dombivali|Karjat|Latur|Loha|Lonar|Lonavla|Mahad|Malegaon|Malkapur|Mangalvedhe|Mangrulpir|Manjlegaon|Manmad|Manwath|Mehkar|Mhaswad|Mira-Bhayandar|Morshi|Mukhed|Mul|Greater Mumbai*|Murtijapur|Nagpur|Nanded-Waghala|Nandgaon|Nandura|Nandurbar|Narkhed|Nashik|Navi Mumbai|Nawapur|Nilanga|Osmanabad|Ozar|Pachora|Paithan|Palghar|Pandharkaoda|Pandharpur|Panvel|Parbhani|Parli|Partur|Pathardi|Pathri|Patur|Pauni|Pen|Phaltan|Pulgaon|Pune|Purna|Pusad|Rahuri|Rajura|Ramtek|Ratnagiri|Raver|Risod|Sailu|Sangamner|Sangli|Sangole|Sasvad|Satana|Satara|Savner|Sawantwadi|Shahade|Shegaon|Shendurjana|Shirdi|Shirpur-Warwade|Shirur|Shrigonda|Shrirampur|Sillod|Sinnar|Solapur|Soyagaon|Talegaon Dabhade|Talode|Tasgaon|Thane|Tirora|Tuljapur|Tumsar|Uchgaon|Udgir|Umarga|Umarkhed|Umred|Uran|Uran Islampur|Vadgaon Kasba|Vaijapur|Vasai-Virar|Vita|Wadgaon Road|Wai|Wani|Wardha|Warora|Warud|Washim|Yavatmal|Yawal|Yevla";
        c_a['Manipur']="Select City|Imphal|Lilong|Mayang Imphal|Thoubal";
         c_a['Meghalaya']="Select City|Nongstoin|Shillong|Tura";
        c_a['Mizoram']="Select City|Aizawl|Lunglei|Saiha";
        c_a['Nagaland']="Select City|Dimapur|Kohima|Mokokchung|Tuensang|Wokha|Zunheboto";
         c_a['Odisha']="Select City|Balangir|Baleshwar Town|Barbil|Bargarh|Baripada Town|Bhadrak|Bhawanipatna|Bhubaneswar*|Brahmapur|Byasanagar|Cuttack|Dhenkanal|Jatani|Jharsuguda|Kendrapara|Kendujhar|Malkangiri|Nabarangapur|Paradip|Parlakhemundi|Pattamundai|Phulabani|Puri|Rairangpur|Rajagangapur|Raurkela|Rayagada|Sambalpur|Soro|Sunabeda|Sundargarh|Talcher|Tarbha|Titlagarh";
        c_a['Puducherry']="Select City|Karaikal|Mahe|Pondicherry|Yanam";
        c_a['Punjab']="Select City|Amritsar|Barnala|Batala|Bathinda|Dhuri|Faridkot|Fazilka|Firozpur|Firozpur Cantt.|Gobindgarh|Gurdaspur|Hoshiarpur|Jagraon|Jalandhar Cantt.|Jalandhar|Kapurthala|Khanna|Kharar|Kot Kapura|Longowal|Ludhiana|Malerkotla|Malout|Mansa|Moga|Mohali|Morinda| India|Mukerian|Muktsar|Nabha|Nakodar|Nangal|Nawanshahr|Pathankot|Patiala|Pattran|Patti|Phagwara|Phillaur|Qadian|Raikot|Rajpura|Rampura Phul|Rupnagar|Samana|Sangrur|Sirhind Fatehgarh Sahib|Sujanpur|Sunam|Talwara|Tarn Taran|Urmar Tanda|Zira|Zirakpur";
         c_a['Rajasthan']="Select City|Ajmer|Alwar|Bikaner|Bharatpur|Bhilwara|Jaipur*|Jodhpur|Lachhmangarh|Ladnu|Lakheri|Lalsot|Losal|Makrana|Malpura|Mandalgarh|Mandawa|Mangrol|Merta City|Mount Abu|Nadbai|Nagar|Nagaur|Nasirabad|Nathdwara|Neem-Ka-Thana|Nimbahera|Nohar|Nokha|Pali|Phalodi|Phulera|Pilani|Pilibanga|Pindwara|Pipar City|Prantij|Pratapgarh|Raisinghnagar|Rajakhera|Rajaldesar|Rajgarh (Alwar)|Rajgarh (Churu)|Rajsamand|Ramganj Mandi|Ramngarh|Ratangarh|Rawatbhata|Rawatsar|Reengus|Sadri|Sadulshahar|Sadulpur|Sagwara|Sambhar|Sanchore|Sangaria|Sardarshahar|Sawai Madhopur|Shahpura|Shahpura|Sheoganj|Sikar|Sirohi|Sojat|Sri Madhopur|Sujangarh|Sumerpur|Suratgarh|Taranagar|Todabhim|Todaraisingh|Tonk|Udaipur|Udaipurwati|Vijainagar| Ajmer";
        c_a['TamilNadu']="Select City|Arakkonam|Aruppukkottai|Chennai*|Coimbatore|Erode|Gobichettipalayam|Kancheepuram|Karur|Lalgudi|Madurai|Manachanallur|Nagapattinam|Nagercoil|Namagiripettai|Namakkal|Nandivaram-Guduvancheri|Nanjikottai|Natham|Nellikuppam|Neyveli (TS)|O' Valley|Oddanchatram|P.N.Patti|Pacode|Padmanabhapuram|Palani|Palladam|Pallapatti|Pallikonda|Panagudi|Panruti|Paramakudi|Parangipettai|Pattukkottai|Perambalur|Peravurani|Periyakulam|Periyasemur|Pernampattu|Pollachi|Polur|Ponneri|Pudukkottai|Pudupattinam|Puliyankudi|Punjaipugalur|Ranipet|Rajapalayam|Ramanathapuram|Rameshwaram|Rasipuram|Salem|Sankarankoil|Sankari|Sathyamangalam|Sattur|Shenkottai|Sholavandan|Sholingur|Sirkali|Sivaganga|Sivagiri|Sivakasi|Srivilliputhur|Surandai|Suriyampalayam|Tenkasi|Thammampatti|Thanjavur|Tharamangalam|Tharangambadi|Theni Allinagaram|Thirumangalam|Thirupuvanam|Thiruthuraipoondi|Thiruvallur|Thiruvarur|Thuraiyur|Tindivanam|Tiruchendur|Tiruchengode|Tiruchirappalli|Tirukalukundram|Tirukkoyilur|Tirunelveli|Tirupathur|Tirupathur|Tiruppur|Tiruttani|Tiruvannamalai|Tiruvethipuram|Tittakudi|Udhagamandalam|Udumalaipettai|Unnamalaikadai|Usilampatti|Uthamapalayam|Uthiramerur|Vadakkuvalliyur|Vadalur|Vadipatti|Valparai|Vandavasi|Vaniyambadi|Vedaranyam|Vellakoil|Vellore|Vikramasingapuram|Viluppuram|Arakkonam|Aruppukkottai|Chennai*|Coimbatore|Erode|Gobichettipalayam|Kancheepuram|Karur|Lalgudi|Madurai|Manachanallur|Nagapattinam|Nagercoil|Namagiripettai|Namakkal|Nandivaram-Guduvancheri|Nanjikottai|Natham|Nellikuppam|Neyveli (TS)|O' Valley|Oddanchatram|P.N.Patti|Pacode|Padmanabhapuram|Palani|Palladam|Pallapatti|Pallikonda|Panagudi|Panruti|Paramakudi|Parangipettai|Pattukkottai|Perambalur|Peravurani|Periyakulam|Periyasemur|Pernampattu|Pollachi|Polur|Ponneri|Pudukkottai|Pudupattinam|Puliyankudi|Punjaipugalur|Ranipet|Rajapalayam|Ramanathapuram|Rameshwaram|Rasipuram|Salem|Sankarankoil|Sankari|Sathyamangalam|Sattur|Shenkottai|Sholavandan|Sholingur|Sirkali|Sivaganga|Sivagiri|Sivakasi|Srivilliputhur|Surandai|Suriyampalayam|Tenkasi|Thammampatti|Thanjavur|Tharamangalam|Tharangambadi|Theni Allinagaram|Thirumangalam|Thirupuvanam|Thiruthuraipoondi|Thiruvallur|Thiruvarur|Thuraiyur|Tindivanam|Tiruchendur|Tiruchengode|Tiruchirappalli|Tirukalukundram|Tirukkoyilur|Tirunelveli|Tirupathur|Tirupathur|Tiruppur|Tiruttani|Tiruvannamalai|Tiruvethipuram|Tittakudi|Udhagamandalam|Udumalaipettai|Unnamalaikadai|Usilampatti|Uthamapalayam|Uthiramerur|Vadakkuvalliyur|Vadalur|Vadipatti|Valparai|Vandavasi|Vaniyambadi|Vedaranyam|Vellakoil|Vellore|Vikramasingapuram|Viluppuram|Virudhachalam|Virudhunagar|ViswanathamVirudhachalam|Virudhunagar|Viswanatham";
        c_a['Telangana']="Select City|Adilabad|Bellampalle|Bhadrachalam|Bhainsa|Bhongir|Bodhan|Farooqnagar|Gadwal|Hyderabad*|Jagtial|Jangaon|Kagaznagar|Kamareddy|Karimnagar|Khammam|Koratla|Kothagudem|Kyathampalle|Mahbubnagar|Mancherial|Mandamarri|Manuguru|Medak|Miryalaguda|Nagarkurnool|Narayanpet|Nirmal|Nizamabad|Palwancha|Ramagundam|Sadasivpet|Sangareddy|Siddipet|Sircilla|Suryapet|Tandur|Vikarabad|Wanaparthy|Warangal|Yellandu";
         c_a['Tripura']="Select City|Agartala*|Belonia|Dharmanagar|Kailasahar|Khowai|Pratapgarh|Udaipur";
        c_a['Uttar Pradesh']="Select City|Achhnera|Agra|Aligarh|Allahabad|Amroha|Azamgarh|Bahraich|Chandausi|Etawah|Firozabad|Fatehpur Sikri|Hapur|Hardoi|Jhansi|Kalpi|Kanpur|Khair|Laharpur|Lakhimpur|Lal Gopalganj Nindaura|Lalitpur|Lalganj|Lar|Loni|Lucknow*|Mathura|Meerut|Modinagar|Moradabad|Nagina|Najibabad|Nakur|Nanpara|Naraura|Naugawan Sadat|Nautanwa|Nawabganj|Nehtaur|Niwai|Noida|Noorpur|Obra|Orai|Padrauna|Palia Kalan|Parasi|Phulpur|Pihani|Pilibhit|Pilkhuwa|Powayan|Pukhrayan|Puranpur|Purquazi|Purwa|Rae Bareli|Rampur|Rampur Maniharan|Rasra|Rath|Renukoot|Reoti|Robertsganj|Rudauli|Rudrapur|Sadabad|Safipur|Saharanpur|Sahaspur|Sahaswan|Sahawar|Sahjanwa|Saidpur|Sambhal|Samdhan|Samthar|Sandi|Sandila|Sardhana|Seohara|Shahabad|Shahganj|Shahjahanpur|Shamli|Shamsabad|Sherkot|Shikarpur| Bulandshahr|Shikohabad|Shishgarh|Siana|Sikanderpur|Sikandra Rao|Sikandrabad|Sirsaganj|Sirsi|Sitapur|Soron|Suar|Sultanpur|Sumerpur|Tanda|Thakurdwara|Thana Bhawan|Tilhar|Tirwaganj|Tulsipur|Tundla|Ujhani|Unnao|Utraula|Varanasi|Vrindavan|Warhapur|Zaidpur|Zamania";
        c_a['Uttarakhand']="Select City|Bageshwar|Dehradun|Haldwani-cum-Kathgodam|Hardwar|Kashipur|Manglaur|Mussoorie|Nagla|Nainital|Pauri|Pithoragarh|Ramnagar|Rishikesh|Roorkee|Rudrapur|Sitarganj|Srinagar|Tehri";
         c_a['West Bengal']="Select City|Adra|Alipurduar|Arambagh|Asansol|Baharampur|Balurghat|Bankura|Darjiling|English Bazar|Gangarampur|Habra|Hugli-Chinsurah|Jalpaiguri|Jhargram|Kalimpong|Kharagpur|Kolkata|Mainaguri|Malda|Mathabhanga|Medinipur|Memari|Monoharpur|Murshidabad|Nabadwip|Naihati|Panchla|Pandua|Paschim Punropara|Purulia|Raghunathpur|Raghunathganj|Raiganj|Rampurhat|Ranaghat|Sainthia|Santipur|Siliguri|Sonamukhi|Srirampore|Suri|Taki|Tamluk|Tarakeswar";

        $('#country').change(function(){
            var c = $(this).val();
            var state_arr = s_a[c].split("|");
            $('#state').empty();
            $('#city').empty();
            if(c==0){
                $('#state').append($('<option>', {
                    value: '0',
                    text: 'Select State',
                }, '</option>'));
            }else {
                $.each(state_arr, function (i, item_state) {
                    $('#state').append($('<option>', {
                        value: item_state,
                        text: item_state,
                    }, '</option>'));
                });
            }
            $('#city').append($('<option>', {
                value: '0',
                text: 'Select City',
            }, '</option>'));
        });

        $('#state').change(function(){
            var s = $(this).val();
            if(s=='Select State'){
                $('#city').empty();
                $('#city').append($('<option>', {
                    value: '0',
                    text: 'Select City',
                }, '</option>'));
            }
            var city_arr = c_a[s].split("|");
            $('#city').empty();

            $.each(city_arr, function (j, item_city) {
                $('#city').append($('<option>', {
                    value: item_city,
                    text: item_city,
                }, '</option>'));
            });


        });
    });
/*</script>
</head>
<body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<select name="country" id="country"></select> <br>
<select name="state" id="state"></select> <br>
<select name="city" id="city"></select>
</body>
</html>*/