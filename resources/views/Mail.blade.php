<body style="margin:0; padding:0; background:#f2f4f7;">

    <!-- Tabla de fondo -->
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f2f4f7; padding:30px 0;">
        <tr>
            <td align="center">

                <!-- Card central -->
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" 
                       style="background:#ffffff; border-radius:16px; border:1px solid #e5e7eb; 
                              box-shadow:0 4px 14px rgba(0,0,0,0.08); font-family:Arial, sans-serif;">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding:30px 30px 10px 30px;">
                            <img src="{{ $message->embed(public_path('assets/images/LogoMarca.png')) }}" 
                                 alt="Logo RENTFIT" 
                                 width="120" 
                                 style="display:block;">
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style="padding:0 30px 30px 30px; font-size:15px; line-height:1.7; color:#4b5563;">
                            <h1 style="margin:0 0 18px 0; font-size:24px; color:#111827; font-weight:bold;">
                                {!! $asunto !!}
                            </h1>

                            <p style="margin:0 0 12px 0;">
                                Hola <strong>{!! $remitente !!}</strong>,
                            </p>

                            <p style="margin:0;">
                                {!! $cuerpo !!}
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding:15px 30px 25px 30px; font-size:12px; color:#9ca3af;">
                            © {{ date('Y') }} Proyecto final de grado RENTFIT
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
