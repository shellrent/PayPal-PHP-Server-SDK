<?php

namespace PaypalServerSdkLib\Exceptions;

use apimatic\jsonmapper\JsonMapperException;

class JsonMapperWithResponseException extends JsonMapperException {
	private JsonMapperException $jsonMapperException;
	private $rawResponse;
	
	public static function create (  JsonMapperException $exception, $rawResponse ): self {
		$self = new static( $exception->getMessage(), $exception->getCode(), $exception );
		
		$self->rawResponse = $rawResponse;
		$self->jsonMapperException = $exception;
		
		return $self;
	}
	
	public function getJsonMapperException(): JsonMapperException {
		return $this->jsonMapperException;
	}
	
	public function getRawResponse() {
		return $this->rawResponse;
	}
}