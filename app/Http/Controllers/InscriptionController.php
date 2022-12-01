<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscriptionRequest;
use App\Http\Requests\UpdateInscriptionRequest;
use App\Repositories\InscriptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Inscription;

use Input;

use Image;

class InscriptionController extends AppBaseController
{
    /** @var  InscriptionRepository */
    private $inscriptionRepository;

    public function __construct(InscriptionRepository $inscriptionRepo)
    {
        $this->inscriptionRepository = $inscriptionRepo;
    }

    /**
     * Display a listing of the Inscription.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $inscriptions = $this->inscriptionRepository->all();

        $inscriptions = Inscription::where('user_id', \Auth::user()->id)->get();

        $title = 'Mis inscripciones';

        return view('inscriptions.index')
            ->with('inscriptions', $inscriptions)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new Inscription.
     *
     * @return Response
     */
    public function create()
    {
        $user = \Auth::user();
        $title = 'Inscripción';
        return view('inscriptions.create', compact('user', 'title'));
    }

    /**
     * Store a newly created Inscription in storage.
     *
     * @param CreateInscriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateInscriptionRequest $request)
    {
       //if (isset($request->adult)) 
       // {
            // $input = $request->all();
             
            if ($inscription = Inscription::where('user_id', \Auth::user()->id)->count() < 1) {
                $inscription = $this->inscriptionRepository->create([
                    'lastname' => $request->lastname,
                    'name' => $request->name,
                    'birthday' => $request->birthday,
                    'sex' => $request->sex,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'document_number' => $request->document_number,
                    'cuil' => $request->cuil,
                    'marital_state' => $request->marital_state,
                    'occupation' => $request->occupation,
                    'income' => $request->income,
                    'street' => $request->street,
                    'number' => $request->number,
                    'floor' => $request->floor,
                    'apartment' => $request->apartment,
                    'city' => $request->city,
                    'postcode' => $request->postcode,

                    'career' => $request->career,
                    'career_year' => $request->career_year,
                    'establishment' => $request->establishment,
                    'establishment_city' => $request->establishment_city,

                    'mother_lastname' => $request->mother_lastname,
                    'mother_name' => $request->mother_name,
                    'mother_birthday' => $request->mother_birthday,
                    'mother_sex' => $request->mother_sex,
                    'mother_phone' => $request->mother_phone,
                    'mother_document_number' => $request->mother_document_number,
                    'mother_cuil' => $request->mother_cuil,
                    'mother_occupation' => $request->mother_occupation,
                    'mother_income' => $request->mother_income,
                    'mother_street' => $request->mother_street,
                    'mother_number' => $request->mother_number,
                    'mother_floor' => $request->mother_floor,
                    'mother_apartment' => $request->mother_apartment,
                    'mother_city' => $request->mother_city,
                    'mother_postcode' => $request->mother_postcode,

                    'father_lastname' => $request->father_lastname,
                    'father_name' => $request->father_name,
                    'father_birthday' => $request->father_birthday,
                    'father_sex' => $request->father_sex,
                    'father_phone' => $request->father_phone,
                    'father_document_number' => $request->father_document_number,
                    'father_cuil' => $request->father_cuil,
                    'father_occupation' => $request->father_occupation,
                    'father_income' => $request->father_income,
                    'father_street' => $request->father_street,
                    'father_number' => $request->father_number,
                    'father_floor' => $request->father_floor,
                    'father_apartment' => $request->father_apartment,
                    'father_city' => $request->father_city,
                    'father_postcode' => $request->father_postcode,

                    'scholarship' => $request->scholarship,
                    'living_place' => $request->living_place,
                    'owns_car' => $request->owns_car,
                    'front_document' => $this->uploadPicture($request, public_path().'/storage/front_document/', 'front_document', 640, 480),
                    'back_document' =>$this->uploadPicture($request, public_path().'/storage/back_document/', 'back_document', 640, 480),
                    'user_id' => \Auth::user()->id,
                    'status' => 'Revisión Pendiente',
                    'observations' => null
                    
                ]);
              
                Flash::success('La inscripción fue enviada con éxito. Puede consultar su estado en el siguiente Listado.');

                return redirect(route('inscripciones.index'));
              //  return back()->withInput($request->all());
            }
            else
            {
                Flash::error('Usted ya se encuentra inscripto, si desea puede modificar algun dato en su anterior inscripción y volver a enviarla para su posterior revisión. Recuerde que puede consultar su estado en el siguiente listado.');

                return redirect(route('inscripciones.index'));
            }
       /* }
        else
        {
            Flash::error('Usted debe aceptar que es mayor de 18 años para poder inscribirse.');

            return back()->withInput($request->all());
        }*/
    }

    /**
     * Display the specified Inscription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscription = $this->inscriptionRepository->find($id);

        if (empty($inscription)) {
            Flash::error('Inscripción no encontrada');

            return redirect(route('inscriptions.index'));
        }

        $title = 'Inscripción';
        return view('inscriptions.show')->with('inscription', $inscription)->with('title', $title);
    }

    /**
     * Show the form for editing the specified Inscription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscription = $this->inscriptionRepository->find($id);

        if (empty($inscription)) {
            Flash::error('Inscripción no encontrada');

            return redirect(route('inscriptions.index'));
        }

        $title = 'Modificar Inscripción';
        $user = \Auth::user();

        return view('inscriptions.edit')->with('inscription', $inscription)->with('title', $title)->with('user', $user);
    }

    /**
     * Update the specified Inscription in storage.
     *
     * @param int $id
     * @param UpdateInscriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscriptionRequest $request)
    {
        
            $inscription = Inscription::findOrFail($id);

            if (empty($inscription)) {
                Flash::error('Inscripción no encontrada');

                return redirect(route('inscriptions.index'));
            }
            
            $inscription->update(
                [
                    'lastname' => $request->lastname,
                    'name' => $request->name,
                    'birthday' => $request->birthday,
                    'sex' => $request->sex,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'document_number' => $request->document_number,
                    'cuil' => $request->cuil,
                    'marital_state' => $request->marital_state,
                    'occupation' => $request->occupation,
                    'income' => $request->income,
                    'street' => $request->street,
                    'number' => $request->number,
                    'floor' => $request->floor,
                    'apartment' => $request->apartment,
                    'city' => $request->city,
                    'postcode' => $request->postcode,
                    'career' => $request->career,
                    'career_year' => $request->career_year,
                    'establishment' => $request->establishment,
                    'establishment_city' => $request->establishment_city,
                    'mother_lastname' => $request->mother_lastname,
                    'mother_name' => $request->mother_name,
                    'mother_birthday' => $request->mother_birthday,
                    'mother_sex' => $request->mother_sex,
                    'mother_phone' => $request->mother_phone,
                    'mother_document_number' => $request->mother_document_number,
                    'mother_cuil' => $request->mother_cuil,
                    'mother_occupation' => $request->mother_occupation,
                    'mother_income' => $request->mother_income,
                    'mother_street' => $request->mother_street,
                    'mother_number' => $request->mother_number,
                    'mother_floor' => $request->mother_floor,
                    'mother_apartment' => $request->mother_apartment,
                    'mother_city' => $request->mother_city,
                    'mother_postcode' => $request->mother_postcode,
                    'father_lastname' => $request->father_lastname,
                    'father_name' => $request->father_name,
                    'father_birthday' => $request->father_birthday,
                    'father_sex' => $request->father_sex,
                    'father_phone' => $request->father_phone,
                    'father_document_number' => $request->father_document_number,
                    'father_cuil' => $request->father_cuil,
                    'father_occupation' => $request->father_occupation,
                    'father_income' => $request->father_income,
                    'father_street' => $request->father_street,
                    'father_number' => $request->father_number,
                    'father_floor' => $request->father_floor,
                    'father_apartment' => $request->father_apartment,
                    'father_city' => $request->father_city,
                    'father_postcode' => $request->father_postcode,
                    'scholarship' => $request->scholarship,
                    'living_place' => $request->living_place,
                    'owns_car' => $request->owns_car,
         
                ]
            );
            // TODO: Refactorizar
            // // Photography
            // if ($request->file('photography')) {
            //     if ($inscription->photography != null ) {
            //         $this->deleteFile(public_path().'/storage/photography/', $inscription->photography);
            //     }

            //     $inscription->update([
            //         'photography' => $this->uploadPicture($request, public_path().'/storage/photography/', 'photography', 512, 512)
            //     ]);
            // }

            // Front document
            if ($request->file('front_document')) {
                if ($inscription->front_document != null ) {
                    $this->deleteFile(public_path().'/storage/front_document/', $inscription->front_document);
                }

                $inscription->update([
                    'front_document' => $this->uploadPicture($request, public_path().'/storage/front_document/', 'front_document', 640, 480)
                ]);
            }

            // Back document
            if ($request->file('back_document')) {
                if ($inscription->back_document != null ) {
                    $this->deleteFile(public_path().'/storage/back_document/', $inscription->back_document);
                }

                $inscription->update([
                    'back_document' => $this->uploadPicture($request, public_path().'/storage/back_document/', 'back_document', 640, 480)
                ]);
            }

            // $inscription = $this->inscriptionRepository->update($request->all(), $id);

            Flash::success('Inscripción actualizada con éxito. Puede consultar su estado en el siguiente Listado.');

            return redirect(route('inscripciones.index'));
    
    }

    /**
     * Remove the specified Inscription from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscription = $this->inscriptionRepository->find($id);

        if (empty($inscription)) {
            Flash::error('Inscripción no encontrada');

            return redirect(route('inscriptions.index'));
        }

        $this->inscriptionRepository->delete($id);

        $this->deleteFile(public_path().'/storage/photography/', $inscription->photography);
        $this->deleteFile(public_path().'/storage/front_document/', $inscription->front_document);
        $this->deleteFile(public_path().'/storage/back_document/', $inscription->back_document);
        $this->deleteFile(public_path().'/storage/cv/', $inscription->cv);
        $this->deleteFile(public_path().'/storage/lifeguard_notebook/', $inscription->lifeguard_notebook);

        Flash::success('La inscripción fue eliminada correctamente.');

        return redirect(route('inscripciones.index'));
    }

    /*
    *   Sube avatar del usuario y retorna el nombre del archivo a buscar
    *   Ej: 1593014289que-la-gente-creajpg.jpg
    *   Que se guardará en la base de datos
    */
    public function uploadPicture(Request $request, $url, $file_request_name, $width, $height)
    {
        // Si no existe la carpeta user_avatars la crea
        if (! \File::exists($url)) 
        {
            \File::makeDirectory($url);
        }
        
        $originalImage= $request->file($file_request_name);

        $thumbnailImage = Image::make($originalImage)->fit($width, $height);

        $thumbnailPath = $url;

        $avatarName = time() . '-' . \Str::slug($request->lastname . '-'. $request->name). '.' .$request->$file_request_name->getClientOriginalExtension();

        $thumbnailImage->save($thumbnailPath . $avatarName);

        return $avatarName;
    }

    public function uploadFile(Request $request, $url, $file_request_name)
    {
        $file = $request->file($file_request_name);
        $nameFile = str_slug($request->lastname . '-' . $request->name, "-") . time() . '.' . $file->getClientOriginalExtension();
        $path = $url;
        $file->move($path, $nameFile);
        return $nameFile;
    }

    /*
    *   Dada una url y el nombre de la imagen busca y si exite la elimina
    */
    public function deleteFile($url, $fileName)
    {
        if (\File::exists($url . $fileName))
        {
            \File::delete($url . $fileName);
            return true;
        }
        return false;
    }

    public function getDownloadCv()
    {
  
        $inscription = Inscription::where('user_id', \Auth::user()->id)->first();


        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). '/storage/cv/' . $inscription->cv;

        $headers = [
            'Content-Type' => 'application/pdf',
         ];

        return response()->download($file, $inscription->lastname .','. $inscription->name .'-cv.pdf', $headers);
    }

    public function getDownloadLifeguardNotebook()
    {
        $inscription = Inscription::where('user_id', \Auth::user()->id)->first();
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). '/storage/lifeguard_notebook/' . $inscription->lifeguard_notebook;

        $headers = [
            'Content-Type' => 'application/pdf',
         ];

        return response()->download($file, $inscription->lastname .','. $inscription->name .'-libreta.pdf', $headers);
    }

    public function getDownloadCvAdmin($id)
    {
        $inscription = Inscription::where('user_id', $id)->first();

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). '/storage/cv/' . $inscription->cv;

        $headers = [
            'Content-Type' => 'application/pdf',
         ];

        return response()->download($file, $inscription->lastname .','. $inscription->name .'-cv.pdf', $headers);
    }

    public function getDownloadLifeguardNotebookAdmin($id)
    {
        $inscription = Inscription::where('user_id', $id)->first();
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). '/storage/lifeguard_notebook/' . $inscription->lifeguard_notebook;

        $headers = [
            'Content-Type' => 'application/pdf',
         ];

        return response()->download($file, $inscription->lastname .','. $inscription->name .'-libreta.pdf', $headers);
    }
}
