$.fn.dataTableExt.oApi.fnGetDisplayNodes = function ( oSettings, iRow )
{
    var anRows = [];
    if ( oSettings.aiDisplay.length !== 0 )
    {
        if ( typeof iRow != 'undefined' )
        {
            return oSettings.aoData[ oSettings.aiDisplay[iRow] ].nTr;
        }
        else
        {
            for ( var j=oSettings._iDisplayStart ; j<oSettings._iDisplayEnd ; j++ )
            {
                var nRow = oSettings.aoData[ oSettings.aiDisplay[j] ].nTr;
                anRows.push( nRow );
            }
        }
    }
    return anRows;
};