import {Layout, Menu, MenuProps} from "antd";
import {useNavigate} from "react-router-dom";
import {useDispatch, useSelector} from "react-redux";
import {AuthReducerActionType, IAuthReducerState} from "../../auth/login/AuthReducer.ts";
import {IUser} from "../../auth/types.ts";


const DefaultHeader = () => {
    const {isAuth, user} = useSelector((redux: any)=>redux.auth as IAuthReducerState);
    const dispatch = useDispatch();

    const {Header} = Layout;
    const navigate = useNavigate();
    const items: MenuProps['items'] = ['1', '2', '3'].map((key) => ({
        key,
        label: `nav ${key}`,

    }));

    if(isAuth) {
        items.push({
            key: '4',
            label: "Вихід",
            onClick: () => {
                //console.log("Вихід користувача");
                dispatch({
                    type: AuthReducerActionType.LOGOUT_USER
                });
                navigate("/");
            }
        });
    }
    else {
        items.push({
            key: '4',
            label: "Вхід",
            onClick: () => {
                console.log("Вхід користувача");

                navigate("/login");
            }
        });
    }

    return (
        <Header style={{display: 'flex', alignItems: 'center'}}>
            <div className="demo-logo"/>
            <Menu
                theme="dark"
                mode="horizontal"
                defaultSelectedKeys={['2']}
                items={items}
                style={{flex: 1, minWidth: 0}}
            />
        </Header>
    );
}

export default DefaultHeader;