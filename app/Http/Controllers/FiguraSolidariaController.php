<?php

namespace App\Http\Controllers;

use App\FiguraSolidaria;
use App\RegistroCivil;
use App\SeguroMedico;
use App\RolFiguraSolidaria;
use App\CoordinacionZona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FiguraSolidariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = \App\Municipio::all();
        return view('figuraSolidaria/index', ['titulo' => 'Figura Solidaria', "municipios" => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroCivil = RegistroCivil::all();
        $SeguroMedico = SeguroMedico::all();
        $rol= RolFiguraSolidaria::all();
        $coordinacionZona = \App\CoordinacionZona::all();
        $municipios = \App\Municipio::all();
        $escolaridad = \App\Escolaridad::all();
        return view('figuraSolidaria/add', ['titulo' => 'Agregar Figura Solidaria', 'registrosCivil' => $registroCivil, "municipios" => $municipios, 'coordinacionZona' => $coordinacionZona, 'SeguroMedico' => $SeguroMedico, 'rol' => $rol , 'escolaridad'=> $escolaridad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $validacion = $request->validate([
            "nombreFiguraSolidaria" => "required | max:45|min:1",
            "apFiguraSolidaria" =>"required | max:45 | min:1",
            "amFiguraSolidaria" =>"required | max:45 | min:1",
            "rfcFiguraSolidaria" => "required | size:13",
            "fechaNacimiento"=> "required | date",
            "sexo" =>"required | in:masculino,femenino",
            "registrosCivil" => "required",
            "hijosFiguraSolidaria" =>"required",
            "celFiguraSolidaria" =>"required|max:10|min:5",
            "seguroMedico" => "required",
            "doFiguraSolidaria" =>"required",
            "coFiguraSolidaria" =>"required",
            "municipio" =>"required",
            "ciudadesDomicilio" =>"required",
            "comprobanteIne" => "required|file|mimes:pdf",
            "comprobanteCurp" =>"required|file|mimes:pdf",
            "comprobanteGradoEstudio" =>"required|file|mimes:pdf",
            "cartaCompromiso" =>"required|file|mimes:pdf",
            "fechaRegistro" =>"required | date",
            "fechaReincorporacion"=> "required| date",
            "coordinacionZona" => "required|array|min:1",
            "rol"=> "required",
            "escolaridad" => "required"],
            [
            'nombreFiguraSolidaria.required'=> 'El nombre de la figura solidaria no puede estar vacío',
                'nombreFiguraSolidaria.max'=> 'El nombre de la figura solidaria no puede tener más de 45 caracteres',
            'nombreFiguraSolidaria.min'=> 'El nombre de la figura solidaria no puede tener menos de 5 caractéres',
            'apFiguraSolidaria.required'=> 'El apellido paterno de la figura solidaria no puede estar vacío',
             'apFiguraSolidaria.max' => 'El apellido paterno de la figura solidaria no puede tener más de 45 caractéres',
             'apFiguraSolidaria.min' => 'El apellido paterno de la figura solidaria no puede tener menos de 5 caractéres',
             'amFiguraSolidaria.required'=> 'El apellido materno de la figura solidaria no puede estar vacío',
             'amFiguraSolidaria.max' => 'El apellido materno de la figura solidaria puede tener más de 45 caractéres',
             'amFiguraSolidaria.min' => 'El apellido materno de la figura solidaria puede tener menos de 5 caractéres',
             'rfcFiguraSolidaria.required' => "El campo rfc no puede estar vacío",
             'rfcFiguraSolidaria.size'=> 'El campo del rfc debe tener 13 caractéres',
             'fechaNacimiento.required'=> 'El campo de fecha de nacimiento no debe estar vacio',
             'sexo.required'=> 'El sexo debe ser seleccionado',
             'sexo.in'=> 'EL formato del valor sexo es incorrecto',
             'registrosCivil.required' => 'Registro civil debe ser selecionado',
             'celFiguraSolidaria.required' => 'El campo numero de celular no puede estar vacío',
             'celFiguraSolidaria.max' => 'El campo de numero de celular debe tener más de 10 caractéres',
             'celFiguraSolidaria.min'=> 'El campo del rfc no debe tener 5 caractéres',
             'hijosFiguraSolidaria.required'=>'El campo de hijos debe ser seleccionado',
             'seguroMedico.required' => 'El seguro medico debe ser seleccionado',
             'doFiguraSolidaria.required'=> 'El campo domicilio no debe estar vacío',
             'coFiguraSolidaria.required'=>'El campo de colonia no debe estar vacío',
             'municipio.required' => 'El campo de Municipiono debe estar vacio',
             'ciudadesDomicilio.required'=> 'El campo de localidad no debe estar vacio',
             'comprobanteIne.required'=> 'El archivo Ine no fue cargado',
             'comprobanteIne.file'=> 'El archivo no es un documento',
             'comprobanteIne.mimes'=> 'El formato del archivo debe ser PDF',
             'comprobanteCurp.required'=> 'El archivo Curp no fue cargado',
             'comprobanteCurp.file'=> 'El archivo no es un documento',
             'comprobanteCurp.mimes'=> 'El formato del archivo debe ser PDF',
             'comprobanteGradoEstudio.required'=> 'El archivo Comprobante grado de estudios no fue cargado',
             'comprobanteGradoEstudio.file'=> 'El archivo no es un documento',
             'comprobanteGradoEstudio.mimes'=> 'El formato del archivo debe ser PDF',
             'cartaCompromiso.required'=> 'El archivo Carta compromiso no fue cargado',
             'cartaCompromiso.file'=> 'El archivo no es un documento',
             'cartaCompromiso.mimes'=> 'El formato del archivo debe ser PDF',
             'fechaRegistro.required'=> 'El campo de fecha de registro no debe estar vacio',
             'fechaReincorporacion.required'=>'El campo fecha de reincorporacion no debe estar vacio',
             'coordinacionZona.required'=>'El campo de coordinacion de zona no debe estar vacio',
             'rol.required'=>'El campo de rol no debe estar vacio',
            'escolaridad.required' => 'El último grado de estudio es requerido']);


        $nombreFiguraSolidaria = $request->input('nombreFiguraSolidaria');
        $apFiguraSolidaria = $request->input('apFiguraSolidaria');
        $amFiguraSolidaria = !empty($request->input('amFiguraSolidaria')) ?
            $request->input('amFiguraSolidaria') : null;
        $rfcFiguraSolidaria = $request->input('rfcFiguraSolidaria');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $sexo = $request->input('sexo');
        $registrosCivil = $request->input('registrosCivil');
        $celFiguraSolidaria = $request->input('celFiguraSolidaria');
        $hijosFiguraSolidaria = $request->input('hijosFiguraSolidaria');
        $seguroMedico = $request->input('seguroMedico');
        $doFiguraSolidaria = $request->input('doFiguraSolidaria');
        $coFiguraSolidaria = $request->input('coFiguraSolidaria');
        $municipio = $request->input('municipio');
        $ciudadesDomicilio = $request->input('ciudadesDomicilio');
        $fechaRegistro = $request->input('fechaRegistro');
        $fechaReincorporacion = $request->input('fechaReincorporacion');
        $coordinacionZona = $request->input('coordinacionZona');
        $rol = $request->input('rol');
        $cp = !empty($request->input('cp')) ?
            $request->input('cp') : null;
        $escolaridad = $request->input('escolaridad');

         $nombreComprobanteIne = $request->comprobanteIne->getClientOriginalName();
        $request->file('comprobanteIne')->storePubliclyAs('documentos', $nombreComprobanteIne, 'public');

        $nombrecomprobanteCurp = $request->comprobanteCurp->getClientOriginalName();
        $request->file('comprobanteCurp')->storePubliclyAs('documentos', $nombrecomprobanteCurp, 'public');

        $nombrecomprobanteGradoEstudio = $request->comprobanteGradoEstudio->getClientOriginalName();
        $request->file('comprobanteGradoEstudio')->storePubliclyAs('documentos', $nombrecomprobanteGradoEstudio, 'public');

        $nombrecartaCompromiso = $request->cartaCompromiso->getClientOriginalName();
        $request->file('cartaCompromiso')->storePubliclyAs('documentos', $nombrecartaCompromiso, 'public');

        try {
            DB::beginTransaction();
            $figuraSolidaria = FiguraSolidaria::create([
                "rfc" => $rfcFiguraSolidaria,
                "nombre" => $nombreFiguraSolidaria,
                "apellido_paterno" => $apFiguraSolidaria,
                "apellido_materno" => $amFiguraSolidaria,
                "fecha_nacimiento" => Carbon::parse($fechaNacimiento)->format('Y-m-d'),
                "sexo" =>$sexo,
                "domicilio" => $doFiguraSolidaria,
                "colonia" =>$coFiguraSolidaria,
                "hijos" =>$hijosFiguraSolidaria ,
                "codigo_postal" => $cp,
                "telefono" => $celFiguraSolidaria,
                "fecha_registro" =>Carbon::parse($fechaRegistro)->format('Y-m-d'),
                "fecha_incorporacion" => Carbon::parse($fechaReincorporacion)->format('Y-m-d'),
                "carta_compromiso" => $nombrecartaCompromiso,
                "comprobante_ine" => $nombreComprobanteIne,
                "comprobante_curp" => $nombrecomprobanteCurp,
                "comprobante_grado_estudio" => $nombrecomprobanteGradoEstudio,
                "seguro_medico_id" => $seguroMedico,
                "escolaridad_id" =>$escolaridad,
                "registro_civil_id" => $registrosCivil
            ]);
            foreach($coordinacionZona as $c)
                $figuraSolidaria->coordinacionDeZonas()->attach($c);
            DB::commit();
            return redirect()->back()->with('message', 'Datos guardado correctamente');

        } catch(\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            $request->session()->flash('error-message', 'Ocurrió un error al intentar almacenar los datos de la figura solidaria'); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function show(FiguraSolidaria $figuraSolidaria)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function edit(FiguraSolidaria $figuraSolidaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FiguraSolidaria $figuraSolidaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiguraSolidaria $figuraSolidaria)
    {
        //
    }

    public function filter(Request $request, FiguraSolidaria $figuraSolidaria) {
        $firguraSolidaria = $figuraSolidaria->newQuery();

        $validacion = $request->validate([
            "coordinacionZona" =>"required",
        ],
        ["coordinacionZona.required" => "La coordinación de zona es requerida"]);

        $coordinacionZonaId = $request->input('coordinacionZona');

        $coordinacionZona = CoordinacionZona::with("figurasSolidarias")->where("id", $coordinacionZonaId)->first();

        return response()->json(array('figurasSolidaria' => $coordinacionZona->figurasSolidarias));

    }
}
