
namespace App\Http\Controllers;

use App\CustomDeclaration;
use App\CustomDeclarationItem;
use App\ExpectedPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ExpectedPackageController extends Controller
        $ExpectedPackage->delete();
        return redirect('expected-packages');
    }
    public function editCustom(Request $request){

        $validation = $request->validate(CustomDeclaration::$rules);
        $CustomDeclaration = CustomDeclaration::where('id',$request->id)->first();
        if($CustomDeclaration != null){
            $CustomDeclaration->update(array(
                'battery_in'=>$request->battery_in,
                'battery_with'=>$request->battery_with,
                'dangerous_goods'=>$request->dangerous_goods,
                'alcoholic'=>$request->alcoholic,
                'describe_package'=>$request->describe_package,
            ));
            $CustomDeclarationItem = CustomDeclarationItem::where('custom_id',$request->id)->first();
            $CustomDeclarationItem->update(array(
                'item_name'=>$request->item_name,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'origin'=>$request->origin,
            ));
        }
        return redirect('expected-packages');
    }
}
