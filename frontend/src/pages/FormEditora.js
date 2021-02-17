import React, { useEffect, useState } from "react";
import { Form, Input, Button } from "antd";
import EditorasService from "../services/editorasService";
import { NavLink, useParams } from "react-router-dom";
import "./style.css";


export default function FormEditora() {
  const [nomeEditora, setNomeEditora] = useState(null);
  const { id } = useParams();

  useEffect(() => {
    if (id != 0) {
      EditorasService.get(id)
        .then((response) => {
          setNomeEditora(response.data.nome);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }, []);

  const onFinish = (values) => {
    if (id != 0) {
      EditorasService.update(id, values.nome)
        .then((response) => {
          window.location.href = "/editoras";
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
      EditorasService.add(values.nome)
        .then((response) => {
          window.location.href = "/editoras";
        })
        .catch((error) => {
          console.log(error);
        });
    }
  };

  const onFinishFailed = (errorInfo) => {
    console.log("Failed:", errorInfo);
  };

  return (
    <>
    <div className="wrapper">
      <Button>
        <NavLink to={"/editoras"}>voltar</NavLink>
      </Button>
      
        <Form name="basic" onFinish={onFinish} onFinishFailed={onFinishFailed}>
          {id != 0 && (
            <p>
              O nome atual da editora é <em>"{nomeEditora}"</em>.
            </p>
          )}
          <Form.Item
            label="Nome da editora"
            name="nome"
            rules={[
              { required: true, message: "Nome da Editora" },
              { max: 20, message: "nome com máximo de 20 caracteres" },
            ]}
          >
            <Input placeholder="Nome da Editora" name="nome" />
          </Form.Item>

          <Form.Item>
            <Button type="primary" htmlType="submit">
              Enviar
            </Button>
          </Form.Item>
        </Form>
      </div>
    </>
  );
}
