import React, { useEffect, useState } from "react";
import { Form, Input, Button } from "antd";
import AutoresService from "../services/autoresService";
import { NavLink, useParams } from "react-router-dom";

export default function FormAutor() {
  const [nomeAutor, setNomeAutor] = useState(null);
  const [anoDeNascimento, setAnoDeNascimento] = useState(null);
  const [sexo, setSexo] = useState(null);
  const [nacionalidade, setNacionalidade] = useState(null);
  const { id } = useParams();

  useEffect(() => {
    if (id != 0) {
      AutoresService.get(id)
        .then((response) => {
          setNomeAutor(response.data.nome);
          setAnoDeNascimento(response.data.ano_de_nascimento);
          setSexo(response.data.sexo);
          setNacionalidade(response.data.nacionalidade);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }, []);

  const onFinish = (values) => {
    if (id!=0) {
        AutoresService.update(id, values.nome, values.ano_de_nascimento, values.sexo, values.nacionalidade )
        .then((response) => {
          window.location.href = "/autores";
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
        AutoresService.add(values.nome, values.ano_de_nascimento, values.sexo, values.nacionalidade )
        .then((response) => {
          window.location.href = "/autores";
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
        <NavLink to={"/autores"}>voltar</NavLink>
      </Button>

      <Form name="basic" onFinish={onFinish} onFinishFailed={onFinishFailed}>
        {id != 0 && (
          <p>
            O nome atual do autor é <em>"{nomeAutor}"</em>.
          </p>
        )}
        <Form.Item
          label="Nome da autor"
          name="nome"
          rules={[
            { required: true, message: "Nome do Autor" },
            { max: 20, message: "nome com máximo de 20 caracteres" },
          ]}
        >
          <Input placeholder="Nome da Autor" name="nome" />
        </Form.Item>

        {id != 0 && (
          <p>
            O ano de nascimento atual do autor é <em>"{anoDeNascimento}"</em>.
          </p>
        )}
        <Form.Item
          label="Ano de nascimento"
          name="ano_de_nascimento"
          rules={[
            { required: true, message: "Ano de nascimento" },
            { max: 4, message: "ano com 4 caracteres" },
          ]}
        >
          <Input placeholder="Ano de nascimento" name="ano_de_nascimento" />
        </Form.Item>

        {id != 0 && (
          <p>
            O sexo atual do autor é <em>"{sexo}"</em>.
          </p>
        )}
        <Form.Item
          label="sexo"
          name="sexo"
          rules={[
            { required: true, message: "sexo" },
            { max: 10, message: "" },
          ]}
        >
          <Input placeholder="sexo" name="sexo" />
        </Form.Item>

        {id != 0 && (
          <p>
            A nacionalidade atual do autor é <em>"{nacionalidade}"</em>.
          </p>
        )}
        <Form.Item
          label="nacionalidade"
          name="nacionalidade"
          rules={[
            { required: true, message: "nacionalidade" },
            { max: 10, message: "" },
          ]}
        >
          <Input placeholder="nacionalidade" name="nacionalidade" />
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
